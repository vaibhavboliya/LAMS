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
  <link rel="stylesheet" href="/public/css/admin.css">
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
    <div class="container">
        <h1 class="title">Manage Users</h1>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                  <th scope="col">Role</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  @for($i=0;$i<count($name);$i++)
                <th scope="row">{{$i+1}}</th>
                <td>{{$name[$i]}}</td>
                <td>{{$email[$i]}}</td>
                  <td>{{$role[$i]}}</td>
                <td><a href="/admin/user/{{$id[$i]}}" type="button" class="btn btn-success text-white">view</a></td>
                  <td><a href="/admin/user/delete/{{$id[$i]}}" type="button" class="btn btn-danger text-white">Delete</a></td>
              </tr>
              @endfor
            </tbody>
          </table>
    </div>
</body>
</html>
