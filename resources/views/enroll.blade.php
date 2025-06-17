<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/lemon-milk" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <title>Enrollment</title>
</head>

<body>
    <div class="outer_login">
    {{-- Navbar --}}
            <div class="nav_bar">
                <div class="row">
                    <div class="col-2 col-xl-6 col-md-5 col-sm-2 animation_nav">
                        <img src="image/logo_white.png" class="navbar_logo" />
                    </div>
                    <div class="col-10 col-xl-6 col-md-7 col-sm-10 btns_tabs animation_navTabs">
                        <button class="btn_navbar unageo"><a href="/">HOME</a></button>
                        <button class="btn_navbar unageo "><a href="/applicant_login">LOGIN</a></button>
                        <button class="btn_navbar unageo"><a href="/devs">DEVS</a></button>
                        <button class="btn_navbar unageo"><a href="/enroll">ENROLL NOW</a></button>
                    </div>
                </div>
            </div>
            {{-- End of navbar --}}
            
    <div class="container_enrollment">
        <form action="{{ url('/addFullEnrollment') }}" method="POST">
            @csrf
            
            <div>
                <div class="row" style="margin-bottom: 20px">
                    <h1 class="lemon" style="color: white">Personal Information</h1>
                    <div class="col-auto">
                        <label for="name" class="form-label unageo" style="color: white">Name</label>
                        <input style="margin-bottom: 10px" id="name" class="form-control unageo" name="applicantName" type="text" placeholder="Name" />
                    </div>

                    <div class="col-auto">
                        <label for="gender_inpt" class="form-label unageo" style="color: white">Gender</label>
                        <select style="margin-bottom: 10px" class="form-control unageo" name="gender" id="gender gender_inpt">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="religion" class="form-label unageo" style="color: white">Religion</label>
                        <input style="margin-bottom: 10px" id="religion" class="form-control unageo" name="religion" placeholder="Religion"/>
                    </div>

                    <div class="col-auto">
                        <label for="date" class="form-label unageo" style="color: white">Gender</label>
                        <input style="margin-bottom: 10px" id="gender" class="form-control unageo" name="dateOfBirth" type="date" placeholder="Date of birth"/>
                    </div>

                    <div class="col-auto">
                        <label for="age" class="form-label unageo" style="color: white">Age</label>
                        <input style="margin-bottom: 10px" id="age" class="form-control unageo" name="age" type="number" placeholder="Age"/>
                    </div>

                    <div class="col-auto">
                        <label for="cvl_stus_inpt" class="form-label unageo" style="color: white">Gender</label>
                        <select style="margin-bottom: 10px"  class="form-control unageo" name="civilStatus" id="cvl_stus cvl_stus_inpt">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>

                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-auto">
                        <label for="placeOfBirth" class="form-label unageo" style="color: white">Place of Birth</label>
                        <input style="margin-bottom: 10px" id="placeOfBirth" class="form-control unageo" name="placeOfBirth" type="text" placeholder="Place of Birth" >
                    </div>

                    <div class="col-auto">
                        <label for="permanentAddress" class="form-label unageo" style="color: white">Citizenship</label>
                        <input style="margin-bottom: 10px" id="permanentAddress" class="form-control unageo" name="applicantCitizenship" type="text" placeholder="Citizenship" >
                    </div>

                    <div class="col-auto">
                        <label for="permanentAddress" class="form-label unageo" style="color: white">Permanent address</label>
                        <input style="margin-bottom: 10px" id="permanentAddress" class="form-control unageo" name="permanentAddress" type="textfioe" placeholder="Permanent address">
                    </div>

                    <div class="col-auto">
                        <label for="telephone" class="form-label unageo" style="color: white">Telephone</label>
                        <input style="margin-bottom: 10px" id="telephone" class="form-control unageo" name="telephone" type="tel" placeholder="Telephone" >
                    </div>

                    <div class="col-auto">
                        <label for="emailAddress" class="form-label unageo" style="color: white">Email address</label>
                        <input style="margin-bottom: 10px" id="emailAddress" class="form-control unageo" name="emailAddress" type="email" placeholder="Email address" >
                    </div>

                    <div class="col-auto">
                        <label for="fbAccount" class="form-label unageo" style="color: white">Facebook account</label>
                        <input style="margin-bottom: 10px" id="fbAccount" class="form-control unageo" name="fbAccount" type="text" placeholder="Facebook account" >
                    </div>
                </div>

                <div class="row" style="margin-bottom: 20px">
                    <h2 class="lemon" style="color: white">high school information</h2>
                    <div class="col-auto">
                        <label for="hsName" class="form-label unageo" style="color: white">High school name</label>
                        <input style="margin-bottom: 10px" id="hsName" class="form-control unageo" name="hsName" type="text" placeholder="High school name" >
                    </div>

                    <div class="col-auto">
                        <label for="hsAddress" class="form-label unageo" style="color: white">High school address</label>
                        <input style="margin-bottom: 10px" id="hsAddress" class="form-control unageo" name="hsAddress" type="text" placeholder="High school address" >
                    </div>

                    <div class="col-auto">
                        <label for="hsAddress" class="form-label unageo" style="color: white">High school address</label>
                        <input style="margin-bottom: 10px" id="hsAddress" class="form-control unageo" name="hsAddress" type="text" placeholder="High school address" >
                    </div>

                    <div class="col-auto">
                        <label for="generalAverage" class="form-label unageo" style="color: white">General average</label>
                        <input style="margin-bottom: 10px" id="generalAverage" class="form-control unageo" name="generalAverage" type="number" placeholder="General average" >
                    </div>

                    <div class="col-auto">
                        <label for="yearOfCompletion" class="form-label unageo" style="color: white">General average</label>
                        <input style="margin-bottom: 10px" id="yearOfCompletion" class="form-control unageo" name="yearOfCompletion" type="number" placeholder="Year of completion" >
                    </div>

                </div>
            </div>

            <br>
            <br>

                <div>
                    <h1 class="lemon" style="color: white">Guardian</h1>

                    <h2 class="lemon" style="color: white">Mother</h2>

                    <div class="row">
                    <input type="hidden" name="guardianType[]" value="Mother">

                        <div class="col-auto">
                            <label for="guardianName" class="form-label unageo" style="color: white">Name</label>
                            <input style="margin-bottom: 10px" id="guardianName" class="form-control unageo" name="guardianName[]" type="Text" placeholder="Name" >
                        </div>

                        <div class="col-auto">
                            <label for="citizenship" class="form-label unageo" style="color: white">Citizenship</label>
                            <input style="margin-bottom: 10px" id="citizenship" class="form-control unageo" name="citizenship[]" type="text" placeholder="Citizenship" >
                        </div>

                        <div class="col-auto">
                            <label for="Mthr_cvl_stus_inpt" class="form-label unageo" style="color: white">Citizenship</label>
                            <select name="martialStatus[]" class="form-control unageo" id="Mthr_cvl_stus Mthr_cvl_stus_inpt">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="highestEducAttain" class="form-label unageo" style="color: white">Highest Education Attain</label>
                            <input style="margin-bottom: 10px" id="highestEducAttain" class="form-control unageo" name="highestEducAttain[]" type="text" placeholder="Highest Education Attain" >
                        </div>

                        <div class="col-auto">
                            <label for="presentOccupation" class="form-label unageo" style="color: white">Present Occupation</label>
                            <input style="margin-bottom: 10px" id="presentOccupation" class="form-control unageo" name="presentOccupation[]" type="text" placeholder="Present Occupation" >
                        </div>

                        <div class="col-auto">
                            <label for="monthlyIncome" class="form-label unageo" style="color: white">Monthly Income</label>
                            <input style="margin-bottom: 10px" id="monthlyIncome" class="form-control unageo" name="monthlyIncome[]" type="number" placeholder="Monthly Income" >
                        </div>
                </div>
                <br>

                <div>
                    <h2 class="lemon" style="color: white">Father</h2>

                    <div class="row">
                    <input type="hidden" name="guardianType[]" value="Father">

                        <div class="col-auto">
                            <label for="guardianName" class="form-label unageo" style="color: white">Name</label>
                            <input style="margin-bottom: 10px" id="guardianName" class="form-control unageo" name="guardianName[]" type="Text" placeholder="Name" >
                        </div>

                        <div class="col-auto">
                            <label for="citizenship" class="form-label unageo" style="color: white">Citizenship</label>
                            <input style="margin-bottom: 10px" id="citizenship" class="form-control unageo" name="citizenship[]" type="text" placeholder="Citizenship" >
                        </div>

                        <div class="col-auto">
                            <label for="fth_cvl_stus_inpt" class="form-label unageo" style="color: white">Citizenship</label>
                            <select name="martialStatus[]" class="form-control unageo" id="fth_cvl_stus Mthr_cvl_stus_inpt">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="highestEducAttain" class="form-label unageo" style="color: white">Highest Education Attain</label>
                            <input style="margin-bottom: 10px" id="highestEducAttain" class="form-control unageo" name="highestEducAttain[]" type="text" placeholder="Highest Education Attain" >
                        </div>

                        <div class="col-auto">
                            <label for="presentOccupation" class="form-label unageo" style="color: white">Present Occupation</label>
                            <input style="margin-bottom: 10px" id="presentOccupation" class="form-control unageo" name="presentOccupation[]" type="text" placeholder="Present Occupation" >
                        </div>

                        <div class="col-auto">
                            <label for="monthlyIncome" class="form-label unageo" style="color: white">Monthly Income</label>
                            <input style="margin-bottom: 10px" id="monthlyIncome" class="form-control unageo" name="monthlyIncome[]" type="number" placeholder="Monthly Income" >
                        </div>
                    </div>

                <br>

                <div>
                    <h2 class="lemon" style="color: white">Legal Guardian</h2>

                    <div class="row">
                    <input type="hidden" name="guardianType[]" value="Legal Guardian">

                        <div class="col-auto">
                            <label for="guardianName" class="form-label unageo" style="color: white">Name</label>
                            <input style="margin-bottom: 10px" id="guardianName" class="form-control unageo" name="guardianName[]" type="Text" placeholder="Name" >
                        </div>

                        <div class="col-auto">
                            <label for="citizenship" class="form-label unageo" style="color: white">Citizenship</label>
                            <input style="margin-bottom: 10px" id="citizenship" class="form-control unageo" name="citizenship[]" type="text" placeholder="Citizenship" >
                        </div>

                        <div class="col-auto">
                            <label for="lgl_grdn_cvl_stus_inpt" class="form-label unageo" style="color: white">Citizenship</label>
                            <select name="martialStatus[]" class="form-control unageo" id="lgl_grdn_cvl_stus lgl_grdn_cvl_stus_inpt">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="highestEducAttain" class="form-label unageo" style="color: white">Highest Education Attain</label>
                            <input style="margin-bottom: 10px" id="highestEducAttain" class="form-control unageo" name="highestEducAttain[]" type="text" placeholder="Highest Education Attain" >
                        </div>

                        <div class="col-auto">
                            <label for="presentOccupation" class="form-label unageo" style="color: white">Present Occupation</label>
                            <input style="margin-bottom: 10px" id="presentOccupation" class="form-control unageo" name="presentOccupation[]" type="text" placeholder="Present Occupation" >
                        </div>

                        <div class="col-auto">
                            <label for="monthlyIncome" class="form-label unageo" style="color: white">Monthly Income</label>
                            <input style="margin-bottom: 10px" id="monthlyIncome" class="form-control unageo" name="monthlyIncome[]" type="number" placeholder="Monthly Income" >
                        </div>
                    </div>

            </div>
            
            <br>
            <br>
            
            <div class="row" style="margin-bottom: 20px">
                <h1 class="lemon" style="color: white">Intended Campus and Courses</h1>

                <div class="col-auto">
                        <label for="campus1stchoice_inpt" class="form-label unageo" style="color: white">Select 1st Campus choice</label>
                        <select name="campus[]" class="form-control unageo" id="campus1stchoice campus1stchoice_inpt" required>
                            <option value="" disabled selected>Select Course</option>
                            <option value="Cainta">Cainta</option>
                            <option value="Angono">Angono</option>
                            <option value="Antipolo">Antipolo</option>
                            <option value="Morong">Morong</option>
                            <option value="Binangonan">Binangonan</option>
                        </select>
                </div>

                <div class="col-auto">
                        <label for="1stcampuscourse1stchoice_inpt" class="form-label unageo" style="color: white">Select 1st Course choice</label>
                        <select name="courseCode[]" class="form-control unageo" id="1stcampuscourse1stchoice 1stcampuscourse1stchoice_inpt" required>
                            <option value="" disabled selected>Select Course</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->courseCode }}">{{ $course->courseName }}</option>
                            @endforeach
                        </select>
                <input type="hidden" name="priority[]" value="campus1_course1">
                </div>

                <div class="col-auto">
                        <label for="1stcampuscourse2ndchoice_inpt" class="form-label unageo" style="color: white">Select 1st Course choice</label>
                        <select name="courseCode[]" class="form-control unageo" id="1stcampuscourse2ndchoice 1stcampuscourse2ndchoice_inpt" required>
                            <option value="" disabled selected>Select Course</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->courseCode }}">{{ $course->courseName }}</option>
                            @endforeach
                        </select>
                <input type="hidden" name="priority[]" value="campus1_course2">
                </div>

            </div>
            
            <div class="row" style="margin-bottom: 20px">
                <div class="col-auto">
                        <label for="campus2ndchoice_inpt" class="form-label unageo" style="color: white">Select 2nd Campus choice</label>
                        <select name="campus[]" class="form-control unageo" id="campus2ndchoice campus2ndchoice_inpt" required>
                            <option value="" disabled selected>Select Course</option>
                            <option value="Cainta">Cainta</option>
                            <option value="Angono">Angono</option>
                            <option value="Antipolo">Antipolo</option>
                            <option value="Morong">Morong</option>
                            <option value="Binangonan">Binangonan</option>
                        </select>
                </div>

                <div class="col-auto">
                        <label for="2ndcampuscourse1stchoice_inpt" class="form-label unageo" style="color: white">Select 2nd Course choice</label>
                        <select name="courseCode[]" class="form-control unageo" id="2ndcampuscourse1stchoice 2ndcampuscourse1stchoice_inpt" required>
                            <option value="" disabled selected>Select Course</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->courseCode }}">{{ $course->courseName }}</option>
                            @endforeach
                        </select>
                <input type="hidden" name="priority[]" value="campus2_course1">
                </div>

                <div class="col-auto">
                        <label for="2ndcampuscourse2ndchoice_inpt" class="form-label unageo" style="color: white">Select 2nd Course choice</label>
                        <select name="courseCode[]" class="form-control unageo" id="2ndcampuscourse2ndchoice 2ndcampuscourse2ndchoice_inpt" required>
                            <option value="" disabled selected>Select Course</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->courseCode }}">{{ $course->courseName }}</option>
                            @endforeach
                        </select>
                <input type="hidden" name="priority[]" value="campus2_course2">
                </div>

            </div>
            
            <button class="btn btn-primary" type="submit" style="width: 200px">Submit</button>
            
        </form>
    </div>
</div>
</body>

</html>


<script>
    const campus1 = document.getElementById("campus1stchoice");
    const campus2 = document.getElementById("campus2ndchoice");

    const course1a = document.getElementById("1stcampuscourse1stchoice");
    const course1b = document.getElementById("1stcampuscourse2ndchoice");

    const course2a = document.getElementById("2ndcampuscourse1stchoice");
    const course2b = document.getElementById("2ndcampuscourse2ndchoice");

    function updateCampus2Options() {
        const selected = campus1.value;
        [...campus2.options].forEach(opt => {
            opt.disabled = opt.value === selected;
        });
    }

    // Prevent same course in campus 1
    function updateCourse1BOptions() {
        const selected = course1a.value;
        [...course1b.options].forEach(opt => {
            opt.disabled = opt.value === selected;
        });
    }

    function updateCourse2BOptions() {
        const selected = course2a.value;
        [...course2b.options].forEach(opt => {
            opt.disabled = opt.value === selected;
        });
    }

    function bindEvents() {
        campus1.addEventListener("change", updateCampus2Options);

        course1a.addEventListener("change", () => {
            updateCourse1BOptions();
        });

        course1b.addEventListener("change", () => {
            updateCourse1BOptions();
        });

        course2a.addEventListener("change", () => {
            updateCourse2BOptions();
        });

        course2b.addEventListener("change", () => {
            updateCourse2BOptions();
        });
    }

    function initialize() {
        updateCampus2Options();
        updateCourse1BOptions();
        updateCourse2BOptions();
    }

    bindEvents();
    initialize();
</script>

<style>
    .outer_login {
        width: 100%;
        height: 100%;
        background-image: 
    linear-gradient(to left, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)), 
    url('image/OZM01931.jpg');
        /* background-image: url("image/DSC_0323.jpg"); */
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .container_enrollment {
        padding: 100px
    }


    @media (max-width: 1181px) {
        .container_enrollment {
            padding: 40px
        }

    }

    @media (max-width: 521px) {
        .col-auto {
            width: 100%;
        }
    }
    </style>