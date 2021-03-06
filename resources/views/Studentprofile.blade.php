<!DOCTYPE html>
<html lang="en">
<head>
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta HTTP-EQUIV="Expires" CONTENT="-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LAMS</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .row
        {
            margin-left: 0;
            margin-right: 0;
            width: 800px;
        }
    </style>
</head>
<body class="body" style="background-color: #4a5568;">
<div>
    <nav style="position: sticky;" class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href={{route('welcome')}} class="navbar-brand">LAMS</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href={{route('Dashboard')}} >Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href={{route('leaveapply')}}>Apply for Leave</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href={{route('profile')}} >Profile</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="text-decoration-none text-light" href={{route('login')}}>Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container profile form bg-white">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
            <div class="row">
                <div class="col">
                    <h3>Student Profile</h3>
                    <hr>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">Enrollment id</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" readonly name="enrollment_id"   value={{$id}}>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">Roll No.</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" readonly name="roll_no"   value={{$rollno}}>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">First Name</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" readonly name="FirstName"   value={{$firstname}}>
                </div>
            </div>
            <div class="row align-items-center">
            <div class="col mt-4">
                <label for="start-date">Middle Name</label>
            </div>
            <div class="col mt-4">
                <input type="text" class="form-control" readonly name="MiddleName"   value={{$middlename}}>
            </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">LastName</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" readonly name="LastName"   value={{$lastname}}>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">Email</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" readonly name="Email"   value={{$email}}>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">Phone No.</label>
                </div>
                <div class="col mt-4">
                    <input type="number" class="form-control" readonly name="PhoneNo"   value={{$phone}}>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">Department</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" readonly name="Dept"   value={{$department}}>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">Semester</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" readonly name="semester"   value={{$sem}}>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                Have a problem with your Credentials ? <a href="mailto::lams.010718@gmail.com">Click Here</a>
            </div>
            <br>
        </div>
    </div>
</div>
</body>
</html>
