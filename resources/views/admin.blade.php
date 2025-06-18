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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/lemon-milk" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

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
            background-color: rgb(31, 42, 53);
            padding: 1rem;
            border-right: 1px solid rgb(121, 146, 172);
            height: 100vh;
            position: fixed;
        }

        .btn__tabs:hover {
            background-color: rgb(75, 107, 138);
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
            <h5 class="lemon" style="color: white; margin-bottom: 20px">Admin Dashboard</h5>
            <a href="/logout" class="btn btn-danger btn-sm unageo" style="width: 100%; margin-bottom: 50px">Logout</a>

            <form method="GET" action="{{ route('search.handle') }}" class="d-flex align-items-center mb-3" style="gap: 10px;">
                <input type="hidden" name="table" value="{{ $table }}">

                <label for="search" class="visually-hidden">Search {{ ucfirst($table) }} ID</label>
                <input
                    type="text"
                    id="search"
                    name="search"
                    class="form-control"
                    placeholder="Search {{ ucfirst($table) }} ID..."
                    value="{{ request('search') }}"
                    style="max-width: 250px;">

                <button type="submit" class="btn btn-outline-light">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <div class="d-grid gap-2">
                <a href="{{ url('/admin?table=applicant') }}" class="btn unageo btn__tabs {{ $table === 'applicant' ? 'btn__active' : 'btn-outline-secondary' }}">Applicant Table</a>
                <a href="{{ url('/admin?table=guardian') }}" class="btn unageo btn__tabs {{ $table === 'guardian' ? 'btn__active' : 'btn-outline-secondary' }}">Guardian Table</a>
                <a href="{{ url('/admin?table=intended') }}" class="btn unageo btn__tabs {{ $table === 'intended' ? 'btn__active' : 'btn-outline-secondary' }}">Intended Course Table</a>
                <a href="{{ url('/admin?table=course') }}" class="btn unageo btn__tabs {{ $table === 'course' ? 'btn__active' : 'btn-outline-secondary' }}">Course Table</a>
            </div>


        </div>

        <!-- Main Content -->
        <div class="main-content">
            @if ($table === 'applicant')

<<<<<<< HEAD
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
=======
            <div class="content">
                <div class="">
                    <h2 class="lemon" style="color: white">List of Applicants</h2>
                    <div style="overflow-x: auto;" class="table-responsive">
                        <table class="table table-striped custom-table" style="min-width: 1200px;">
                            <thead>
                                <tr scope="row" class="unageo">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Religion</th>
                                    <th scope="col">Birth Date</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Civil Status</th>
                                    <th scope="col">Birth Place</th>
                                    <th scope="col">Citizenship</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">FB</th>
                                    <th scope="col">HS</th>
                                    <th scope="col">HS Address</th>
                                    <th scope="col">GWA</th>
                                    <th scope="col">Completion Year</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($applicants) === 0)
                                <tr>
                                    <td colspan="18" class="text-center text-warning">No applicants found.</td>
                                </tr>
                                @else
                                @foreach ($applicants as $applicant)
                                @if ($editingApplicantId == $applicant->applicantID)
                                <form action="{{ route('applicant.update.raw', $applicant->applicantID) }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $applicant->applicantID }}</td>
                                        <td><input type="text" name="applicantName" value="{{ $applicant->applicantName }}" style="border: none; background: transparent; color: orange"></td>
                                        <td>
                                            <select class="form-control" name="gender" style="border: 1px solid orange; background: transparent; color: orange">
                                                <option value="M" {{ $applicant->gender == 'M' ? 'selected' : '' }}>Male</option>
                                                <option value="F" {{ $applicant->gender == 'F' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" name="religion" value="{{ $applicant->religion }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="date" name="dateOfBirth" value="{{ $applicant->dateOfBirth }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="number" name="age" value="{{ $applicant->age }}" style="border: 1px solid orange; background: transparent; color: orange;"></td>
                                        <td>
                                            <select class="form-control" name="civilStatus" style="border: 1px solid orange; background: transparent; color: orange">
                                                <option value="Single" {{ $applicant->civilStatus == 'Single' ? 'selected' : '' }}>Single</option>
                                                <option value="Married" {{ $applicant->civilStatus == 'Married' ? 'selected' : '' }}>Married</option>
                                                <option value="Divorced" {{ $applicant->civilStatus == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                <option value="Widowed" {{ $applicant->civilStatus == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                <option value="Separated" {{ $applicant->civilStatus == 'Separated' ? 'selected' : '' }}>Separated</option>
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" name="placeOfBirth" value="{{ $applicant->placeOfBirth }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="applicantCitizenship" value="{{ $applicant->applicantCitizenship }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="permanentAddress" value="{{ $applicant->permanentAddress }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="telephone" value="{{ $applicant->telephone }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="email" name="emailAddress" value="{{ $applicant->emailAddress }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="fbAccount" value="{{ $applicant->fbAccount }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="hsName" value="{{ $applicant->hsName }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="hsAddress" value="{{ $applicant->hsAddress }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="number" name="generalAverage" value="{{ $applicant->generalAverage }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="number" name="yearOfCompletion" value="{{ $applicant->yearOfCompletion }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td>
                                            <button type="submit" class="btn btn-sm" style="color: green"><i class="bi bi-save"></i></button>
                                            <a href="{{ route('admin.dashboard', ['table' => 'applicant']) }}" class="btn btn-sm" style="color: red"><i class="bi bi-x-square"></i></a>
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
                                        <a href="{{ url()->current() . '?editingApplicant=' . $applicant->applicantID }}" class="btn btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('applicant.delete', $applicant->applicantID) }}" method="POST" style="display:inline;" onsubmit="return confirmDeleteApplicant('{{ $applicant->applicantID }}')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
>>>>>>> cfb6dbe58256e22c034f8837077bf8351ec1d615

                    @elseif ($table === 'guardian')
                    <h2 class="lemon" style="color: white">List of Guardians</h2>
                    <div style="overflow-x: auto;" class="table-responsive">
                        <table class="table table-striped custom-table" style="min-width: 800px;">
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
                                @if (count($guardians) === 0)
                                <tr>
                                    <td colspan="10" class="text-center text-warning">No guardians found for this applicant.</td>
                                </tr>
                                @else
                                @foreach ($guardians as $guardian)
                                @if ($editingGuardianId == $guardian->guardianID)
                                <form action="{{ route('guardian.update.raw', [$guardian->guardianID, $guardian->fk_applicantID]) }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $guardian->guardianID }}</td>
                                        <td>{{ $guardian->fk_applicantID }}</td>
                                        <td>
                                            <select class="form-control" name="guardianType" style="border: 1px solid orange; background: transparent; color: orange">
                                                <option value="Father" {{ $guardian->guardianType == 'Father' ? 'selected' : '' }}>Father</option>
                                                <option value="Mother" {{ $guardian->guardianType == 'Mother' ? 'selected' : '' }}>Mother</option>
                                                <option value="Legal Guardian" {{ $guardian->guardianType == 'Legal Guardian' ? 'selected' : '' }}>Legal Guardian</option>
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" name="guardianName" value="{{ $guardian->guardianName }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="citizenship" value="{{ $guardian->citizenship }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td>
                                            <select class="form-control" name="martialStatus" style="border: 1px solid orange; background: transparent; color: orange">
                                                <option value=" Single" {{ $guardian->martialStatus == 'Single' ? 'selected' : '' }}>Single</option>
                                                <option value="Married" {{ $guardian->martialStatus == 'Married' ? 'selected' : '' }}>Married</option>
                                                <option value="Divorced" {{ $guardian->martialStatus == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                <option value="Widowed" {{ $guardian->martialStatus == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                <option value="Separated" {{ $guardian->martialStatus == 'Separated' ? 'selected' : '' }}>Separated</option>
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" name="highestEducAttain" value="{{ $guardian->highestEducAttain }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="text" name="presentOccupation" value="{{ $guardian->presentOccupation }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td><input class="form-control" type="number" name="monthlyIncome" value="{{ $guardian->monthlyIncome }}" style="border: 1px solid orange; background: transparent; color: orange"></td>
                                        <td>
                                            <button type="submit" class="btn btn-sm" style="color: green"><i class="bi bi-save"></i></button>
                                            <a href="{{ route('admin.dashboard', ['table' => 'guardian']) }}" class="btn btn-sm" style="color: red"><i class="bi bi-x-square"></i></a>
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
                                        <a href="{{ url()->current() }}?table=guardian&editingGuardian={{ $guardian->guardianID }}" class="btn btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('guardian.delete', $guardian->guardianID) }}" method="POST" style="display: inline;" onsubmit="return confirmDeleteGuardian('{{ $guardian->guardianID }}', '{{ $guardian->fk_applicantID }}')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

<<<<<<< HEAD
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
                                    <select name=" martialStatus" class="form-inline-input"">
                                        <option value=" Single" {{ $guardian->martialStatus == 'Single' ? 'selected' : '' }}>Single</option>
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
                            <th>Course Code</th>
                            <th>Campus</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($intendeds as $intended)
                        @if ($editingIntendedApplicantID == $intended->fk_applicantID && $editingIntendedCourseCode == $intended->fk_courseCode)
                        <tr>
                            <form action="{{ route('intended.update.raw') }}" method="POST">
                                @csrf
                                <input type="hidden" name="fk_applicantID" value="{{ $intended->fk_applicantID }}">
                                <input type="hidden" name="fk_courseCode" value="{{ $intended->fk_courseCode }}">
                                <td>{{ $intended->fk_applicantID }}</td>
                                <td>{{ $intended->fk_courseCode }}</td>
                                <td>
                                    <input type="text" name="campus" value="{{ $intended->campus }}" class="form-inline-input">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    <a href="{{ route('admin.dashboard', ['table' => 'intended']) }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </td>
                            </form>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $intended->fk_applicantID }}</td>
                            <td>{{ $intended->fk_courseCode }}</td>
                            <td>{{ $intended->campus }}</td>
                            <td>
                                <a href="{{ url()->current() }}?table=intended&editingIntendedApplicant={{ $intended->fk_applicantID }}&editingIntendedCourse={{ $intended->fk_courseCode }}" class="btn btn-sm btn-warning">Update</a>

                                <a href="{{ route('intended.delete', [$intended->fk_applicantID, $intended->fk_courseCode]) }}" class="btn btn-sm btn-danger">Delete</a>
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
                    <tbody>
                        @foreach ($courses as $course)
                        @if ($editingCourse == $course->courseCode)
                        <tr>
                            <form action="{{ route('course.update.raw', ['courseCode' => $course->courseCode]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="courseCode" value="{{ $course->courseCode }}">
                                <td>{{ $course->courseCode }}</td>
                                <td><input type="text" name="courseName" value="{{ $course->courseName }}"></td>
                                <td><input type="number" name="duration" value="{{ $course->duration }}"></td>
                                <td><input type="text" name="department" value="{{ $course->department }}"></td>
                                <td><input type="number" name="totalUnits" value="{{ $course->totalUnits }}"></td>
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
=======
                    @elseif ($table === 'intended')
                    <h2 class="lemon" style="color: white">Applicant's Intended Courses</h2>
                    <div style="overflow-x: auto;" class="table-responsive">
                        <table class="table table-striped custom-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th>Applicant ID</th>
                                    <th>Priority</th>
                                    <th>Campus</th>
                                    <th>Course Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($groupedIntendeds) === 0)
                                <tr>
                                    <td colspan="5" class="text-center text-warning">No intended courses found.</td>
                                </tr>
                                @else
                                @php
                                $applicantCampusIndex = [];
                                @endphp

                                @foreach ($groupedIntendeds as $key => $group)
                                @php
                                $applicantID = $group['fk_applicantID'];
                                $campus = $group['campus'];
                                $courses = $group['courses'];
                                $isEditing = request('editingIntendedApplicant') == $applicantID && request('campus') == $campus;

                                if (!isset($applicantCampusIndex[$applicantID])) {
                                $applicantCampusIndex[$applicantID] = [];
                                }
                                if (!in_array($campus, $applicantCampusIndex[$applicantID])) {
                                $applicantCampusIndex[$applicantID][] = $campus;
                                }

                                $campusLabel = array_search($campus, $applicantCampusIndex[$applicantID]) === 0 ? 'campus1' : 'campus2';
                                @endphp

                                @if ($isEditing)
                                <form action="{{ route('intended.update.raw') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fk_applicantID" value="{{ $applicantID }}">
                                    <input type="hidden" name="original_campus" value="{{ $campus }}">

                                    @foreach ($courses as $i => $courseCode)
                                    <tr>
                                        <td>{{ $applicantID }}</td>
                                        <td>
                                            {{ $campusLabel }}_course{{ $i + 1 }}
                                            <input type="hidden" name="priorities[{{ $loop->index }}]" value="{{ $campusLabel }}_course{{ $i + 1 }}">
                                        </td>
                                        <td>
                                            @if ($loop->first)
                                            @php
                                            $allCampuses = ['Cainta', 'Angono', 'Antipolo', 'Morong', 'Binangonan'];
                                            $otherCampus = null;
                                            foreach ($groupedIntendeds as $entry) {
                                            if ($entry['fk_applicantID'] === $applicantID && $entry['campus'] !== $campus) {
                                            $otherCampus = $entry['campus'];
                                            break;
                                            }
                                            }
                                            @endphp

                                            <select name="campus" class="form-inline-input" required>
                                                @foreach ($allCampuses as $campusOption)
                                                <option value="{{ $campusOption }}"
                                                    {{ $campusOption === $campus ? 'selected' : '' }}
                                                    {{ $campusOption === $otherCampus ? 'disabled' : '' }}>
                                                    {{ $campusOption }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @else
                                            {{ $campus }}
                                            <input type="hidden" name="campus" value="{{ $campus }}">
                                            @endif
                                        </td>
                                        <td>
                                            <select name="courses[{{ $loop->index }}]" class="form-inline-input course-select">
                                                @php
                                                $alreadySelected = $courses;
                                                @endphp
                                                @foreach ($coursesList as $course)
                                                @php
                                                $isDuplicate = in_array($course->courseCode, $alreadySelected) && $course->courseCode !== $courseCode;
                                                @endphp
                                                <option value="{{ $course->courseCode }}"
                                                    {{ $course->courseCode === $courseCode ? 'selected' : '' }}
                                                    {{ $isDuplicate ? 'disabled' : '' }}>
                                                    {{ $course->courseName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if ($loop->first)
                                        <td rowspan="{{ count($courses) }}">
                                            <button type="submit" class="btn btn-sm" style="color: green">
                                                <i class="bi bi-save"></i>
                                            </button>
                                            <a href="{{ route('admin.dashboard', ['table' => 'intended']) }}" class="btn btn-sm" style="color: red">
                                                <i class="bi bi-x-square"></i>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </form>
                                @else
                                @foreach ($courses as $i => $courseCode)
                                <tr>
                                    <td>{{ $applicantID }}</td>
                                    <td>{{ $campusLabel }}_course{{ $i + 1 }}</td>
                                    <td>{{ $campus }}</td>
                                    <td>{{ $courseCode }}</td>
                                    <td>
                                        <a href="{{ url()->current() }}?table=intended&editingIntendedApplicant={{ $applicantID }}&campus={{ urlencode($campus) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @elseif ($table === 'course')
                    <h2 class="lemon" style="color: white">List of Course</h2>

                    <div style="overflow-x: auto;" class="table-responsive">
                        <table class="table table-striped custom-table" style="min-width: 800px;">
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
                                @if (count($courses) === 0)
                                <tr>
                                    <td colspan="6" class="text-center text-warning">No courses found.</td>
                                </tr>
                                @else
                                @foreach ($courses as $course)
                                @if ($editingCourse == $course->courseCode)
                                <tr>
                                    <form action="{{ route('course.update.raw', ['courseCode' => $course->courseCode]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="original_courseCode" value="{{ $course->courseCode }}">
                                        <td>
                                            <input class="form-control" type="text" name="courseCode" value="{{ $course->courseCode }}" style="border: 1px solid orange; background: transparent; color: orange">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="courseName" value="{{ $course->courseName }}" style="border: 1px solid orange; background: transparent; color: orange">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="duration" value="{{ $course->duration }}" style="border: 1px solid orange; background: transparent; color: orange">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="department" value="{{ $course->department }}" style="border: 1px solid orange; background: transparent; color: orange">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="totalUnits" value="{{ $course->totalUnits }}" style="border: 1px solid orange; background: transparent; color: orange">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm"><i class="bi bi-save" style="color: green"></i></button>
                                            <a href="{{ route('admin.dashboard', ['table' => 'course']) }}" class="btn btn-sm" style="color: red">
                                                <i class="bi bi-x-square"></i>
                                            </a>
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
                                        <a href="{{ url()->current() }}?table=course&editingCourse={{ $course->courseCode }}" class="btn btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('course.delete', $course->courseCode) }}" method="POST" style="display: inline;" onsubmit="return confirmDeleteCourse('{{ $course->courseCode }}')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
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
>>>>>>> cfb6dbe58256e22c034f8837077bf8351ec1d615
            @endif

            @if(session('delete_error'))
            <script>
                window.addEventListener('DOMContentLoaded', function() {
                    alert("{{ session('delete_error') }}");
                });
            </script>
            @endif

            @if(session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
            @endif

            <script>
                function confirmDeleteApplicant(applicantID) {
                    return confirm(`Are you sure you want to delete ApplicantID ${applicantID}?`);
                }

                function confirmDeleteGuardian(guardianID, applicantID) {
                    return confirm(`Are you sure you want to delete GuardianID ${guardianID} from ApplicantID ${applicantID}?`);
                }

                function confirmDeleteCourse(courseCode) {
                    return confirm(`Are you sure you want to delete ${courseCode}?`);
                }
            </script>


            @if(session('delete'))
            <script>
                alert("{{ session('delete') }}");
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

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const selects = document.querySelectorAll('.course-select');

                    function updateDisabledOptions() {
                        const selectedValues = Array.from(selects).map(select => select.value);

                        selects.forEach(select => {
                            const currentValue = select.value;

                            Array.from(select.options).forEach(option => {
                                if (option.value === "") return;

                                option.disabled = selectedValues.includes(option.value) && option.value !== currentValue;
                            });
                        });
                    }

                    selects.forEach(select => {
                        select.addEventListener('change', updateDisabledOptions);
                    });

                    updateDisabledOptions();
                });
            </script>


</body>

</html>

<style>
    body {
        background-color: rgb(48, 65, 82);
    }


    .custom-table {
        min-width: 900px;
    }

    .custom-table thead tr,
    .custom-table thead th {
        padding-bottom: 30px;
        border-top: none;
        border-bottom: none !important;
        color: #fff;
        font-size: 11px;
        text-transform: uppercase;
    }

    .custom-table tbody th,
    .custom-table tbody td {
        color: rgb(184, 184, 184);
        font-weight: 400;
        padding-bottom: 20px;
        padding-top: 20px;
        font-weight: 300;
        border: none;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .custom-table tbody th small,
    .custom-table tbody td small {
        color: rgba(255, 255, 255, 0.3);
        font-weight: 300;
    }

    .custom-table tbody th a,
    .custom-table tbody td a {
        color: rgba(255, 255, 255, 0.3);
    }

    .custom-table tbody th .more,
    .custom-table tbody td .more {
        color: rgba(255, 255, 255, 0.3);
        font-size: 11px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .2rem;
    }

    .custom-table tbody tr {
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .custom-table tbody tr:hover td,
    .custom-table tbody tr:focus td {
        color: #fff;
    }

    .custom-table tbody tr:hover td a,
    .custom-table tbody tr:focus td a {
        color: rgb(19, 188, 255);
    }

    .custom-table tbody tr:hover td .more,
    .custom-table tbody tr:focus td .more {
        color: rgb(19, 188, 255);
    }

    .custom-table .td-box-wrap {
        padding: 0;
    }

    .custom-table .box {
        background: #fff;
        border-radius: 4px;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .custom-table .box td,
    .custom-table .box th {
        border: none !important;
    }



    .table {
        --bs-table-bg: transparent !important;
    }

    .btn__active {
        background: rgb(19, 188, 255);
    }
</style>