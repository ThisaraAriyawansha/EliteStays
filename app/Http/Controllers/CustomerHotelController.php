<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Str;

class CustomerHotelController extends Controller
{
    // Show the add hotel form
    public function customeraddHotel()
    {
        return view('publicSite.customeraddHotel');
    }

    // Store the hotel
    public function storeHotel(Request $request)
{
    // Get customer ID from session
    $customer = $request->session()->get('customer');
    if (!$customer || !isset($customer['id'])) {
        return redirect()->route('customeraddHotel')->with('error', 'You must be logged in to add a hotel.');
    }

    // Check if customer already has a hotel
    $existingHotel = Hotel::where('customer_id', $customer['id'])->first();
    if ($existingHotel) {
        return redirect()->route('customeraddHotel')->with('error', 'You can only register one hotel.');
    }

    // Validate the form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'image_path' => 'nullable|image',
        'logo_path' => 'nullable|image',
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
        'logo_path' => $logoPath,
        'customer_id' => $customer['id'],
        'status_id' => 1, // Default status
    ]);

    return redirect()->route('customeraddHotel')->with('success', 'Hotel added successfully!');
}

// Show the manage hotel page
    public function customerManageHotel()
    {
        $customer = session()->get('customer');
        if (!$customer || !isset($customer['id'])) {
            return redirect()->route('customeraddHotel')->with('error', 'You must be logged in to view your hotel.');
        }

        $hotel = Hotel::where('customer_id', $customer['id'])->first();
        return view('publicSite.customerManageHotel', compact('hotel'));
    }

    // Show the update hotel form
    public function updateHotel()
    {
        $customer = session()->get('customer');
        if (!$customer || !isset($customer['id'])) {
            return redirect()->route('customeraddHotel')->with('error', 'You must be logged in to update your hotel.');
        }

        $hotel = Hotel::where('customer_id', $customer['id'])->first();
        if (!$hotel) {
            return redirect()->route('customerManageHotel')->with('error', 'No hotel found to update.');
        }

        return view('publicSite.updateHotel', compact('hotel'));
    }

    // Save the updated hotel details
    public function saveHotel(Request $request)
    {
        // Get customer ID from session
        $customer = $request->session()->get('customer');
        if (!$customer || !isset($customer['id'])) {
            return redirect()->route('customeraddHotel')->with('error', 'You must be logged in to update a hotel.');
        }

        // Find the hotel
        $hotel = Hotel::where('customer_id', $customer['id'])->first();
        if (!$hotel) {
            return redirect()->route('customerManageHotel')->with('error', 'No hotel found to update.');
        }

        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB limit
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB limit
        ]);

        // Ensure directories exist
        $hotelDir = public_path('Hotel');
        $logoDir = public_path('Logo');
        if (!file_exists($hotelDir)) {
            mkdir($hotelDir, 0755, true);
        }
        if (!file_exists($logoDir)) {
            mkdir($logoDir, 0755, true);
        }

        // Handle image upload
        if ($request->hasFile('image_path')) {
            // Delete old image if exists
            if ($hotel->image_path && file_exists(public_path($hotel->image_path))) {
                unlink(public_path($hotel->image_path));
            }
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move($hotelDir, $imageName);
            $hotel->image_path = 'Hotel/' . $imageName;
        }

        // Handle logo upload
        if ($request->hasFile('logo_path')) {
            // Delete old logo if exists
            if ($hotel->logo_path && file_exists(public_path($hotel->logo_path))) {
                unlink(public_path($hotel->logo_path));
            }
            $logo = $request->file('logo_path');
            $logoName = Str::random(20) . '.' . $logo->getClientOriginalExtension();
            $logo->move($logoDir, $logoName);
            $hotel->logo_path = 'Logo/' . $logoName;
        }

        // Update hotel details
        $hotel->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'image_path' => $hotel->image_path ?? null,
            'logo_path' => $hotel->logo_path ?? null,
        ]);

        return redirect()->route('customerManageHotel')->with('success', 'Hotel updated successfully!');
    }


}
