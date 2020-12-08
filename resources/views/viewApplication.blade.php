<!DOCTYPE html>
<html lang="en">
<head>
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta HTTP-EQUIV="Expires" CONTENT="-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LAMS</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
                    <a class="nav-link" href={{route('TeacherDashboard')}} >Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href={{route('viewLeave')}}>Leave Applications</a>
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
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="start-date">Start Date</label>
                    </div>
                    <div class="col mt-4">
                        <input required type="date" class="form-control" readonly name="startdate"  min="<?php echo date("Y-m-d"); ?>" value={{$start}}>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="end-date">End Date</label>
                    </div>
                    <div class="col mt-4">
                        <input required type="date" class="form-control" readonly name="enddate" min="<?php echo date("Y-m-d"); ?>" value={{$end}}>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="proof">reason</label>
                    </div>
                    <div class="col mt-4">
                        <input type="text" class="form-control" readonly name="reason" value={{$reason}}>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="Date of Applciation">Date Of Application</label>
                    </div>
                    <div class="col mt-4">
                        <input type="date" readonly class="form-control" name="doa" value={{$applydate}}>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col mt-4">
                        <label for="Time of Applciation">Time Of Application</label>
                    </div>
                    <div class="col mt-4">
                        <input type="time" readonly class="form-control" name="toa" value={{$applytime}}>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-start mt-4">
                    @if($proof != '')
                    <div class="col-6">
                        <button class="btn btn-outline-primary"><a target="_blank" href={{$proof}}>View Proof</a></button>
                    </div>
                    @else
                        <div class="col-6">
                        <td><span class="text-danger blockquote">No Doucment submitted</span></td>
                        </div>
                    @endif
                    <div class="col">
                        <form method="POST" action={{route('accept')}}>
                            @csrf
                            <input type="number" hidden  name="lid" value={{$lid}}>
                            <button type="submit" class="btn btn-outline-success">Accept</button>
                        </form>
                    </div>
                    <div class="col">
                        <form method="POST" action={{route('reject')}}>
                            @csrf
                            <input type="number" hidden  name="lid" value={{$lid}}>
                            <button type="submit" class="btn btn-outline-danger">Reject</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
</html>
