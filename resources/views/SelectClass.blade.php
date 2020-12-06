<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit =no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"> var ok;</script>
    <link rel="stylesheet" href ="/css/teachdb.css">
    <title>Teachers Dashboard</title>
</head>
<body>
<div>
    <nav style="position: sticky;" class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class="navbar-brand">LAMS</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a  class="nav-link active" href={{route('TeacherDashboard')}}>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href={{route('viewLeave')}} class="nav-link">Leave Applications</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Profile</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="text-decoration-none text-light" href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="centerbox">
    <form action={{route('mark')}} method="POST" class="atform">
        @csrf
        <div class="box">
            <div class = "container-fluid ">
                <h3>Attendance</h3>
                <hr>
                <div class="form-row ">

                    <div class="form-group lecture-date">
                        <label class= "lecture">Date of lecture</label>

                        <input id="lecture" name="lect_date" type ="date" class="form-control noemp" autofocus>
                    </div>


                    <div class="form-group lecture-date">
                        <label class= "lecture">Time of lecture</label>

                        <input id="lecture" name="lect_time" type ="time" class="form-control noemp" autofocus>
                    </div>

                </div>
                <hr>
                <div class="form-group lecture-date">
                    <label class= "lecture">Class</label>
                    <select name="class" class="custom-select" id="class">
                        <option selected value="select class">select class</option>
                    @foreach($classData as $data)
                            <option value={{$data}}>{{$data}}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="markbutton center" id ="bt-input">Mark Attendance</button>
            </div>

        </div>

    </form>
</div>
</body>
</html>
