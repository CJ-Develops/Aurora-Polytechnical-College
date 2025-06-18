<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/lemon-milk" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Applicant Dashboard</title>
</head>
<body>

<div style="text-align: center">
    <h2 class="lemon">Applicant Dashboard</h2>
    <p>Hello, <strong>{{ $applicant->applicantName }}</strong>. your application is still <strong>pending</strong> please login frequently to see your status.

    <div>
        This is your password: <strong>{{ $applicant->password }}</strong>. Please keep it secured.</p>
    </div>
    
<a href="/logout">Logout</a>
</div>
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
<!-- approved, pending, declined -->


</body>
</html>