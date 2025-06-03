<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Dashboard</title>
</head>
<body>

<div>
    <div>
        Applicant Dashboard
    </div>
    <div>
        hello, {{ $name }} your application is still pending please login frequently to see your status.
    </div>
</div>

<div>
    Hello, {{ $name }} this is your student dashboard.
</div>

<!-- approved, pending, declined -->

<a href="/logout">Logout</a>

</body>
</html>