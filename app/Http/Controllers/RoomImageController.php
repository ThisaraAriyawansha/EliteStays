<?php

namespace App\Http\Controllers;

use App\Models\RoomImage;
use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoomImageController extends Controller
{

    public function manageImages($roomId)
    {
        $room = Room::with('images')->findOrFail($roomId);
        return view('admin.roomImages', compact('room'));
    }

    public function storeImage(Request $request, $roomId)
    {
        $room = Room::findOrFail($roomId);
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
        return redirect()->back()->with('error', 'No image was uploaded.');
    }

    public function destroyImage($roomId, $imageId)
    {
        $image = RoomImage::where('room_id', $roomId)->findOrFail($imageId);

        if ($image->image_path && file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
