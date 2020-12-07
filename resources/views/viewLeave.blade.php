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
    <link rel="stylesheet" href="/css/DashboardStudent.css">
</head>
<body style="background-color: #4a5568;">
<div >
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
                <li class="nav-item"><a class="text-decoration-none text-light" href={{route('logout')}}>Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container form bg-white">
    <h3>Leave Applications</h3>
    <div class="middle-container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($count != 0)
                @for($i=0;$i<$count;$i++)
                    <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>{{$name[$i]}}</td>
                        <td>{{$start[$i]}}</td>
                        <td>{{$end[$i]}}</td>
                        @if($status[$i] == 0)
                            <form method="POST" action={{route('viewApplication')}} >
                                @csrf
                                <input type="number" name="lid" hidden readonly value={{$lid[$i]}}>
                                <input type="text" name="sid" hidden readonly value={{$sid[$i]}}>
                                <td><button type = "submit" class="btn btn-outline-primary text-black">View</button></td>
                            </form>
                        @elseif($status[$i]==2)
                            <td><span class="text-danger">Rejected</span></td>
                        @else
                            <td><span class="text-success">Accepted</span></td>
                        @endif
                    </tr>
                @endfor
            @endif

            </tbody>
        </table>

    </div>
</div>
</body>
</html>
