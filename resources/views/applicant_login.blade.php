<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appicant Login</title>
</head>

<body>
    <h1>Appicant Login</h1>

    <form action="/login" method="POST">
        @csrf

        <label for="">Applicant ID</label>
        <input name="applicantID" type="text" placeholder="Applicant ID" required>

        <label for="">Password</label>
        <input name="password" type="password" placeholder="Password" minlength="8" required>

        <button type="submit">Submit</button>
    </form>

    <a href="/enroll">Enroll here</a>


    @if (session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif
</body>

</html>