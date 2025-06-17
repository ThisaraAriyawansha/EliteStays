<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomImage;
use Illuminate\Support\Str;

class CustomerRoomImageController extends Controller
{
    public function index(Request $request)
    {
        $room_id = $request->query('id');
        if (!$room_id) {
            return redirect()->route('customerManageRoom')->with('error', 'Room ID is required.');
        }

        $room = Room::find($room_id);
        if (!$room) {
            return redirect()->route('customerManageRoom')->with('error', 'Room not found.');
        }

        $images = RoomImage::where('room_id', $room_id)->get();
        return view('publicSite.customerRoomImage', compact('room', 'images'));
    }

    public function upload(Request $request)
    {
        $room_id = $request->query('id');
        if (!$room_id) {
            return redirect()->route('customerManageRoom')->with('error', 'Room ID is required.');
        }

        $room = Room::find($room_id);
        if (!$room) {
            return redirect()->route('customerManageRoom')->with('error', 'Room not found.');
        }

        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('RoomImage'), $imageName);
            $imagePath = 'RoomImage/' . $imageName;

            RoomImage::create([
                'room_id' => $room->id,
                'image_path' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Image uploaded successfully!');
        }

        return redirect()->back()->with('error', 'No image uploaded.');
    }

    public function delete(Request $request)
    {
        $image_id = $request->query('id');
        if (!$image_id) {
            return redirect()->route('customerManageRoom')->with('error', 'Image ID is required.');
        }

        $image = RoomImage::find($image_id);
        if (!$image) {
            return redirect()->route('customerManageRoom')->with('error', 'Image not found.');
        }

        if ($image->image_path && file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
