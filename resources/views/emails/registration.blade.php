<!DOCTYPE html>
<html>
<head>
    <title>New Event Registration</title>
</head>
<body>
    <h2>New Event Registration</h2>
    
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['number'] }}</p>
    <p><strong>Interested Country:</strong> {{ $data['country'] ?? 'Not specified' }}</p>
    <p><strong>Course:</strong> {{ $data['course'] }}</p>
    <p><strong>Intake:</strong> {{ $data['intake'] ?? 'Not specified' }}</p>
    <p><strong>Qualification:</strong> {{ $data['qualification'] ?? 'Not specified' }}</p>
    <p><strong>Academic Score:</strong> {{ $data['academic_score'] ?? 'Not specified' }}</p>
    <p><strong>English Score:</strong> {{ $data['english_score'] ?? 'Not specified' }}</p>
    <p><strong>Passed Year:</strong> {{ $data['passed_year'] ?? 'Not specified' }}</p>
    
    @if(isset($data['event']) && $data['event'])
        <p><strong>Event:</strong> {{ $data['event'] }}</p>
        @if(isset($data['event_location']) && $data['event_location'])
            <p><strong>Event Location:</strong> {{ $data['event_location'] }}</p>
        @endif
        @if(isset($data['event_date']) && $data['event_date'])
            <p><strong>Event Date:</strong> {{ $data['event_date'] }}</p>
        @endif
        @if(isset($data['event_time']) && $data['event_time'])
            <p><strong>Event Time:</strong> {{ $data['event_time'] }}</p>
        @endif
    @else
        @if(isset($data['university']) && $data['university'])
            <p><strong>University:</strong> {{ $data['university'] }}</p>
        @endif
    @endif
</body>
</html>