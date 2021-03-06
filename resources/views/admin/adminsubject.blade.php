<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMS</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body >

    <div id="wrapper" >

      <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <h2>LAMS</h2>
        </div>
          <ul class="sidebar-nav">
              <li>
                  <a href={{route('home.admin')}}><i class="fa fa-home"></i>Home</a>
              </li>
              <li>
                  <a href={{route('admin.class')}}><i class="fa fa-building"></i>Class</a>
              </li>
              <li  class="active">
                  <a href={{route('admin.subject')}}><i class="fa fa-book"></i>Subject</a>
              </li>
              <li>
                  <a href={{route('admin.teaches')}}><i class="fa fa-book"></i>Teacher Allocation</a>
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




      {{-- <section  id="content-wrapper">
        <div class="row justify-content-center">

          <div style="margin-top: 5%; padding: 10px 20px; border: 1px solid rgba(231, 161, 9, 0.5); background-color:white" class="col-12 col-md-8 col-lg-8 col-xl-6">
            <form action="" method="post">
              <div class="row">
                  <div class="col">
                    <h3>Add Subject</h3>
                    <hr>
                  </div>
              </div>
              <div class="row align-items-center">
                <div class="col mt-4">
                    <label for="start-date">Subject Name</label>
                </div>
                <div class="col mt-4">
                    <input required type="text" class="form-control"  name="subjectname">
                </div>
              </div>
                <div class="row align-items-center">
                  <div class="col mt-4">
                      <label for="end-date">year</label>
                  </div>
                  <div class="col mt-4">
                      <input required type="number" class="form-control"  name="endtext" >
                  </div>
              </div>
                <div class="row align-items-center">
                  <div class="col mt-4">
                      <label for="end-text">Department</label>
                  </div>
                  <div class="col mt-4">
                      <input required type="text" class="form-control"  name="endtext" >
                  </div>
              </div>
                <div class="row align-items-center">
                  <div class="col mt-4">
                      <label for="end-text">Semester</label>
                  </div>
                  <div class="col mt-4">
                      <input required type="number" class="form-control"  name="endtext" >
                  </div>
              </div>
              <div  style="margin-bottom: 10px" class="row justify-content-start mt-4">

                <div class="col-6">


                      <button type="submit" class="btn btn-success">ADD</button>
                </div>
                <div class="col-4">


                      <button type="button" class="btn btn-warning">Cancel</button>
                </div>
                <hr>
              </div>
            </div>
          </form>
          </div>
        </div>
      </section> --}}
      <section id="content-wrapper">
        <div class="row">
          <div class="container">
            <div style= "margin:10px 0; padding: 10px;background-color:rgba(255, 255, 0, 0.507);" class="d-flex justify-content-spacebetween">
              <h3 style= "margin:10px 0; padding: 10px;" class="title col-10">Manage Subjects</h3>
                <a href={{route('admin.addsubject')}}><button type="submit" class="btn btn-primary">Add Subject</button></a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Sr. No.</th>
                      <th scope="col">Subject id</th>
                      <th scope="col">Subject Name</th>
                    <th scope="col">year</th>
                      <th scope="col">Department</th>
                      <th scope="col">Semester</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                       @for($i=0;$i<$count;$i++)
                    <th scope="row">{{$i+1}}</th>
                          <td>{{$subject_id[$i]}}</td>
                    <td>{{$subject_name[$i]}}</td>
                    <td>{{$year[$i]}}</td>
                      <td>{{$department[$i]}}</td>
                      <td>{{$semester[$i]}}</td>
                          <form method="POST" action={{route('admin.updatesubject')}}>
                              @csrf
                              <input  type="text" hidden   readonly name="subject_id" value={{$subject_id[$i]}} >
                              <td><button type="submit" class="btn btn-success text-white">Update</button></td>
                          </form>
                          <form method="POST" action={{route('admin.deletesubject')}}>
                              @csrf
                              <input value={{$subject_id[$i]}} type="text" name="subject_id" hidden readonly >
                              <td><button type="submit" class="btn btn-danger text-white">Delete</button></td>
                          </form>
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
