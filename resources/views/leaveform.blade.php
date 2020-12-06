
<!DOCTYPE html>
<html lang="en">
<head>
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta HTTP-EQUIV="Expires" CONTENT="-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="/css/leave.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #4a5568;">
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
                    <a class="nav-link active" href={{route('leaveapply')}}>Apply for Leave</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{route('profile')}}>Profile</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="text-decoration-none text-light" href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
    <div class="container form bg-white">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                <div class="row">
                    <div class="col">
                        <h3>Leave Application</h3>
                        <hr>
                    </div>
                </div>
                <form method="POST" action={{route('leaveformsubmit')}}>
                    @csrf
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="start-date">Start Date</label>
                    </div>
                    <div class="col mt-4">
                        <input required type="date" class="form-control" name="startdate" min="<?php echo date("Y-m-d"); ?>">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="end-date">End Date</label>
                    </div>
                    <div class="col mt-4">
                        <input required type="date" class="form-control" name="enddate" min="<?php echo date("Y-m-d"); ?>">
                    </div>
                </div>
            <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="proof">reason</label>
                </div>
                <div class="col mt-4">
                    <input type="text" class="form-control" name="reason">
                </div>
            </div>
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="proof">Google drive link for proof</label>
                    </div>
                    <div class="col mt-4">
                        <input type="text" class="form-control" name="proof">
                    </div>
                </div>
                <hr>
                <div class="row justify-content-start mt-4">
                    <div class="col">
                        <button class="btn btn-primary mt-4">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
