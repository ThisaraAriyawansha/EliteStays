<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RoomBookingController extends Controller
{
    public function roombooking(Request $request)
    {
        if ($request->isMethod('get')) {
            // Extract query parameters for GET request
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
            $nights = $lengthOfStay > 0 ? $lengthOfStay : 1;
            $staySummary = "$lengthOfStay Days / $nights Night" . ($nights > 1 ? 's' : '');

            return view('publicSite.makePayemt', compact(
                'roomId', 'breakfast', 'checkin', 'checkout', 'adults', 'children', 'rooms', 'totalPrice', 'staySummary'
            ));
        }

        // Handle POST request (form submission)
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|integer',
            'breakfast' => 'required|in:0,1',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'rooms' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'billing_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'passport_number' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'city_state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'special_notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save booking to database
        $booking = \App\Models\Booking::create([
            'room_id' => $request->room_id,
            'breakfast' => $request->breakfast == 1,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'adults' => $request->adults,
            'children' => $request->children,
            'rooms' => $request->rooms,
            'total_price' => $request->total,
            'billing_name' => $request->billing_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'passport_number' => $request->passport_number,
            'address' => $request->address,
            'country' => $request->country,
            'city_state' => $request->city_state,
            'postal_code' => $request->postal_code,
            'special_notes' => $request->special_notes,
            'status_id' => 1, // Default to 'pending'
        ]);

        // Prepare booking details for email
        $bookingDetails = [
            'id' => $booking->id,
            'room_id' => $request->room_id,
            'billing_name' => $request->billing_name,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'adults' => $request->adults,
            'children' => $request->children,
            'rooms' => $request->rooms,
            'total_price' => $request->total,
            'breakfast' => $request->breakfast == 1 ? 'Included' : 'Not Included',
        ];

        // Send email using Mail::send
        try {
            Mail::send('emails.booking_confirmation', ['bookingDetails' => $bookingDetails], function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Booking Confirmation - BoomBitz')
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Exception $e) {
            // Log the error and continue
            \Log::error('Failed to send booking confirmation email: ' . $e->getMessage());
            return redirect()->route('makePayemt', $request->only([
                'room_id', 'breakfast', 'checkin', 'checkout', 'adults', 'children', 'rooms', 'total'
            ]))->with('success', 'Booking request submitted successfully! However, we couldn’t send the confirmation email.');
        }

        return redirect()->route('makePayemt', $request->only([
            'room_id', 'breakfast', 'checkin', 'checkout', 'adults', 'children', 'rooms', 'total'
        ]))->with('success', 'Booking request submitted successfully! A confirmation email has been sent.');
    }
}