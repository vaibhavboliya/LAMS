<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMS</title>
    <link rel="stylesheet" href="/css/DashboardStudent.css">
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
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href={{route('Dashboard')}} class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/notexists" class="nav-link">Profile</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="text-decoration-none text-light" href="/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="centerbox">
        <form action={{route('edituser')}} method="POST" class="atform">
            @csrf
            <div class="box">

                <div class = "container-fluid ">
                    <h3> Edit <span>{{$email}} </span> </h3>
                    <hr>
                    <input type="email" name="email" hidden readonly value="{{$email}}">
                    <div class="form-row ">

                        <div class="form-group lecture-date">
                            <label class= "lecture">Name</label>

                        <input style="width: 350px" name="name" class="form-control" value="{{$name}}" >
                        </div>

                    </div>
                    <hr>
                    <div class="form-group lecture-date">
                        <label class= "lecture">Role</label>
                        <input style="width: 350px" name="role" class="form-control" value="{{$role}}" >
                    </div>

                    <div class="col-md-auto">
                    <td><input style="margin-left:10%; margin-right: 30%" type="submit" class="btn btn-success text-white"></td>
                    <td><a type="button" class="btn btn-warning text-white" href={{route('home.admin')}} >cancel</a></td>
                </div>
                </div>
            </div>
        </form>
            </div>

        </form>
    </div>


</body>
</html>
