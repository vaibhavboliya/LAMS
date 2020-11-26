<!DOCTYPE html>
<html lang="en">
<head>
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta HTTP-EQUIV="Expires" CONTENT="-1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="/css/DashboardStudent.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
                    <a href="#" class="nav-link active">Dashboard</a>
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
<div class="subject">
  <div class="overall row">
    <div class="col-1.5 bold title">
      SUMMARY
    </div>
    <div class=" totalCard col-3 bold">
      <div>
      <span class="count">60</span>
    </div>
    <div>
      Total Lectures
    </div>
    </div>
    <div class=" totalCard col-3 bold">
      <div>
      <span class="count">45</span>
    </div>
    <div>
      Attend
    </div>
    </div>
    <div class=" totalCard col-3">
    <div class="circle_percent" data-percent="75">
      <div class="circle_inner">
          <div class="round_per"></div>
        </div>
      </div>

</div>
</div>
</div>

  <div class="fluid-container topcontainer">
    <div class="row">
      <div class="col-sm-3">
        <div class="image-container">
          <img class="Subject_img" width="100px" src="https://www.flaticon.com/svg/static/icons/svg/2165/2165703.svg" alt="Subject_img">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="details-container">
          <h3 class="subject_names">Database Management System</h3>
          <h5 class="faculty_names"><a class="text-dark" href="mailto:sunita.sahu@ves.ac.in">Faculty Name : Sunita Sahu</a></h5>
            <h6 class="Status">Status : On Track</h6>
        </div>
      </div>
       <div class="col-sm-3">
        <div class="previous-four-records table-responsive-sm">
          <table class="table table-striped">
            <thead>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">status</th>
            </thead>
            <tbody>
              <tr class="table-success">
                <td>24/09/2020</td>
                <td>1:00 pm</td>
                <td>Present</td>
              </tr>
              <tr class="table-danger">
                <td>23/09/2020</td>
                <td>12:00 pm</td>
                <td>Absent</td>
              </tr>
              <tr class="table-success">
                <td>22/09/2020</td>
                <td>2:00 pm</td>
                <td>Present</td>
              </tr>
              <tr class="table-danger">
                <td>21/09/2020</td>
                <td>3:00 pm</td>
                <td>Absent</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-sm-3 percentage-container">
        <div class="percentage">
          <h3 class="h3">78%</h3>
        </div>
      </div>
    </div>
  </div>
  <script src="/js/main.js"></script>
</body>
</html>
<script>
        var values = {!! json_encode(Session::get('values'), JSON_HEX_TAG) !!}
        console.log(values);
</script>
