<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    // Display the signup form
    public function signup()
    {
        return view('publicSite.signup');
    }

    // Handle form submission and save customer data
    public function customerregister(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new customer
        Customer::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'status_id' => 1, // Default status_id
        ]);

        // Redirect back with success message
        return redirect()->Back()->with('success', 'Account created successfully!');
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            // Store customer data in session
            $request->session()->put('customer', [
                'id' => $customer->id,
                'username' => $customer->username,
                'email' => $customer->email,
            ]);

            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

    // Display the customer profile
    public function profile(Request $request)
    {
        $customer = $request->session()->get('customer');
        if (!$customer) {
            return redirect()->route('login')->with('error', 'Please log in to view your profile.');
        }

        $customerModel = Customer::find($customer['id']);
        if (!$customerModel) {
            return redirect()->route('login')->with('error', 'Customer not found.');
        }

        // Calculate profile completion
        $fields = ['first_name', 'last_name', 'email', 'mobile', 'dob', 'about', 'image_path','username'];
        $filled = 0;
        foreach ($fields as $field) {
            if (!empty($customerModel->$field)) {
                $filled++;
            }
        }
        $completionPercentage = round(($filled / count($fields)) * 100);

        return view('publicSite.profile', compact('customerModel', 'completionPercentage'));
    }

    // Update personal information and profile picture
    public function updateProfile(Request $request)
{
    $customerSession = session('customer');
    if (!$customerSession) {
        return redirect()->route('login')->with('error', 'Please log in to update your profile.');
    }

    $request->validate([
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'mobile' => 'nullable|string|max:20',
        'dob' => 'nullable|date',
        'gender' => 'nullable|string|max:50',
        'about' => 'nullable|string|max:1000',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // Max 2MB
    ]);

    $customer = Customer::find($customerSession['id']);

    $data = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'mobile' => $request->mobile,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'about' => $request->about,
    ];

    // Handle image upload using your custom method
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('Profile'), $imageName);
        $imagePath = 'Profile/' . $imageName;

        // Optionally delete old image if needed
        if ($customer->image_path && file_exists(public_path($customer->image_path))) {
            unlink(public_path($customer->image_path));
        }

        $data['image_path'] = $imagePath;
    }

    $customer->update($data);

    // Update session
    $request->session()->put('customer', [
        'id' => $customer->id,
        'username' => $customer->username,
        'email' => $customer->email,
        'first_name' => $customer->first_name,
        'last_name' => $customer->last_name,
        'mobile' => $customer->mobile,
        'dob' => $customer->dob,
        'gender' => $customer->gender,
        'about' => $customer->about,
        'image_path' => $customer->image_path,
    ]);

    return redirect()->route('customer.profile')->with('success', 'Profile updated successfully!');
}

    // Update email
    public function updateEmail(Request $request)
    {
        $customerSession = session('customer');
        if (!$customerSession) {
            return redirect()->route('login')->with('error', 'Please log in to update your email.');
        }

        $request->validate([
            'email' => 'required|email|unique:customers,email,' . $customerSession['id'],
        ]);

        $customer = Customer::find($customerSession['id']);
        $customer->update([
            'email' => $request->email,
        ]);

        $request->session()->put('customer.email', $request->email);

        return redirect()->route('customer.profile')->with('success', 'Email updated successfully!');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $customerSession = session('customer');
        if (!$customerSession) {
            return redirect()->route('login')->with('error', 'Please log in to update your password.');
        }

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Customer::find($customerSession['id']);
        if (!Hash::check($request->old_password, $customer->password)) {
            return back()->with('error', 'The old password is incorrect.');
        }

        $customer->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('customer.profile')->with('success', 'Password updated successfully!');
    }

    // Handle logout
    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

    // Display password reset form (placeholder)
    public function showPasswordResetForm()
    {
        return view('publicSite.password_reset');
    }
}