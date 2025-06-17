<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HotelController extends Controller
{
    public function addHotel()
    {
        return view('admin.addHotel');
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image|mimes:jpg,jpeg,png',
            'logo_path' => 'nullable|image|mimes:jpg,jpeg,png', // Validate logo
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Hotel'), $imageName);
            $imagePath = 'Hotel/' . $imageName;
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo_path')) {
            $logo = $request->file('logo_path');
            $logoName = Str::random(20) . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('Logo'), $logoName);
            $logoPath = 'Logo/' . $logoName;
        }

        // Create the hotel
        Hotel::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'image_path' => $imagePath,
            'logo_path' => $logoPath, // Store logo path
            'status_id' => 1, // Default status_id
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Hotel added successfully!');
    }

    public function manageHotel(Request $request)
    {
        $query = Hotel::with('status');

        // Handle search
        if ($search = $request->query('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('city', 'like', '%' . $search . '%');
        }

        // Handle entry type filter
        if ($entryType = $request->query('entry_type')) {
            if ($entryType === 'user') {
                $query->whereNull('customer_id');
            } elseif ($entryType === 'customer') {
                $query->whereNotNull('customer_id');
            }
        }

        // Paginate results (10 per page)
        $hotels = $query->paginate(10);

        // Append query parameters to pagination links to preserve search and filter
        $hotels->appends($request->query());

        return view('admin.manageHotel', compact('hotels'));
    }


        public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.editHotel', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png',
            'logo_path' => 'nullable|image|mimes:jpg,jpeg,png', // Validate logo
        ]);

        // Handle image upload
        $imagePath = $hotel->image_path;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Hotel'), $imageName);
            $imagePath = 'Hotel/' . $imageName;
        }

        // Handle logo upload
        $logoPath = $hotel->logo_path;
        if ($request->hasFile('logo_path')) {
            $logo = $request->file('logo_path');
            $logoName = Str::random(20) . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('Hotel'), $logoName);
            $logoPath = 'Hotel/' . $logoName;
        }

        // Update the hotel
        $hotel->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'image_path' => $imagePath,
            'logo_path' => $logoPath, // Update logo path
        ]);

        return redirect()->route('manageHotel')->with('success', 'Hotel updated successfully!');
    }
}
