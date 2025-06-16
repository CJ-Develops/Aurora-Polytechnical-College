<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/lemon-milk" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <title>Applicant Login</title>
</head>

<body>
    <div class="outer_login">

        {{-- Navbar --}}
        <div class="nav_bar">
            <div class="row">
                <div class="col-6 animation_nav">
                    <img src="image/logo_white.png" class="navbar_logo" />
                </div>
                <div class="col-6 btns_tabs animation_navTabs">
                    <button class="btn_navbar unageo"><a href="/">HOME</a></button>
                    <button class="btn_navbar unageo tab_active"><a href="/applicant_login">LOGIN</a></button>
                    <button class="btn_navbar unageo"><a href="#">DEVS</a></button>
                    <button class="btn_navbar unageo"><a href="/enroll">ENROLL NOW</a></button>
                </div>
            </div>
        </div>
        {{-- End of navbar --}}

        {{-- Content --}}
        <div class="content_style">
            <div class="row">
                {{-- <div class="cnt_tlt lemon">
            AURORA POLYTECHNIC COLLEGE
        </div>
        <div class="cnt_dsk">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            Zet dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat.
        </div>
        <div class="cnt_btnOuter">
            <button class="cnt_btn unageo"><a href="/enroll">ENROLL</a></button>
        </div> --}}
                <div class="col-6">

                </div>
                <div class="col-6" style="align-content: center; padding: 0px 200px">
                    <h1 style="text-align: center; color: white" class="lemon">Applicant Login</h1>

                    <form action="/login" method="POST">
                        @csrf

                        <label style="color: white" for="">Applicant ID</label>
                        <input style="margin-bottom: 20px" type="text" class="form-control" aria-label="Username" name="applicantID" placeholder="Applicant ID" required>

                        <label style="color: white" for="">Password</label>
                        <input name="password" class="form-control" type="password" placeholder="Password" minlength="8" required>

                        <button style="margin-top: 20px" class="btn btn-primary" type="submit">Submit</button>
                    </form>

                    <div style="color: white">still not enrolled? <a href="/enroll">Enroll here</a></div>
                </div>
            </div>







            @if (session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
            @endif
        </div>
</body>

</html>



<style>
    body {
        overflow: hidden;
    }

    @keyframes slideInFromTop {
        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slideInFromLeft {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInFromRight {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .animation_nav {
        animation: 1s ease-out 0s 1 slideInFromLeft;
    }

    .animation_navTabs {
        animation: 1s ease-out 0s 1 slideInFromRight;
    }

    .lemon {
        font-family: 'Lemon Milk', sans-serif;
    }


    .outer_login {
        width: 100%;
        height: 100vh;
        background-image: url("image/DSC_0323.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .content_style {
        animation: 1s ease-out 0s 1 slideInFromTop;
        height: 70vh;
        align-content: center
    }

    .cnt_tlt {
        color: white;
        font-size: 60px;

    }

    .cnt_dsk {
        color: white;
        font-size: 12px;
        width: 480px;
        margin: 0 auto;
    }

    .cnt_btn {
        background: transparent;
        border: 0;
        margin: 0px 20px;
        padding: 3px 50px 5px 50px;
        border: 1px solid white;
    }

    .cnt_btnOuter {
        margin: 30px 0px 0px 0px;
    }

    .cnt_btn a {
        color: white;
        text-decoration: none;
        font-size: 12px;
    }
</style>