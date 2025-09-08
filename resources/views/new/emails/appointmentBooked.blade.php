<!DOCTYPE html>
<html>

<head>
    <title>New Appointment</title>
</head>

<body>
    <h2>📅 New Appointment</h2>
    <p><strong>Name:</strong> {{ $appointment->name }}</p>
    <p><strong>Email:</strong> {{ $appointment->email }}</p>
    @if ($appointment->phone)
        <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
    @endif
    <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>

    @if ($appointment->message)
        <p><strong>Message:</strong> {{ $appointment->message }}</p>
    @endif
</body>

</html>
