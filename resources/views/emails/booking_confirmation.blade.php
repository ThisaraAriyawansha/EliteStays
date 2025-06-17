<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 20px; text-align: center; }
        .content { padding: 20px; border: 1px solid #ddd; }
        .footer { text-align: center; padding: 10px; font-size: 12px; color: #777; }
        h2 { color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>BoomBitz Booking Confirmation</h2>
        </div>
        <div class="content">
            <p>Dear {{ $bookingDetails['billing_name'] }},</p>
            <p>Thank you for your booking with BoomBitz! Below are the details of your reservation:</p>
            <ul>
                <li><strong>Booking ID:</strong> {{ $bookingDetails['id'] }}</li>
                <li><strong>Room ID:</strong> {{ $bookingDetails['room_id'] }}</li>
                <li><strong>Check-In:</strong> {{ \Carbon\Carbon::parse($bookingDetails['checkin'])->format('d M Y') }}</li>
                <li><strong>Check-Out:</strong> {{ \Carbon\Carbon::parse($bookingDetails['checkout'])->format('d M Y') }}</li>
                <li><strong>Adults:</strong> {{ $bookingDetails['adults'] }}</li>
                <li><strong>Children:</strong> {{ $bookingDetails['children'] }}</li>
                <li><strong>Rooms:</strong> {{ $bookingDetails['rooms'] }}</li>
                <li><strong>Breakfast:</strong> {{ $bookingDetails['breakfast'] }}</li>
                <li><strong>Total Price:</strong> USD {{ number_format($bookingDetails['total_price'], 2) }}</li>
            </ul>
            <p>We look forward to welcoming you! If you have any questions, please contact us.</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} BoomBitz. All rights reserved.</p>
        </div>
    </div>
</body>
</html>