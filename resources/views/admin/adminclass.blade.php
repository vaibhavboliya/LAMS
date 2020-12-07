<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMS</title>
    <link rel="stylesheet" href="/css/admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="wrapper" >

    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <h2>LAMS</h2>
      </div>
        <ul class="sidebar-nav">
            <li>
                <a href={{route('home.admin')}}><i class="fa fa-home"></i>Home</a>
            </li>
            <li class="active">
                <a href={{route('admin.class')}}><i class="fa fa-building"></i>Class</a>
            </li>
            <li >
                <a href={{route('admin.subject')}}><i class="fa fa-book"></i>Subject</a>
            </li>
            <li>
                <a href={{route('admin.teacher')}}><i class="fa fa-user"></i>Teachers</a>
            </li>
            <li>
                <a href={{route('admin.teaches')}}><i class="fa fa-id-badge"></i>Alloted Teachers</a>
            </li>
            <li>
                <a href={{route('admin.student')}}><i class="fa fa-users"></i>Student</a>
            </li>
        </ul>
    </aside>
    <div id="navbar-wrapper">
      <nav style="position: sticky;" class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-header">
          <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
        </div>
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




    <section id="content-wrapper">
      <div class="row">
        <div class="container">
          <div style= "margin:10px 0; padding: 10px;background-color:rgba(255, 255, 0, 0.507);" class="d-flex justify-content-spacebetween">
            <h3 style= "margin:10px 0; padding: 10px:" class="title col-10">Manage Class</h3>
            <button type="button" class="btn btn-primary col-2">Add Class</button>

          </div>
          {{-- <h3 style= "margin:10px 0; padding: 10px;background-color:rgba(255, 255, 0, 0.507);" class="title">Manage Class</h3> --}}
          <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Sr. No.</th>
                  <th scope="col">class id</th>
                  <th scope="col">class name</th>
                    <th scope="col">capacity</th>
                  <th scope="col">year</th>
                  <th scope="col">teacher id</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                     @for($i=0;$i<count($name);$i++)
                  <th scope="row">{{$i+1}}</th>
                  <td>{{$class_id[$i]}}</td>
                  <td>{{$class_name[$i]}}</td>
                        <td>{{$capacity[$i]}}</td>
                        <td>{{$year[$i]}}</td>
                        <td>{{$teacher_id[$i]}}</td>
                  <td><a href="/admin/user/{{$class_id[$i]}}" type="button" class="btn btn-success text-white">view</a></td>
                    <td><a href="/admin/user/delete/{{$class_id[$i]}}" type="button" class="btn btn-danger text-white">Delete</a></td>
                </tr>
                 @endfor
              </tbody>
            </table>
      </div>
      </div>
    </section>

    </div>


    <script>
      const $button  = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

$button.addEventListener('click', (e) => {
  e.preventDefault();
  $wrapper.classList.toggle('toggled');
});
    </script>
</body>
</html>
