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

    <title>LAMS</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
                        <a class="nav-link active" href={{route('TeacherDashboard')}} >Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href={{route('viewLeave')}} class="nav-link">Leave Applications</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="text-decoration-none text-light" href="/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <form action={{route('submitattendance')}} method="POST" class="atform">
        @csrf

    <div class = "container-fluid ">
        <div class="form-row ">
            <h3>Mark Attendance</h3>
        </div>
    <div class="form-row ">
        <div class="form-group col-3 ">
            <label class= "lecture">Time of lecture</label>
            <input readonly type ="date" name="date"  class="form-control" value={{$date}} >
        </div>

        <div class="form-group col-3">
            <label class= "lecture">Time of lecture</label>
            <input readonly type = "time" name="time"  class="form-control" value={{$time}} >
        </div>
    </div>
      <div class="form-row">
        <div class="form-group col-3  ">
            <label for="class">Class</label>
            <input readonly type="text" name="class_name"  class="form-control"  value={{$class_name}}>
        </div>
        <div class="form-group col-3 ">
            <label for="class">Subject</label>
            <input readonly type="text" name="subject" class="form-control" value={{$subject}}>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        <label for="read-input">Enter Expression Here to check for Attendance</label>
        <div class = "form-row">
            <div class="form-group col-3">
                <input type="text" id="read-input" class="form-control">
            </div>
            <div class="form-group col-3">

            <button  type="button" class="markbutton btn btn-outline-warning btn-block" id ="bt-input">Mark</button>
            </div>
        </div>
        <div id ="no-ck">
        <div class="container row ">

            <div class="form-check col-12 center">
                <table class="table table-striped">
                    <thead>
                      <tr>

                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Roll No</th>
                        <th scope="col">Mark Attendance</th>
                      </tr>
                    </thead>
                    <tbody>
                    @for($i=0;$i<$count;$i++)
                      <tr>
                        <th scope="row">{{$student_f[$i]}}</th>
                        <td>{{$student_l[$i]}}</td>
                        <td>{{$student_r[$i]}}</td>
                          <td>
                              <input style="height: 25px; width: 25px; margin-left: 10px; padding: 5px;" name={{$i}}  type="checkbox" class="form-check-input" id ={{$student_r[$i]}}  value={{$student_r[$i]}}></td>
                      </tr>
                      @endfor
                    </tbody>
                  </table>
                <input type="number" hidden name = "count" value="{{$count}}">
                <input type="number" hidden name = "class_id" value="{{$class_id}}">
                <input type="number" hidden name = "teaches_id" value="{{$teaches_id}}">
    <div class="container-fluid">
        <button type="submit" class="btn btn-outline-success col-lg-auto sub">Complete Your Attendance</button>
        </div>
            </div>
        </div>
        </div>
    </div>
    </form>
</body>
<script>
    $("input[type=checkbox]").prop("checked",true);
    $("#read-input").focus(function()
    {
        $(this).val("")
    });
    $("#bt-input").click(function()
    {
        let ch=($("#read-input").val()).split(" ");
        console.log(ch);
        for(i of ch)
        {
            if(i.charAt(0)=="*")
            {
                $("input[type=checkbox]").each(function()
                {
                    $(this).prop("checked",!$(this).prop("checked"));
                });
            }
            else{
            if(!isNaN(i.charAt(0)))
            {
                console.log(i);
                $("#"+i).prop("checked",!$("#"+i).prop("checked"));
            }
            else{
                console.log(i);
                let j;
                let j1=i.search(",");
                let end1=i.search("}");
                console.log(j1);
                console.log(end1);
                for(j=parseInt(i.slice(1,j1));j<=parseInt(i.slice(j1+1,end1));j++)
                {
                    $("#"+j).prop("checked",!$("#"+j).prop("checked"));
                }
            }
            }
        }
        $("#no-ck").show(250);
    });

</script>
</html>
