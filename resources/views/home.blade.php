<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/lemon-milk" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <title>Homepage</title>
</head>

<body>
    <div class="outer_homepage">

        {{-- Navbar --}}
            <div class="nav_bar">
                <div class="row">
                    <div class="col-2 col-xl-6 col-md-5 col-sm-2 animation_nav">
                        <a href="/">
                            <img src="image/logo_white.png" class="navbar_logo" />
                        </a>
                    </div>
                    <div class="col-10 col-xl-6 col-md-7 col-sm-10 btns_tabs animation_navTabs">
                        <button class="btn_navbar unageo "><a href="/applicant_login">LOGIN</a></button>
                        <button class="btn_navbar unageo"><a href="/devs">DEVS</a></button>
                        <button class="btn_navbar unageo"><a href="/enroll">ENROLL NOW</a></button>
                    </div>
                </div>
            </div>
            {{-- End of navbar --}}


        {{-- Content --}}
        <div class="content_style">
            <div class="cnt_tlt lemon">
                AURORA POLYTECHNIC COLLEGE
            </div>
            <div class="cnt_dsk">
                Aurora Polytechnic College is a dynamic web application developed by Group 2 using the Laravel framework. 
                It was designed to streamline the management of student records, enrollment, and academic processes. 
                Built in a Laravel environment, the project showcases the group’s skills in web development, 
                including backend logic, routing, database integration, and user-friendly interface design.
            </div>
            <div class="cnt_btnOuter">
                <button class="cnt_btn unageo"><a href="/enroll">ENROLL</a></button>
            </div>
        </div>


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


    .outer_homepage {
        width: 100%;
        height: 100vh;
        background-image: url("image/DSC_0314.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .content_style {
        margin: 0;
        position: absolute;
        bottom: 150px;
        text-align: center;
        width: 100%;
        animation: 1s ease-out 0s 1 slideInFromTop;
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

    @media (max-width: 591px) {
        .cnt_tlt {
            font-size: 30px;
        }
        .cnt_dsk {
            color: white;
            font-size: 12px;
            width: 100%;
            padding: 10px;
            margin: 0 auto;
        }
        .cnt_btn a {
            color: white;
            text-decoration: none;
            font-size: 10px;
        }
    }
</style>