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
<body style="background-color: #efefef">
    
    <div id="wrapper" >

      <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <h2>LAMS</h2>
        </div>
        <ul class="sidebar-nav">
          <li>
            <a href="#"><i class="fa fa-home"></i>Home</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-building"></i>Class</a>
          </li>
          <li class="active">
            <a href="#"><i class="fa fa-book"></i>Subject</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-user"></i>Teachers</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-id-badge"></i>Alloted Teachers</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-users"></i>Student</a>
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
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                      <a active class="nav-link active" href={{route('dashboardredirect')}} >Dashboard</a>
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
              <h3 style= "margin:10px 0; padding: 10px:" class="title col-10">Manage Subjects</h3>
              <button type="button" class="btn btn-primary col-2">Add Subject</button>

            </div>
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Sr. No.</th>
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
                      {{-- @for($i=0;$i<count($name);$i++) --}}
                    <th scope="row">{.i+1}}</th>
                    <td>{.name[$i]}}</td>
                    <td>{.email[$i]}}</td>
                      <td>{.role[$i]}}</td>
                      <td>{.role[$i]}}</td>
                    <td><a href="/admin/user/{.id[$i]}}" type="button" class="btn btn-success text-white">view</a></td>
                      <td><a href="/admin/user/delete/{.id[$i]}}" type="button" class="btn btn-danger text-white">Delete</a></td>
                  </tr>
                  {{-- @endfor --}}
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
