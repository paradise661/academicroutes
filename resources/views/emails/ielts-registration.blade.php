<!DOCTYPE html>
<html>
<head>
    <title>New IELTS Class Registration</title>
</head>
<body>
    <h2>New IELTS Class Registration</h2>
    
    <h3>Personal Details</h3>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Contact Number:</strong> {{ $data['number'] }}</p>
    <p><strong>Location:</strong> {{ $data['location'] }}</p>
    
    <h3>Program Enrollment</h3>
    <p><strong>Program:</strong> {{ $data['program_enrollment'] }}</p>
    @if($data['program_enrollment'] == 'Others' && !empty($data['program_other']))
        <p><strong>Other Program:</strong> {{ $data['program_other'] }}</p>
    @endif
    
    <h3>Class Information</h3>
    <p><strong>Class Type:</strong> {{ $data['class_type'] }}</p>
    <p><strong>Preferred Joining Date:</strong> {{ $data['preferred_joining_date'] }}</p>
    <p><strong>Preferred Timing:</strong> {{ $data['preferred_timing'] }}</p>
    @if($data['preferred_timing'] == 'Others' && !empty($data['timing_other']))
        <p><strong>Custom Timing:</strong> {{ $data['timing_other'] }}</p>
    @endif
    
    <h3>Deposit Information</h3>
    <p><strong>Deposit Made:</strong> {{ $data['deposit_made'] ? 'Yes' : 'No' }}</p>
    @if($data['deposit_made'] && !empty($data['deposit_amount']))
        <p><strong>Deposit Amount:</strong> ${{ $data['deposit_amount'] }}</p>
    @endif
    
    <h3>University Application</h3>
    <p><strong>Applied to University:</strong> {{ $data['university_applied'] ? 'Yes' : 'No' }}</p>
    @if($data['university_applied'] && !empty($data['university_name']))
        <p><strong>University Name:</strong> {{ $data['university_name'] }}</p>
    @endif
    @if(!empty($data['university_other']))
        <p><strong>Other University Info:</strong> {{ $data['university_other'] }}</p>
    @endif
    
    <h3>Additional Information</h3>
    <p><strong>Country of Interest:</strong> {{ $data['country_interest'] }}</p>
    <p><strong>Consultancy:</strong> {{ $data['consultancy'] }}</p>
    <p><strong>Reference:</strong> {{ $data['reference'] }}</p>
</body>
</html>