<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingStatus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CustomerBookingManageController extends Controller
{
    public function customerManageBooking(Request $request)
    {
        $customerId = $request->session()->get('customer.id');

        // If customer is not logged in, redirect or show error
        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Please log in to view your bookings.');
        }

        // Filter bookings where the booking's room's hotel's customer_id matches the session customer ID
        $bookings = Booking::whereHas('room.hotel', function ($query) use ($customerId) {
            $query->where('customer_id', $customerId);
        })->with(['room.hotel', 'status'])->get();

        return view('publicSite.customerManageBooking', compact('bookings'));
    }

    public function viewBooking(Request $request)
    {
        $booking = Booking::with('status', 'room')->findOrFail($request->query('id'));
        
        // Verify customer owns the hotel
        $customerId = $request->session()->get('customer.id');
        if (!$customerId || $booking->room->hotel->customer_id != $customerId) {
            return redirect()->route('customerManageBooking')->with('error', 'Unauthorized access to this booking.');
        }

        return view('publicSite.customerViewBooking', compact('booking'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $customerId = $request->session()->get('customer.id');
        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Please log in to update booking status.');
        }

        $booking = Booking::with('status', 'room.hotel')->findOrFail($id);

        // Verify customer owns the hotel
        if ($booking->room->hotel->customer_id != $customerId) {
            return redirect()->route('customerManageBooking')->with('error', 'Unauthorized to update this booking.');
        }

        $validator = Validator::make($request->all(), [
            'status_id' => 'required|exists:booking_statuses,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update booking status
        $booking->status_id = $request->status_id;
        $booking->save();

        // Fetch status name
        $status = BookingStatus::find($request->status_id)->name;

        // Send email notification using Mail::raw
        $emailContent = "Dear {$booking->billing_name},\n\n";
        $emailContent .= "Your booking (ID: {$booking->id}) status has been updated to: " . ucfirst($status) . ".\n";
        $emailContent .= "Booking Details:\n";
        $emailContent .= "Room: {$booking->room->name}\n";
        $emailContent .= "Check-In: " . \Carbon\Carbon::parse($booking->checkin)->format('d M Y') . "\n";
        $emailContent .= "Check-Out: " . \Carbon\Carbon::parse($booking->checkout)->format('d M Y') . "\n";
        $emailContent .= "Total Price: $" . number_format($booking->total_price, 2) . "\n\n";
        $emailContent .= "Thank you for choosing BoomBitz!\n";
        $emailContent .= "Best regards,\nBoomBitz Team";

        try {
            Mail::raw($emailContent, function ($message) use ($booking) {
                $message->to($booking->email)
                        ->subject('Booking Status Update - BoomBitz')
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Booking status updated, but failed to send email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Booking status updated successfully and email sent!');
    }
}