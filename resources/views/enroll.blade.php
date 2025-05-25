<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrollment</title>
</head>
<body>
    <div>
        <!-- APPLICANT -->
        <form action="add" method="post">
            @csrf
            <h1>Personal Information</h1>
            <input name="applicantName" type="text" placeholder="Name" />
            <select name="gender" id="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
                        
            <input name="religion" placeholder="Religion" />
            <input name="dateOfBirth" type="date" placeholder="Date of birth" />
            <input name="age" type="number" placeholder="Age" />
            
            <select name="civilStatus" id="cvl_stus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>

            <input name="placeOfBirth" type="text" placeholder="Place of Birth" />
            <input name="applicantCitizenship" type="text" placeholder="Citizenship" />
            <input name="permanentAddress" type="text" placeholder="Permanent address" />
            <input name="telephone" type="tel" placeholder="Telephone" />
            <input name="emailAddress" type="email" placeholder="Email address" />
            <input name="fbAccount" type="text" placeholder="Facebook account" />
            
            <input name="hsName" type="text" placeholder="High school name" />
            <input name="hsAddress" type="text" placeholder="High school address" />
            <input name="generalAverage" type="number" placeholder="General average" />
            <input name="yearOfCompletion" type="number" placeholder="Year of completion" />


        <br>
        <br>

            <h1>Guardian</h1>
            

            <h2>Mother</h2>

            <input type="hidden" name="guardianType[]" value="Mother">

            <input name="guardianName[]" type="Text" placeholder="Name" />
            <input name="citizenship[]" type="text" placeholder="Citizenship" />

            <select name="martialStatus[]" id="Mthr_cvl_stus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>

            <input name="highestEducAttain[]" type="text" placeholder="Highest Education Attain" />
            <input name="presentOccupation[]" type="text" placeholder="Present Occupation" />
            <input name="monthlyIncome[]" type="number" placeholder="Monthly Income" />

            <br>

            <h2>Father</h2>

            <input type="hidden" name="guardianType[]" value="Father">

            <input name="guardianName[]" type="Text" placeholder="Name" />
            <input name="citizenship[]" type="text" placeholder="Citizenship" />

            <select name="martialStatus[]" id="fth_cvl_stus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>

            <input name="highestEducAttain[]" type="text" placeholder="Highest Education Attain" />
            <input name="presentOccupation[]" type="text" placeholder="Present Occupation" />
            <input name="monthlyIncome[]" type="number" placeholder="Monthly Income" />

            <br>

            <h2>Legal Guardian</h2>

            <input type="hidden" name="guardianType[]" value="Legal Guardian">


            <input name="guardianName[]" type="Text" placeholder="Name" />
            <input name="citizenship[]" type="text" placeholder="Citizenship" />

            <select name="martialStatus[]" id="lgl_grdn_cvl_stus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>

            <input name="highestEducAttain[]" type="text" placeholder="Highest Education Attain" />
            <input name="presentOccupation[]" type="text" placeholder="Present Occupation" />
            <input name="monthlyIncome[]" type="number" placeholder="Monthly Income" />
            
            <button>Submit</button>
        </form>

        <br>
        <br>
 
        <div>
            <h1>Intended Campus and Courses</h1>
            <select name="campus1stchoice" id="campus1stchoice">
                <option value="cainta">Cainta</option>
                <option value="angono">Angono</option>
                <option value="antipolo">Antipolo</option>
                <option value="morong">Morong</option>
                <option value="binangonan">Binangonan</option>
            </select>

            <select name="1stcampuscourse1stchoice" id="1stcampuscourse1stchoice">
                <option value="BSCS">Bachelor of Science in Computer Science</option>
                <option value="BSEE">Bachelor of Secondary Education major in Special Education</option>
                <option value="BSIT">Bachelor of Science in Information Technology</option>
                <option value="BAE">Bachelor of Arts in English</option>
                <option value="BSBA">Bachelor of Science in Business Administration</option>
                <option value="BSCE">Bachelor of Science in Civil Engineering</option>
                <option value="BSM">Bachelor of Science in Mathematics</option>
                <option value="BSPS">Bachelor of Science in Psychology</option>
                <option value="BST">Bachelor of Science in Tourism</option>
                <option value="BSA">Bachelor of Science in Accountancy</option>
                <option value="BSIM">Bachelor of Science in Information Management</option>
            </select>

            <select name="1stcampuscourse2ndchoice" id="1stcampuscourse2ndchoice">
                <option value="BSCS">Bachelor of Science in Computer Science</option>
                <option value="BSEE">Bachelor of Secondary Education major in Special Education</option>
                <option value="BSIT">Bachelor of Science in Information Technology</option>
                <option value="BAE">Bachelor of Arts in English</option>
                <option value="BSBA">Bachelor of Science in Business Administration</option>
                <option value="BSCE">Bachelor of Science in Civil Engineering</option>
                <option value="BSM">Bachelor of Science in Mathematics</option>
                <option value="BSPS">Bachelor of Science in Psychology</option>
                <option value="BST">Bachelor of Science in Tourism</option>
                <option value="BSA">Bachelor of Science in Accountancy</option>
                <option value="BSIM">Bachelor of Science in Information Management</option>
            </select>
        </div>

        <div>
            <select name="campus2ndchoice" id="campus2ndchoice">
                <option value="cainta">Cainta</option>
                <option value="angono">Angono</option>
                <option value="antipolo">Antipolo</option>
                <option value="morong">Morong</option>
                <option value="binangonan">Binangonan</option>
            </select>

            <select name="2ndcampuscourse1stchoice" id="2ndcampuscourse1stchoice">
                <option value="BSCS">Bachelor of Science in Computer Science</option>
                <option value="BSEE">Bachelor of Secondary Education major in Special Education</option>
                <option value="BSIT">Bachelor of Science in Information Technology</option>
                <option value="BAE">Bachelor of Arts in English</option>
                <option value="BSBA">Bachelor of Science in Business Administration</option>
                <option value="BSCE">Bachelor of Science in Civil Engineering</option>
                <option value="BSM">Bachelor of Science in Mathematics</option>
                <option value="BSPS">Bachelor of Science in Psychology</option>
                <option value="BST">Bachelor of Science in Tourism</option>
                <option value="BSA">Bachelor of Science in Accountancy</option>
                <option value="BSIM">Bachelor of Science in Information Management</option>
            </select>
            
            <select name="2ndcampuscourse2ndchoice" id="2ndcampuscourse2ndchoice">
                <option value="BSCS">Bachelor of Science in Computer Science</option>
                <option value="BSEE">Bachelor of Secondary Education major in Special Education</option>
                <option value="BSIT">Bachelor of Science in Information Technology</option>
                <option value="BAE">Bachelor of Arts in English</option>
                <option value="BSBA">Bachelor of Science in Business Administration</option>
                <option value="BSCE">Bachelor of Science in Civil Engineering</option>
                <option value="BSM">Bachelor of Science in Mathematics</option>
                <option value="BSPS">Bachelor of Science in Psychology</option>
                <option value="BST">Bachelor of Science in Tourism</option>
                <option value="BSA">Bachelor of Science in Accountancy</option>
                <option value="BSIM">Bachelor of Science in Information Management</option>
            </select>
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

    function updateCourse1BOptions() {
        const selected = course1a.value;
        [...course1b.options].forEach(opt => {
            opt.disabled = opt.value === selected;
        });
    }

    function updateCourse2Options() {
        const selected1 = course1a.value;
        const selected2 = course1b.value;
        [...course2a.options].forEach(opt => {
            opt.disabled = (opt.value === selected1 || opt.value === selected2);
        });
        [...course2b.options].forEach(opt => {
            opt.disabled = (opt.value === selected1 || opt.value === selected2);
        });
    }

    campus1.addEventListener("change", () => {
        updateCampus2Options();
    });

    course1a.addEventListener("change", () => {
        updateCourse1BOptions();
        updateCourse2Options();
    });

    course1b.addEventListener("change", () => {
        updateCourse2Options();
    });

    function updateCourse2BOptions() {
        const selected = course2a.value;
        [...course2b.options].forEach(opt => {
            opt.disabled = opt.value === selected || course1a.value === opt.value || course1b.value === opt.value;
        });
    }

    course2a.addEventListener("change", () => {
        updateCourse2BOptions();
    });

    course1a.addEventListener("change", updateCourse2BOptions);
    course1b.addEventListener("change", updateCourse2BOptions);

    // On load
    updateCourse2BOptions();


    // Run on page load
    updateCampus2Options();
    updateCourse1BOptions();
    updateCourse2Options();
    
</script>
