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
                            <input style="margin-bottom: 10px" id="name" class="form-control unageo" name="applicantName" type="text" placeholder="Name" required/>
                        </div>

                        <div class="col-auto">
                            <label for="gender_inpt" class="form-label unageo" style="color: white">Gender</label>
                            <select style="margin-bottom: 10px" class="form-control unageo" name="gender" id="gender gender_inpt" required>
                                <option value="" disabled selected>Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="religion" class="form-label unageo" style="color: white">Religion</label>
                            <input style="margin-bottom: 10px" id="religion" class="form-control unageo" name="religion" placeholder="Religion" required/>
                        </div>

                        <div class="col-auto">
                            <label for="date" class="form-label unageo" style="color: white">Birth Date</label>
                            <input style="margin-bottom: 10px" id="gender" class="form-control unageo" name="dateOfBirth" type="date" placeholder="Date of birth" required/>
                        </div>

                        <div class="col-auto">
                            <label for="age" class="form-label unageo" style="color: white">Age</label>
                            <input style="margin-bottom: 10px" id="age" class="form-control unageo" name="age" type="number" placeholder="Age" required/>
                        </div>

                        <div class="col-auto">
                            <label for="cvl_stus_inpt" class="form-label unageo" style="color: white">Civil Status</label>
                            <select style="margin-bottom: 10px" class="form-control unageo" name="civilStatus" id="cvl_stus cvl_stus_inpt" required>
                                <option value="" disabled selected>Civil Status</option>
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
                            <input style="margin-bottom: 10px" id="placeOfBirth" class="form-control unageo" name="placeOfBirth" type="text" placeholder="Place of Birth" required/>
                        </div>

                        <div class="col-auto">
                            <label for="permanentAddress" class="form-label unageo" style="color: white">Citizenship</label>
                            <input style="margin-bottom: 10px" id="permanentAddress" class="form-control unageo" name="applicantCitizenship" type="text" placeholder="Citizenship" required/>
                        </div>

                        <div class="col-auto">
                            <label for="permanentAddress" class="form-label unageo" style="color: white">Permanent address</label>
                            <input style="margin-bottom: 10px" id="permanentAddress" class="form-control unageo" name="permanentAddress" type="textfioe" placeholder="Permanent address" required/>
                        </div>

                        <div class="col-auto">
                            <label for="telephone" class="form-label unageo" style="color: white">Telephone</label>
                            <input style="margin-bottom: 10px" id="telephone" class="form-control unageo" name="telephone" type="tel" placeholder="Telephone" required/>
                        </div>

                        <div class="col-auto">
                            <label for="emailAddress" class="form-label unageo" style="color: white">Email address</label>
                            <input style="margin-bottom: 10px" id="emailAddress" class="form-control unageo" name="emailAddress" type="email" placeholder="Email address" required/>
                        </div>

                        <div class="col-auto">
                            <label for="fbAccount" class="form-label unageo" style="color: white">Facebook account</label>
                            <input style="margin-bottom: 10px" id="fbAccount" class="form-control unageo" name="fbAccount" type="text" placeholder="Facebook account">
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px">
                        <h2 class="lemon" style="color: white">high school information</h2>
                        <div class="col-auto">
                            <label for="hsName" class="form-label unageo" style="color: white">High school name</label>
                            <input style="margin-bottom: 10px" id="hsName" class="form-control unageo" name="hsName" type="text" placeholder="High school name" required/>
                        </div>

                        <div class="col-auto">
                            <label for="hsAddress" class="form-label unageo" style="color: white">High school address</label>
                            <input style="margin-bottom: 10px" id="hsAddress" class="form-control unageo" name="hsAddress" type="text" placeholder="High school address" required/>
                        </div>

                        <div class="col-auto">
                            <label for="generalAverage" class="form-label unageo" style="color: white">General average</label>
                            <input style="margin-bottom: 10px" id="generalAverage" class="form-control unageo" name="generalAverage" type="number" placeholder="General average" required/>
                        </div>

                        <div class="col-auto">
                            <label for="yearOfCompletion" class="form-label unageo" style="color: white">Year of completion</label>
                            <input style="margin-bottom: 10px" id="yearOfCompletion" class="form-control unageo" name="yearOfCompletion" type="number" placeholder="Year of completion" required/>
                        </div>

                    </div>
                </div>

                <br>
                <br>

                <div>
                    <h1 class="lemon" style="color: white">Guardian</h1>
                    <div id="guardianContainer">
                        <div class="row guardian-entry">
                            <div class="col-auto">
                                <label for="guardianName" class="form-label unageo" style="color: white">Guardian Type</label>
                                <select class="form-control unageo guardian-type" style="margin-bottom: 10px" name="guardianType[]" required>
                                    <option value="" disabled selected>Guardian Type</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Legal Guardian">Legal Guardian</option>
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="guardianName" class="form-label unageo" style="color: white">Name</label>
                                <input style="margin-bottom: 10px" id="guardianName" class="form-control unageo" name="guardianName[]" type="Text" placeholder="Name" required/>
                            </div>

                            <div class="col-auto">
                                <label for="citizenship" class="form-label unageo" style="color: white">Citizenship</label>
                                <input style="margin-bottom: 10px" id="citizenship" class="form-control unageo" name="citizenship[]" type="text" placeholder="Citizenship" required/>
                            </div>

                            <div class="col-auto">
                                <label for="martialStatus" class="form-label unageo" style="color: white">Marital Status</label>
                                <select name="martialStatus[]" class="form-control unageo martial-status" id="martialStatus" required/>
                                    <option value="" disabled selected>Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="highestEducAttain" class="form-label unageo" style="color: white">Highest Education Attain</label>
                                <input style="margin-bottom: 10px" id="highestEducAttain" class="form-control unageo" name="highestEducAttain[]" type="text" placeholder="Highest Education Attain" />
                            </div>

                            <div class="col-auto">
                                <label for="presentOccupation" class="form-label unageo" style="color: white">Present Occupation</label>
                                <input style="margin-bottom: 10px" id="presentOccupation" class="form-control unageo" name="presentOccupation[]" type="text" placeholder="Present Occupation" />
                            </div>

                            <div class="col-auto">
                                <label for="monthlyIncome" class="form-label unageo" style="color: white">Monthly Income</label>
                                <input style="margin-bottom: 10px" id="monthlyIncome" class="form-control unageo" name="monthlyIncome[]" type="number" placeholder="Monthly Income" />
                            </div>

                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="addGuardianBtn" style="width: 200px;">Add Guardian</button>


                    <br>
                    <br>

                    <div class="row" style="margin-bottom: 20px">
                        <h1 class="lemon" style="color: white">Intended Campus and Courses</h1>

                        <!-- 1st Campus -->
                        <div class="col-auto">
                            <label for="campus1stchoice_inpt" class="form-label unageo" style="color: white">Select 1st Campus Choice</label>
                            <select name="campus[]" class="form-control unageo" id="campus1stchoice_inpt" required>
                                <option value="" disabled selected>Select Campus</option>
                                <option value="Cainta">Cainta</option>
                                <option value="Angono">Angono</option>
                                <option value="Antipolo">Antipolo</option>
                                <option value="Morong">Morong</option>
                                <option value="Binangonan">Binangonan</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="campus1_course1" class="form-label unageo" style="color: white">1st Course Choice</label>
                            <select name="courseCode[]" class="form-control unageo" id="campus1_course1" required>
                                <option value="" disabled selected>Select Course</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->courseCode }}">{{ $course->courseName }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="priority[]" value="campus1_course1">
                        </div>

                        <div class="col-auto">
                            <label for="campus1_course2" class="form-label unageo" style="color: white">2nd Course Choice</label>
                            <select name="courseCode[]" class="form-control unageo" id="campus1_course2" required>
                                <option value="" disabled selected>Select Course</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->courseCode }}">{{ $course->courseName }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="priority[]" value="campus1_course2">
                        </div>
                    </div>

                    <!-- 2nd Campus -->
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-auto">
                            <label for="campus2ndchoice_inpt" class="form-label unageo" style="color: white">Select 2nd Campus Choice</label>
                            <select name="campus[]" class="form-control unageo" id="campus2ndchoice_inpt" required>
                                <option value="" disabled selected>Select Campus</option>
                                <option value="Cainta">Cainta</option>
                                <option value="Angono">Angono</option>
                                <option value="Antipolo">Antipolo</option>
                                <option value="Morong">Morong</option>
                                <option value="Binangonan">Binangonan</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="campus2_course1" class="form-label unageo" style="color: white">1st Course Choice</label>
                            <select name="courseCode[]" class="form-control unageo" id="campus2_course1" required>
                                <option value="" disabled selected>Select Course</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->courseCode }}">{{ $course->courseName }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="priority[]" value="campus2_course1">
                        </div>

                        <div class="col-auto">
                            <label for="campus2_course2" class="form-label unageo" style="color: white">2nd Course Choice</label>
                            <select name="courseCode[]" class="form-control unageo" id="campus2_course2" required>
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
document.addEventListener("DOMContentLoaded", () => {
    const campus1 = document.getElementById('campus1stchoice_inpt');
    const campus2 = document.getElementById('campus2ndchoice_inpt');

    const c1_course1 = document.getElementById('campus1_course1');
    const c1_course2 = document.getElementById('campus1_course2');
    const c2_course1 = document.getElementById('campus2_course1');
    const c2_course2 = document.getElementById('campus2_course2');

    // Disable same campus
    function updateCampusOptions() {
        [...campus2.options].forEach(option => {
            option.disabled = (option.value && option.value === campus1.value);
        });
        [...campus1.options].forEach(option => {
            option.disabled = (option.value && option.value === campus2.value);
        });
    }

    // Disable duplicate courses in the same campus
    function updateCourseOptions(course1, course2) {
        const selectedValue = course1.value;

        [...course2.options].forEach(option => {
            option.disabled = (option.value && option.value === selectedValue);
        });
    }

    // Re-enable all options before re-disabling to avoid permanent disable
    function resetOptions(select) {
        [...select.options].forEach(option => {
            option.disabled = false;
        });
    }

    // Listeners
    [campus1, campus2].forEach(el => {
        el.addEventListener("change", () => {
            resetOptions(campus1);
            resetOptions(campus2);
            updateCampusOptions();
        });
    });

    [[c1_course1, c1_course2], [c2_course1, c2_course2]].forEach(([course1, course2]) => {
        course1.addEventListener("change", () => {
            resetOptions(course2);
            updateCourseOptions(course1, course2);
        });
        course2.addEventListener("change", () => {
            resetOptions(course1);
            updateCourseOptions(course2, course1);
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
