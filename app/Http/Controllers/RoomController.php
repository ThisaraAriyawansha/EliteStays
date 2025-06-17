<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RoomController extends Controller
{
public function addRoom(Request $request)
{
    // Fetch active hotels for the dropdown
    $hotels = Hotel::where('status_id', 1)->get();
    $selectedHotelId = $request->query('hotel_id'); // Get hotel_id from query parameter
    return view('admin.addRoom', compact('hotels', 'selectedHotelId'));
}

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'adult_price' => 'required|numeric|min:0',
            'children_price' => 'required|numeric|min:0',
            'total_rooms' => 'required|integer|min:1',
            'breakfast_price' => 'nullable|numeric|min:0',
            'size' => 'required|numeric|min:0',
            'bed_type' => 'required|in:Single,Double,Queen,King,Twin',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png', // Validate image
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Room'), $imageName);
            $imagePath = 'Room/' . $imageName;
        }

        // Create the room
        Room::create([
            'hotel_id' => $request->hotel_id,
            'name' => $request->name,
            'price_per_night' => $request->price_per_night,
            'adult_price' => $request->adult_price,
            'children_price' => $request->children_price,
            'total_rooms' => $request->total_rooms,
            'breakfast_price' => $request->breakfast_price,
            'size' => $request->size,
            'bed_type' => $request->bed_type,
            'description' => $request->description,
            'image_path' => $imagePath,
            'status_id' => 1, // Default status
        ]);

        return redirect()->back()->with('success', 'Room added successfully!');
    }


    public function manageRoom(Request $request)
    {
        $query = Room::with('hotel');

        // Search functionality
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('bed_type', 'like', "%{$search}%")
                  ->orWhereHas('hotel', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Paginate results (e.g., 10 rooms per page)
        $rooms = $query->paginate(10);

        return view('admin.manageRoom', compact('rooms'));
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $hotels =Hotel::where('status_id', 1)->get();
        return view('admin.editRoom', compact('room', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'adult_price' => 'required|numeric|min:0',
            'children_price' => 'required|numeric|min:0',
            'total_rooms' => 'required|integer|min:1',
            'breakfast_price' => 'nullable|numeric|min:0',
            'size' => 'required|numeric|min:0',
            'bed_type' => 'required|in:Single,Double,Queen,King,Twin',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png', // Validate image
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        $imagePath = $room->image_path;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Room'), $imageName);
            $imagePath = 'Room/' . $imageName;
        }

        // Update the room
        $data = [
            'hotel_id' => $request->hotel_id,
            'name' => $request->name,
            'price_per_night' => $request->price_per_night,
            'adult_price' => $request->adult_price,
            'children_price' => $request->children_price,
            'total_rooms' => $request->total_rooms,
            'breakfast_price' => $request->breakfast_price,
            'size' => $request->size,
            'bed_type' => $request->bed_type,
            'description' => $request->description,
            'image_path' => $imagePath,
        ];

        $room->update($data);

        return redirect()->back()->with('success', 'Room updated successfully!');
    }
}