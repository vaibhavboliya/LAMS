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
          <a href="#"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-building"></i>Class</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-book"></i>Subject</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-user"></i>Teachers</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-id-badge"></i>Alloted Teachers</a>
        </li>
        <li class="active">
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
              
              <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item"><a class="text-decoration-none text-light" href="/logout">Logout</a></li>
              </ul>
          </div>
      </nav>
    </div>
 



    <section id="content-wrapper">
      <div class="row">
        <div class="container">
          <h3 style= "margin:10px 0; padding: 10px;background-color:rgba(255, 255, 0, 0.507);" class="title">Manage Students</h3>
          <h4 style="background-color: rgba(128, 128, 128, 0.425); padding: 10px;margin:  20px 0">CMPN</h4>
          <h6 style="background-color: rgba(183, 201, 20, 0.507); padding: 10px;margin:  20px 0">D2C </h6>
          <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Sr. No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                    <th scope="col">phone Number</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                   
                  <th scope="row">{.i+1}}</th>
                  <td>{.name[$i]}}</td>
                  <td>{.email[$i]}}</td>
                    <td>{.role[$i]}}</td>
                  <td><a href="/admin/user/{.id[$i]}}" type="button" class="btn btn-success text-white">view</a></td>
                    <td><a href="/admin/user/delete/{.id[$i]}}" type="button" class="btn btn-danger text-white">Delete</a></td>
                </tr>
         
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
