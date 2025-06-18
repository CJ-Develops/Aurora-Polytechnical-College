<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/lemon-milk" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <title>Developers</title>
</head>
<body>
    {{-- Navbar --}}
            <div class="nav_bar">
                <div class="row">
                    <div class="col-2 col-xl-6 col-md-5 col-sm-2 animation_nav">
                        <img src="image/logo_white.png" class="navbar_logo" />
                    </div>
                    <div class="col-10 col-xl-6 col-md-7 col-sm-10 btns_tabs animation_navTabs">
                        <button class="btn_navbar unageo"><a href="/">HOME</a></button>
                        <button class="btn_navbar unageo "><a href="/applicant_login">LOGIN</a></button>
                        <button class="btn_navbar unageo tab_active"><a href="#">DEVS</a></button>
                        <button class="btn_navbar unageo"><a href="/enroll">ENROLL NOW</a></button>
                    </div>
                </div>
            </div>
            {{-- End of navbar --}}

            <div class="lemon" style="text-align: center; color: white; font-size: 20px; margin-bottom: 100px">
                DEVELOPERS
            </div>
            <div class="container unageo">
                <div>
                    <div class="content">
                    <h5>Jan Marc</h5>
                    <span>DB Connection, File Routes</span>
                    </div>
                </div>
                <div>
                    <div class="content">
                    <h5>Rhon Jones</h5>
                    <span>Tested Features, Update/Delete Functions</span>
                    </div>
                </div>
                <div>
                    <div class="content">
                    <h5>Angelo Gabitan</h5>
                    <span>Setup DB and File Routing</span>
                    </div>
                </div>
                <div>
                    <div class="content">
                    <h5>Daniel Atega</h5>
                    <span>Created DB Structure, Displayed Tables</span>
                    </div>
                </div>
                <div>
                    <div class="content">
                    <h5>John Arcilla</h5>
                    <span>Documentation SQL Code</span>
                    </div>
                </div>
            </div>
</body>
</html>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap");

    body {
        background:rgb(7, 21, 33);
    }
.container {
  width: 100%;
  display: flex;
  justify-content: center;
  height: 70vh;
  gap: 10px;

  > div {
    flex: 0 0 320px;
    border-radius: 0.5rem;
    transition: 0.5s ease-in-out;
    cursor: pointer;
    box-shadow: 1px 5px 15px #1e0e3e;
    position: relative;
    overflow: hidden;

    &:nth-of-type(1) {
      background: url("image/devs5.jpg")
        no-repeat 50% / cover;
    }
    &:nth-of-type(2) {
      background: url("image/devs2.jpg")
        no-repeat 50% / cover;
    }
    &:nth-of-type(3) {
      background: url("image/devs3.jpg")
        no-repeat 50% / cover;
    }
    &:nth-of-type(4) {
      background: url("image/devs1.jpg")
        no-repeat 50% / cover;
    }
    &:nth-of-type(5) {
      background: url("image/devs4.jpg")
        no-repeat 50% / cover;
    }

    .content {
      font-size: 1rem;
      color: #fff;
      display: flex;
      align-items: center;
      padding: 15px;
      opacity: 0;
      flex-direction: column;
      height: 100%;
      justify-content: flex-end;
      background: rgb(7, 21, 33);
      background: linear-gradient(
        0deg,
        rgba(2, 32, 46, 0.68) 0%,
        rgba(255, 255, 255, 0) 100%
      );
      transform: translatey(100%);
      transition: opacity 0.5s ease-in-out, transform 0.5s 0.2s;
      visibility: hidden;

      span {
        display: block;
        margin-top: 5px;
        font-size: 0.7rem;
      }
    }

    &:hover {
      flex: 0 0 420px;
      box-shadow: 1px 3px 15px rgb(7, 21, 33);
      transform: translatey(-30px);
    }

    &:hover .content {
      opacity: 1;
      transform: translatey(0%);
      visibility: visible;
    }
  }
}

    </style>