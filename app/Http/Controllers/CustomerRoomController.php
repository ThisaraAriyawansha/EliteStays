<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CustomerRoomController extends Controller
{
    public function customerAddRoom(Request $request)
    {
        // Get hotel_id from query parameter
        $hotel_id = $request->query('hotel_id');

        // Find the hotel by ID without checking user ownership
        $hotel = Hotel::findOrFail($hotel_id);

        return view('publicSite.customerAddRoom', compact('hotel'));
    }


    public function storeRoom(Request $request)
    {
        // Validate the request
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'adult_price' => 'required|numeric|min:0',
            'children_price' => 'required|numeric|min:0',
            'total_rooms' => 'required|integer|min:1',
            'breakfast_price' => 'nullable|numeric|min:0',
            'size' => 'required|string|max:100',
            'bed_type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status_id' => 'required|exists:statuses,id',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);



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
            'status_id' => $request->status_id,
            'image_path' => $imagePath,
        ]);

        return redirect()->Back()->with('success', 'Room added successfully!');
    }

    public function customerManageRoom(Request $request)
    {
        // Get customer data from session
        $customer = $request->session()->get('customer');

        if (!$customer || !isset($customer['id'])) {
            return redirect()->route('login')->with('error', 'Please log in to view your rooms.');
        }

        // Get hotels where customer_id matches the session customer ID
        $hotelIds = Hotel::where('customer_id', $customer['id'])->pluck('id');

        // Fetch rooms for those hotels
        $rooms = Room::whereIn('hotel_id', $hotelIds)
                    ->with('status', 'hotel')
                    ->get();

        return view('publicSite.customerManageRoom', compact('rooms'));
    }

    public function customerEditRoom(Request $request)
    {
        $room_id = $request->query('id');
        if (!$room_id) {
            return redirect()->route('customerManageRoom')->with('error', 'Room ID is required.');
        }

        $room = Room::where('id', $room_id)
                    ->with('hotel')
                    ->first();
        if (!$room) {
            return redirect()->route('customerManageRoom')->with('error', 'Invalid or unauthorized room.');
        }

        $statuses = Status::all();
        return view('publicSite.customerEditRoom', compact('room', 'statuses'));
    }

    public function updateRoom(Request $request)
{
    $room_id = $request->query('id');
    if (!$room_id) {
        return redirect()->route('customerManageRoom')->with('error', 'Room ID is required.');
    }

    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'price_per_night' => 'required|numeric|min:0',
        'adult_price' => 'required|numeric|min:0',
        'children_price' => 'required|numeric|min:0',
        'total_rooms' => 'required|integer|min:1',
        'breakfast_price' => 'nullable|numeric|min:0',
        'size' => 'required|string|max:100',
        'bed_type' => 'required|in:Single,Double,Queen,King,Twin',
        'description' => 'nullable|string',
        'status_id' => 'required|exists:statuses,id',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get customer from session
    $customer = $request->session()->get('customer');
    if (!$customer || !isset($customer['id'])) {
        return redirect()->route('login')->with('error', 'Please log in to update the room.');
    }

    // Ensure room belongs to hotel owned by this customer
    $room = Room::where('id', $room_id)
                ->whereIn('hotel_id', Hotel::where('customer_id', $customer['id'])->pluck('id'))
                ->first();

    if (!$room) {
        return redirect()->route('customerManageRoom')->with('error', 'Invalid or unauthorized room.');
    }

    // Handle image upload
    $imagePath = $room->image_path;
    if ($request->hasFile('image_path')) {
        if ($imagePath && file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
        $image = $request->file('image_path');
        $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('Room'), $imageName);
        $imagePath = 'Room/' . $imageName;
    }

    // Update room data
    $room->update([
        'name' => $request->name,
        'price_per_night' => $request->price_per_night,
        'adult_price' => $request->adult_price,
        'children_price' => $request->children_price,
        'total_rooms' => $request->total_rooms,
        'breakfast_price' => $request->breakfast_price,
        'size' => $request->size,
        'bed_type' => $request->bed_type,
        'description' => $request->description,
        'status_id' => $request->status_id,
        'image_path' => $imagePath,
    ]);

    return redirect()->route('customerManageRoom')->with('success', 'Room updated successfully!');
}


}