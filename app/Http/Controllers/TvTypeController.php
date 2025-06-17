<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TvType;
use App\Models\Listing;
use Illuminate\Support\Str;



class TvTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:20|unique:tv_types,name',
        ]);

        // Insert into the database
        TvType::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'TV Type added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */


    public function addNewtype()
    { 
        return view('admin.addNewType'); 
    }


    public function viewType()
    {
        $tvTypes = TvType::paginate(4); // Paginate with 10 entries per page
        return view('admin.viewType', compact('tvTypes'));
    }
    
    public function addImage()
    { 
        $tvTypes = TvType::all(); // Fetch all TV types
        return view('admin.addImage', compact('tvTypes'));
    }
    




    public function storeImage(Request $request)
    {
        // Validation
        $request->validate([
            'listingCategory' => 'required|exists:tv_types,id',
            'image_path' => 'required|image|mimes:jpeg,jpg,png|max:10240', // Validate image
        ]);
    
        // Handle image upload
        if ($request->hasFile('image_path')) {
            // Get the uploaded file
            $image = $request->file('image_path');
            
            // Generate a random unique name without original name
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            
            // Move the image to the public/TvImage folder
            $image->move(public_path('TvImage'), $imageName);
    
            // Get the image URL (store relative path)
            $imagePath = 'TvImage/' . $imageName;
        }
    
        // Store the new listing
        Listing::create([
            'type_id' => $request->listingCategory,
            'image_path' => $imagePath,
        ]);
    
        // Redirect or return with success message
        return redirect()->back()->with('success', 'Image added successfully!');
    }
    
    

    public function viewImage()
    {
        // Retrieve images with associated categories, ordered in descending order
        $images = Listing::with('tvType')->latest()->paginate(4); // Adjust pagination as needed
    
        return view('admin.viewImage', compact('images'));
    }

    public function viewImageType1()
    {
    $images = Listing::with('tvType')
                ->where('type_id', 1)
                ->latest()
                ->paginate(4); 
    
        return view('admin.viewImageType1', compact('images'));
    } 

    public function viewImageType2()
    {
        $images = Listing::with('tvType')
        ->where('type_id', 2)
        ->latest()
        ->paginate(4); 
    
        return view('admin.viewImageType2', compact('images'));
    }    

    public function viewImageType3()
    {
        $images = Listing::with('tvType')
        ->where('type_id', 3)
        ->latest()
        ->paginate(4); 
    
        return view('admin.viewImageType3', compact('images'));
    }

    

    public function destroy($id)
    {
        $image = Listing::find($id);
    
        if (!$image) {
            return response()->json(['success' => false, 'error' => 'Image not found.'], 404);
        }
    
        // Delete the image file from storage if it exists
        $imagePath = public_path($image->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        $image->delete();
    
        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }

    public function updateImageOrder(Request $request, $id)
    {
        $image = Listing::find($id);
        if (!$image) {
            return response()->json(['success' => false, 'message' => 'Image not found']);
        }
    
        $request->validate([
            'order' => 'required|integer|min:1'
        ]);
    
        // Check if another record has the same type_id and order
        $existingImage = Listing::where('type_id', $image->type_id)
                                ->where('orders', $request->order)
                                ->where('id', '!=', $id) // Exclude the current image
                                ->first();
    
        if ($existingImage) {
            // Set the old order value to null
            $existingImage->orders = null;
            $existingImage->save();
        }
    
        // Update the current image's order
        $image->orders = $request->order;
        $image->save();
    
        return response()->json(['success' => true, 'message' => 'Order updated successfully']);
    }
    


    public function apiViewImageType1()
    {
        return $this->getImagesByType(1);
    }
    
    public function apiViewImageType2()
    {
        return $this->getImagesByType(2);
    }
    
    public function apiViewImageType3()
    {
        return $this->getImagesByType(3);
    }
    
    // Helper function to fetch images by type
    private function getImagesByType($typeId)
    {
        $images = Listing::where('type_id', $typeId)
                        ->with('tvType')
                        ->orderByRaw('ISNULL(orders), orders ASC') // Orders first, NULLs last
                        ->get();
    
        // Get the TV type name
        $imageType = $images->isNotEmpty() ? $images->first()->tvType->name : 'Unknown';
    
        // Extract only the image paths
        $imagePaths = $images->pluck('image_path');
    
        return response()->json([
            'image_type' => $imageType,
            'images' => $imagePaths,
        ]);
    }
    
    
    


}
