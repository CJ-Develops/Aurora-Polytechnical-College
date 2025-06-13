@php
$editingApplicantId = request('editingApplicant');

$editingGuardianId = request('editingGuardian');

$editingIntendedApplicantID = request('editingIntendedApplicant');
$editingIntendedCourseCode = request('editingIntendedCourse');

$editingCourse = request('editingCourse');

@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 1rem;
            border-right: 1px solid #dee2e6;
            height: 100vh;
            position: fixed;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
            overflow-x: auto;
        }

        .form-inline-input {
            border: none;
            background: transparent;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Admin Dashboard</h4>
            <a href="/logout" class="btn btn-danger btn-sm mb-3">Logout</a>

            <div class="d-grid gap-2">
                <a href="{{ url('/admin?table=applicant') }}" class="btn {{ $table === 'applicant' ? 'btn-primary' : 'btn-outline-secondary' }}">Applicant Table</a>
                <a href="{{ url('/admin?table=guardian') }}" class="btn {{ $table === 'guardian' ? 'btn-primary' : 'btn-outline-secondary' }}">Guardian Table</a>
                <a href="{{ url('/admin?table=intended') }}" class="btn {{ $table === 'intended' ? 'btn-primary' : 'btn-outline-secondary' }}">Intended Course Table</a>
                <a href="{{ url('/admin?table=course') }}" class="btn {{ $table === 'course' ? 'btn-primary' : 'btn-outline-secondary' }}">Course Table</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @if ($table === 'applicant')
            <h2>List of Applicants</h2>
            <div style="overflow-x: auto;">
                <table class="table table-bordered table-striped" style="min-width: 1200px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Religion</th>
                            <th>Birth Date</th>
                            <th>Age</th>
                            <th>Civil Status</th>
                            <th>Birth Place</th>
                            <th>Citizenship</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>FB</th>
                            <th>HS</th>
                            <th>HS Address</th>
                            <th>GWA</th>
                            <th>Completion Year</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicants as $applicant)
                        @if ($editingApplicantId == $applicant->applicantID)
                        <form action="{{ route('applicant.update.raw', $applicant->applicantID) }}" method="POST">
                            @csrf
                            <tr>
                                <td>{{ $applicant->applicantID }}</td>
                                <td><input type="text" name="applicantName" value="{{ $applicant->applicantName }}" class="form-inline-input""></td>
                                <td>
                                    <select name=" gender" class="form-inline-input"">
                                        <option value=" M" {{ $applicant->gender == 'M' ? 'selected' : '' }}>Male</option>
                                    <option value="F" {{ $applicant->gender == 'F' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </td>
                                <td><input type="text" name="religion" value="{{ $applicant->religion }}" class="form-inline-input""></td>
                                <td><input type=" date" name="dateOfBirth" value="{{ $applicant->dateOfBirth }}" class="form-inline-input""></td>
                                <td><input type=" number" name="age" value="{{ $applicant->age }}" class="form-inline-input""></td>
                                <td>
                                    <select name=" civilStatus" class="form-inline-input"">
                                        <option value=" Single" {{ $applicant->civilStatus == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $applicant->civilStatus == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Divorced" {{ $applicant->civilStatus == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    <option value="Widowed" {{ $applicant->civilStatus == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    <option value="Separated" {{ $applicant->civilStatus == 'Separated' ? 'selected' : '' }}>Separated</option>
                                    </select>
                                </td>
                                <td><input type="text" name="placeOfBirth" value="{{ $applicant->placeOfBirth }}" class="form-inline-input""></td>
                                <td><input type=" text" name="applicantCitizenship" value="{{ $applicant->applicantCitizenship }}" class="form-inline-input""></td>
                                <td><input type=" text" name="permanentAddress" value="{{ $applicant->permanentAddress }}" class="form-inline-input""></td>
                                <td><input type=" number" name="telephone" value="{{ $applicant->telephone }}" class="form-inline-input""></td>
                                <td><input type=" email" name="emailAddress" value="{{ $applicant->emailAddress }}" class="form-inline-input""></td>
                                <td><input type=" text" name="fbAccount" value="{{ $applicant->fbAccount }}" class="form-inline-input""></td>
                                <td><input type=" text" name="hsName" value="{{ $applicant->hsName }}" class="form-inline-input""></td>
                                <td><input type=" text" name="hsAddress" value="{{ $applicant->hsAddress }}" class="form-inline-input""></td>
                                <td><input type=" number" name="generalAverage" value="{{ $applicant->generalAverage }}" class="form-inline-input""></td>
                                <td><input type=" number" name="yearOfCompletion" value="{{ $applicant->yearOfCompletion }}" class="form-inline-input""></td>
                                <td>
                                    <button type=" submit" class="btn btn-sm btn-success">Save</button>
                                    <a href="{{ route('admin.dashboard', ['table' => 'applicant']) }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </td>
                            </tr>
                        </form>
                        @else
                        <tr>
                            <td>{{ $applicant->applicantID }}</td>
                            <td>{{ $applicant->applicantName }}</td>
                            <td>{{ $applicant->gender }}</td>
                            <td>{{ $applicant->religion }}</td>
                            <td>{{ $applicant->dateOfBirth }}</td>
                            <td>{{ $applicant->age }}</td>
                            <td>{{ $applicant->civilStatus }}</td>
                            <td>{{ $applicant->placeOfBirth }}</td>
                            <td>{{ $applicant->applicantCitizenship }}</td>
                            <td>{{ $applicant->permanentAddress }}</td>
                            <td>{{ $applicant->telephone }}</td>
                            <td>{{ $applicant->emailAddress }}</td>
                            <td>{{ $applicant->fbAccount }}</td>
                            <td>{{ $applicant->hsName }}</td>
                            <td>{{ $applicant->hsAddress }}</td>
                            <td>{{ $applicant->generalAverage }}</td>
                            <td>{{ $applicant->yearOfCompletion }}</td>
                            <td>
                                <a href="{{ url()->current() . '?editingApplicant=' . $applicant->applicantID }}" class="btn btn-sm btn-warning">Update</a>
                                <a href="{{ route('applicant.delete', $applicant->applicantID) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @elseif ($table === 'guardian')
            <h2>List of Guardians</h2>
            <div style="overflow-x: auto;">
                <table class="table table-bordered table-striped" style="min-width: 800px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Applicant</th>
                            <th>Relationship</th>
                            <th>Name</th>
                            <th>Citizenship</th>
                            <th>Marital Status</th>
                            <th>Highest Education Attainment</th>
                            <th>Present Occupation</th>
                            <th>Monthly Income</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guardians as $guardian)
                        @if ($editingGuardianId == $guardian->guardianID)
                        <form action="{{ route('guardian.update.raw', [$guardian->guardianID, $guardian->fk_applicantID]) }}" method="POST">
                            @csrf
                            <tr>
                                <td>{{ $guardian->guardianID }}</td>
                                <td>{{ $guardian->fk_applicantID }}</td>
                                <td>
                                    <select name="guardianType" class="form-inline-input"">
                                        <option value=" Father" {{ $guardian->guardianType == 'Father' ? 'selected' : '' }}>Father</option>
                                        <option value="Mother" {{ $guardian->guardianType == 'Mother' ? 'selected' : '' }}>Mother</option>
                                        <option value="Legal Guardian" {{ $guardian->guardianType == 'Legal Guardian' ? 'selected' : '' }}>Legal Guardian</option>
                                    </select>
                                </td>
                                <td><input type="text" name="guardianName" value="{{ $guardian->guardianName }}" class="form-inline-input""></td>
                                <td><input type=" text" name="citizenship" value="{{ $guardian->citizenship }}" class="form-inline-input""></td>
                                <td>
                                    <select name=" martialStatus" class="form-inline-input">
                                    <option value="Single" {{ $guardian->martialStatus == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $guardian->martialStatus == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Divorced" {{ $guardian->martialStatus == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    <option value="Widowed" {{ $guardian->martialStatus == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    <option value="Separated" {{ $guardian->martialStatus == 'Separated' ? 'selected' : '' }}>Separated</option>
                                    </select>
                                </td>
                                <td><input type="text" name="highestEducAttain" value="{{ $guardian->highestEducAttain }}" class="form-inline-input""></td>
                                <td><input type=" text" name="presentOccupation" value="{{ $guardian->presentOccupation }}" class="form-inline-input""></td>
                                <td><input type=" number" name="monthlyIncome" value="{{ $guardian->monthlyIncome }}" class="form-inline-input""></td>
                                <td>
                                    <button type=" submit" class="btn btn-sm btn-success">Save</button>
                                    <a href="{{ route('admin.dashboard', ['table' => 'guardian']) }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </td>
                            </tr>
                        </form>
                        @else
                        <tr>
                            <td>{{ $guardian->guardianID }}</td>
                            <td>{{ $guardian->fk_applicantID }}</td>
                            <td>{{ $guardian->guardianType }}</td>
                            <td>{{ $guardian->guardianName }}</td>
                            <td>{{ $guardian->citizenship }}</td>
                            <td>{{ $guardian->martialStatus }}</td>
                            <td>{{ $guardian->highestEducAttain }}</td>
                            <td>{{ $guardian->presentOccupation }}</td>
                            <td>{{ $guardian->monthlyIncome }}</td>
                            <td>
                                <a href="{{ url()->current() }}?table=guardian&editingGuardian={{ $guardian->guardianID }}" class="btn btn-sm btn-warning">Update</a>

                                <a href="{{ route('guardian.delete', $guardian->guardianID) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            @elseif ($table === 'intended')
            <h2>Applicant's Intended Courses</h2>
            <div style="overflow-x: auto;">
                <table class="table table-bordered table-striped" style="min-width: 800px;">
                    <thead>
                        <tr>
                            <th>Applicant ID</th>
                            <th>Campus</th>
                            <th>1st Course Code</th>
                            <th>2nd Course Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groupedIntendeds as $key => $data)
                        @php
                        $isEditing = request('editingIntendedApplicant') == $data['fk_applicantID']
                        && request('campus') == $data['campus'];
                        @endphp

                        @if ($isEditing)
                        <tr>
                            <form action="{{ route('intended.update.raw') }}" method="POST">
                                @csrf
                                <input type="hidden" name="fk_applicantID" value="{{ $data['fk_applicantID'] }}">
                                <input type="hidden" name="original_campus" value="{{ $data['campus'] }}">
                                <td>{{ $data['fk_applicantID'] }}</td>
                                <td>
                                    <input type="text" name="campus" class="form-inline-input" value="{{ $data['campus'] }}">
                                </td>

                                @foreach ($data['courses'] as $index => $selectedCourse)
                                <td>
                                    <select name="courses[{{ $index }}]" class="form-inline-input">
                                        @foreach ($courses as $course)
                                        @php
                                        $courseCode = $course->courseCode;
                                        $alreadyAssignedInOtherCampus = isset($assignedCourseCampus[$data['fk_applicantID']][$courseCode]) &&
                                        $assignedCourseCampus[$data['fk_applicantID']][$courseCode] !== $data['campus'];
                                        @endphp
                                        <option value="{{ $courseCode }}"
                                            {{ $courseCode === $selectedCourse ? 'selected' : '' }}
                                            {{ $alreadyAssignedInOtherCampus ? 'disabled' : '' }}>
                                            {{ $course->courseName }} {{ $alreadyAssignedInOtherCampus ? '(Taken in another campus)' : '' }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                @endforeach

                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    <a href="{{ route('admin.dashboard', ['table' => 'intended']) }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </td>
                            </form>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $data['fk_applicantID'] }}</td>
                            <td>{{ $data['campus'] }}</td>
                            <td>{{ $data['courses'][0] ?? '-' }}</td>
                            <td>{{ $data['courses'][1] ?? '-' }}</td>
                            <td>
                                <a href="{{ url()->current() }}?table=intended&editingIntendedApplicant={{ $data['fk_applicantID'] }}&campus={{ urlencode($data['campus']) }}" class="btn btn-sm btn-warning">Update</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            @elseif ($table === 'course')
            <h2>List of Courses</h2>
            <div style="overflow-x: auto;">
                <table class="table table-bordered table-striped" style="min-width: 800px;">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Course</th>
                            <th>Duration</th>
                            <th>Department</th>
                            <th>Total Units</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="courseTableBody">
                        @foreach ($courses as $course)
                        @if ($editingCourse == $course->courseCode)
                        <tr>
                            <form action="{{ route('course.update.raw', ['courseCode' => $course->courseCode]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="original_courseCode" value="{{ $course->courseCode }}">
                                <td><input type="text" name="courseCode" value="{{ $course->courseCode }}" class="form-inline-input"></td>
                                <td><input type="text" name="courseName" value="{{ $course->courseName }}" class="form-inline-input"></td>
                                <td><input type="number" name="duration" value="{{ $course->duration }}" class="form-inline-input"></td>
                                <td><input type="text" name="department" value="{{ $course->department }}" class="form-inline-input"></td>
                                <td><input type="number" name="totalUnits" value="{{ $course->totalUnits }}" class="form-inline-input"></td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    <a href="{{ route('admin.dashboard', ['table' => 'course']) }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </td>
                            </form>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $course->courseCode }}</td>
                            <td>{{ $course->courseName }}</td>
                            <td>{{ $course->duration }}</td>
                            <td>{{ $course->department }}</td>
                            <td>{{ $course->totalUnits }}</td>
                            <td>
                                <a href="{{ url()->current() }}?table=course&editingCourse={{ $course->courseCode }}" class="btn btn-sm btn-warning">Update</a>
                                <a href="{{ route('course.delete', $course->courseCode) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 1rem;">
                <button type="button" class="btn btn-primary btn-sm" onclick="addNewCourseRow()">Add New Course</button>
            </div>

            <!-- Hidden Add Form -->
            <form id="addCourseForm" action="{{ route('course.add') }}" method="POST">
                @csrf
            </form>

            @endif
        </div>
    </div>

    @if($errors->has('delete_error'))
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            alert("{!! addslashes($errors->first('delete_error')) !!}");
        });
    </script>
    @endif

    @if(session('delete_error'))
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            alert("{{ session('delete_error') }}");
        });
    </script>
    @endif

    <script>
        function addNewCourseRow() {
            const tbody = document.getElementById('courseTableBody');

            if (tbody.querySelector('.new-course-row')) return;

            const tr = document.createElement('tr');
            tr.classList.add('new-course-row');

            tr.innerHTML = `
            <td><input type="text" name="courseCode" form="addCourseForm" class="form-inline-input" required></td>
            <td><input type="text" name="courseName" form="addCourseForm" class="form-inline-input" required></td>
            <td><input type="number" name="duration" form="addCourseForm" class="form-inline-input" required></td>
            <td><input type="text" name="department" form="addCourseForm" class="form-inline-input" required></td>
            <td><input type="number" name="totalUnits" form="addCourseForm" class="form-inline-input" required></td>
            <td>
                <button type="submit" form="addCourseForm" class="btn btn-sm btn-success">Add</button>
                <button type="button" class="btn btn-sm btn-secondary" onclick="this.closest('tr').remove()">Cancel</button>
            </td>
        `;

            tbody.appendChild(tr);
        }
    </script>

</body>

</html>