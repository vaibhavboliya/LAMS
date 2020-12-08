<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMS</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/DashboardStudent.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href ="/css/teachdb.css">
</head>
<body>
<div>
    <nav style="position: sticky;" class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href={{route('welcome')}} class="navbar-brand">LAMS</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="text-decoration-none text-light" href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="centerbox">
    <form action={{route('admin.insertsubject')}} method="POST" class="atform">
        @csrf
        <div class="box">
            <div class = "container-fluid ">
                <h3>Add Subject</h3>
                <hr>
                <div class="form-row ">
                    <div class="form-group lecture-date">
                        <label class= "Class Name">Subject Name</label>
                        <input style="width: 350px" name="name" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group lecture-date">
                    <label class= "lecture">Year</label>
                    <input style="width: 350px" type="number" name="year" class="form-control">
                </div>
                <hr>
                <div class="form-group lecture-date">
                    <label class= "lecture">Department</label>
                    <input style="width: 350px" type="text" name="Department" class="form-control">
                </div>
                <hr>
                <div class="form-group lecture-date">
                    <label class= "lecture">Semester</label>
                    <input style="width: 350px" type="number" name="semester" class="form-control">
                </div>
                <hr>
                <div class="col-md-auto">
                    <input style="margin-left:10%; margin-right: 30%" type="submit" class="btn btn-success text-white">
                    <a type="button" class="btn btn-warning text-white" href={{route('admin.subject')}} >cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
