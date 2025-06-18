<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/lemon-milk" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Applicant Info</title>
</head>

<body>

    <div style="text-align: center">
        <h2 class="lemon">Applicant Dashboard</h2>
        <p>Hello, <strong>{{ $applicant->applicantName }}</strong>. Your password is shown below. Please keep it secured.
        </p>
        <p>Your Applicant ID is, <strong>{{ $applicant->applicantID }}</strong>
        </p>

        <div class="row" style="margin: 0 auto">
            <div class="col-auto" style="margin: 0 auto">
                <input class="form-control" type="password" value="{{ $applicant->password }}" id="myInput" />
            </div>
        </div>
        <input type="checkbox" onclick="myFunction()"> Show Password

        <div>
            <a style="margin: 0 auto" href="/logout">Logout</a>
        </div>
    </div>


</body>

</html>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>