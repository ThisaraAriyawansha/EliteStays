<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomImage;

class DashboardController extends Controller
{
    public function indexadmin()
    {
        // Fetch counts for Hotels, Rooms, and Room Images
        $hotelCount = Hotel::count();
        $roomCount = Room::count();
        $roomImageCount = RoomImage::count();

        // Pass the counts to the view
        return view('admin.dashboard', compact('hotelCount', 'roomCount', 'roomImageCount'));
    }
}
