<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Room;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show the home page
    public function home()
    {
        // Fetch 6 random hotels with status_id = 1 and their active rooms
        $hotels = Hotel::where('status_id', 1)
            ->with(['rooms' => function ($query) {
                $query->where('status_id', 1); // Only active rooms
            }])
            ->inRandomOrder()
            ->limit(6)
            ->get();

        // Get distinct cities for the search form
        $filterOptions = [
            'cities' => Hotel::distinct()->pluck('city')->filter()->values(),
        ];

        return view('publicSite.index', compact('hotels', 'filterOptions'));
    }


    // Show the flights page
    public function flights()
    {
        return view('publicSite.flights'); 
    }

    public function hotelFilter(Request $request)
    {
        // Get all distinct filter values from database
        $filterOptions = [
            'cities' => Hotel::distinct()->pluck('city')->filter()->values(),
            'hotel_names' => Hotel::distinct()->pluck('name')->filter()->values(),
            'bed_types' => Room::distinct()->pluck('bed_type')->filter()->values(),
            'price_range' => [
                'min' => Room::min('price_per_night') ?? 0,
                'max' => Room::max('price_per_night') ?? 100000, // Adjusted for LKR
            ],
            'size_range' => [
                'min' => Room::min('size') ?? 0,
                'max' => Room::max('size') ?? 100,
            ],
        ];

        // Initialize query with eager loading
        $query = Room::with('hotel');

        // Get current filter values from request
        $filters = [
            'city' => $request->input('city'),
            'leaving' => $request->input('leaving', []),
            'hotel_name' => $request->input('hotel_name'),
            'bed_type' => $request->input('bed_type', []),
            'my_range' => $request->input('my_range', 
                $filterOptions['price_range']['min'] . ';' . $filterOptions['price_range']['max']),
            'size_range' => $request->input('size_range', 
                $filterOptions['size_range']['min'] . ';' . $filterOptions['size_range']['max']),
            'breakfast_included' => $request->has('breakfast_included'),
            'sort' => $request->input('sort', 'trending'),
        ];

        // Apply city filters (combine single city and multiple cities)
        if ($filters['city'] || !empty($filters['leaving'])) {
            $query->whereHas('hotel', function ($q) use ($filters) {
                $cities = array_filter(array_merge(
                    (array) $filters['city'],
                    $filters['leaving']
                ));
                if (!empty($cities)) {
                    $q->whereIn('city', $cities);
                }
            });
        }

        // Apply hotel name filter
        if ($filters['hotel_name']) {
            $query->whereHas('hotel', function ($q) use ($filters) {
                $q->where('name', $filters['hotel_name']);
            });
        }

        if (!empty($filters['bed_type'])) {
            $query->whereIn('bed_type', (array) $filters['bed_type']);
        }

        if ($filters['my_range']) {
            [$minPrice, $maxPrice] = explode(';', $filters['my_range']);
            $query->whereBetween('price_per_night', [(float) $minPrice, (float) $maxPrice]);
        }

        if ($filters['size_range']) {
            [$minSize, $maxSize] = explode(';', $filters['size_range']);
            $query->whereBetween('size', [(float) $minSize, (float) $maxSize]);
        }

        if ($filters['breakfast_included']) {
            $query->where('breakfast_price', '>', 0);
        }

        // Apply sorting
        switch ($filters['sort']) {
            case 'mostpopular':
                $query->orderBy('popularity', 'desc'); // Adjust column name as needed
                break;
            case 'lowprice':
                $query->orderBy('price_per_night', 'asc');
                break;
            case 'trending':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Apply pagination
        $rooms = $query->paginate(15)->withQueryString();

        return view('publicSite.hotel', [
            'rooms' => $rooms,
            'roomCount' => $rooms->total(),
            'filterOptions' => $filterOptions,
            'filters' => $filters,
        ]);
    }

    // Show the property page
    public function property()
    {
        return view('publicSite.property'); 
    }

    // Show the hotelDetails page
    public function hotelDetails(Request $request)
    {
        $id = $request->query('id');
        $roomId = $request->query('room_id');
        $breakfast = $request->query('breakfast');

        // Fetch hotel with rooms and their images
        $hotel = Hotel::with(['rooms' => function ($query) {
            $query->with('images');
        }])->findOrFail($id);

        // Find the selected room if room_id is provided
        $selectedRoom = $roomId ? $hotel->rooms->find($roomId) : null;

        return view('publicSite.hotelDetails', compact('hotel', 'selectedRoom', 'breakfast'));
    }

    public function getBookingDetails(Request $request)
    {
        // Validate input
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'include_breakfast' => 'required|in:0,1',
        ]);

        $roomId = $request->input('room_id');
        $includeBreakfast = (int) $request->input('include_breakfast'); // Ensure 0 or 1

        // Fetch room with hotel and images
        $room = Room::with(['hotel', 'images'])->findOrFail($roomId);
        $hotel = $room->hotel;

        // Calculate price
        $price = $includeBreakfast ? $room->price_per_night + $room->breakfast_price : $room->price_per_night;
        $priceAfterTax = $price * 1.03; // 3% tax

        // Get room images (up to 4)
        $images = $room->images->isNotEmpty() 
            ? $room->images->pluck('image_path')->take(4)->toArray()
            : [
                'assets/img/hotel/hotel-3.jpg',
                'assets/img/hotel/hotel-7.jpg',
                'assets/img/hotel/hotel-6.jpg',
                'assets/img/hotel/hotel-8.jpg',
            ];

        // Pad images if fewer than 4
        while (count($images) < 4) {
            $images[] = 'assets/img/hotel/default.jpg';
        }

        return response()->json([
            'hotel' => [
                'name' => $hotel->name,
                'city' => $hotel->city,
                'address' => $hotel->address,
            ],
            'room' => [
                'name' => $room->name,
                'price' => $price,
                'price_after_tax' => $priceAfterTax,
                'include_breakfast' => $includeBreakfast, // 0 or 1
                'bed_type' => $room->bed_type,
                'adult_price' => $room->adult_price, // Add adult price
                'children_price' => $room->children_price, // Add children price
            ],
            'images' => array_map('asset', $images), // Absolute URLs
        ]);
    }

    // Show the bookingPage page
    public function bookingPage()
    {
        return view('publicSite.bookingPage'); 
    }

    // Show the bookingTravelerInfo page
    public function bookingTravelerInfo()
    {
        return view('publicSite.bookingTravelerInfo'); 
    }

    // Show the makePayemt page
    public function makePayemt(Request $request)
    {
        // Extract query parameters
        $roomId = $request->query('room_id');
        $breakfast = $request->query('breakfast') == 1 ? 'Included' : 'Not Included';
        $checkin = $request->query('checkin');
        $checkout = $request->query('checkout');
        $adults = $request->query('adults');
        $children = $request->query('children');
        $rooms = $request->query('rooms');
        $totalPrice = $request->query('total');

        // Calculate length of stay
        $checkinDate = Carbon::parse($checkin);
        $checkoutDate = Carbon::parse($checkout);
        $lengthOfStay = $checkinDate->diffInDays($checkoutDate);
        $nights = $lengthOfStay > 0 ? $lengthOfStay : 1; // Ensure at least 1 night
        $staySummary = "$lengthOfStay Days / $nights Night" . ($nights > 1 ? 's' : '');

        // Pass data to the view
        return view('publicSite.makePayemt', compact(
            'roomId',
            'breakfast',
            'checkin',
            'checkout',
            'adults',
            'children',
            'rooms',
            'totalPrice',
            'staySummary'
        ));
    }

    // Show the bookingSucessfull page
    public function bookingSucessfull()
    {
        return view('publicSite.bookingSucessfull'); 
    }

    // Show the hotelProfile page
    public function hotelProfile(Request $request)
    {
        // Fetch the hotel by ID with its active rooms
        $hotel = Hotel::where('id', $request->query('id'))
            ->where('status_id', 1) // Ensure the hotel is active
            ->with(['rooms' => function ($query) {
                $query->where('status_id', 1); // Fetch only active rooms
            }])
            ->firstOrFail(); // Throw 404 if hotel not found
        
        return view('publicSite.hotelProfile', compact('hotel'));
    }

}
