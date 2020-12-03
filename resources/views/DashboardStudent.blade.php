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
<div class="subject">
  <div class="row">
    <div class="col-1.5 bold title">
      SUMMARY
    </div>
      <br>
    <div class="totalCard col-sm bold">
      <div>
      <span class="total_count" id="tc">{{$count_t}}</span>
    </div>
    <div>
      Total Lectures
    </div>
    </div>
      <br>
    <div class=" totalCard col-sm bold">
      <div>
      <span class="attended_count" id="ac">
          {{$count_a}}
    </span>
    </div>
    <div>
      Attend
    </div>
    </div>
      <br>
    <div class=" totalCard col-sm">
    <div class="circle_percent" id="percent" data-percent={{($count_a/$count_t)*100}}>
      <div class="circle_inner">
          <div class="round_per"></div>
        </div>
      </div>

</div>
</div>
</div>
@for ($i = 0; $i < $count; $i++)
    <div class="fluid-container topcontainer" id={{$i}}>
        <div class="row">
            <div class="col-sm-3">
                <div class="image-container">
                    <img class="Subject_img" width="100px" src="https://www.flaticon.com/svg/static/icons/svg/2165/2165703.svg" alt="Subject_img">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="details-container">
                    <h3 class="subject_names" id={{"subject_name".$i}}>{{$values[$i]['subject_name']}}</h3>
                    <h5 class="faculty_names" id={{"faculty_name".$i}}>{{$values[$i]['faculty_name']}}</h5>
                    <a id={{"faculty_email".$i}} class="text-dark" href="">{{$values[$i]['faculty_email']}}</a>
                    <h5 class="attended_lectures" id={{"attended_lectures".$i}}>Number of Lectures Attended : {{$values[$i]['attended_count']}}</h5>
                    <h5 class="total_lectures" id={{"total_lectures".$i}}><span>Total Number of Lectures : </span><span>{{$values[$i]['total_count']}}</span></h5>
                    <h6 class="Status" id={{"status".$i}}>
                        @if(($values[$i]['attended_count']/$values[$i]['total_count'])*100 < 60)
                            <h2><span class='text-danger'>{{"Poor"}}</span></h2>
                        @else
                            <h2><span class='text-primary'>{{"Good"}}</span></h2>
                        @endif
                    </h6>
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
                    <div class=" totalCard col-sm">
                        <div class="circle_percent" id={{"percent".$i}} data-percent={{($values[$i]['attended_count']/$values[$i]['total_count'])*100}}>
                            <div class="circle_inner">
                                <div class="round_per"></div>
                            </div>
                        </div>
        </div>
    </div>
    </div>
@endfor
<script>
    function onLoad()
        {
            // var i =0;
            // var total_lectures = 0;
            // var attended_lectures = 0;
            // for(i=0;i<values.length;i++)
            // {
            //     total_lectures = total_lectures + values[i]["total_count"];
            //     attended_lectures = attended_lectures + values[i]["attended_count"]
            // }
            // for(i=0;i<values.length;i++) {
            //     document.getElementById("subject_name" + i.toString()).innerHTML = values[i]["subject_name"];
            //     document.getElementById("faculty_name" + i.toString()).innerHTML = "Faculty Name : " + values[i]["faculty_name"];
            //     document.getElementById("faculty_email" + i.toString()).innerHTML = values[i]["faculty_email"];
            //     document.getElementById("faculty_email" + i.toString()).setAttribute('href',"mailto:"+values[i]["faculty_email"].toString());
            //     document.getElementById("attended_lectures" + i.toString()).innerHTML = "Attended Lectures : "+values[i]["attended_count"];
            //     document.getElementById("total_lectures" + i.toString()).innerHTML = "Total Lectures : "+values[i]["total_count"];
            //     var precent_val = 0;
            //     if (values[i]["total_count"]!=0)
            //     {
            //         percent_val = parseInt((values[i]["attended_count"]/values[i]["total_count"])*100);
            //     }
            //     if (percent_val > 75)
            //     {
            //         document.getElementById("status"+ i.toString()).innerHTML = "status : On Track";
            //     }
            //     else if(percent_val > 60)
            //     {
            //         document.getElementById("status"+ i.toString()).innerHTML = "status : Average";
            //     }
            //     else
            //     {
            //         document.getElementById("status"+ i.toString()).innerHTML = "status : Poor ";
            //     }
            //     document.getElementById("percent"+ i.toString()).setAttribute("data-percent",percent_val.toString());
            // }
            // document.getElementById("tc").innerHTML = total_lectures;
            // document.getElementById("ac").innerHTML = attended_lectures;
            // var percent = parseInt((attended_lectures/total_lectures)*100);
            // var elementVar = document.getElementById("percent");
            // elementVar.setAttribute("data-percent",percent);
            $(".count").each(function () {
                $(this)
                    .prop("Counter", 0)
                    .animate(
                        {
                            Counter: $(this).text(),
                        },
                        {
                            duration: 2000,
                            easing: "swing",
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            },
                        }
                    );
            });

// percentage

            $(".circle_percent").each(function () {
                var $this = $(this),
                    $dataV = $this.data("percent"),
                    $dataDeg = $dataV * 3.6,
                    $round = $this.find(".round_per");
                $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                $this.append(
                    '<div class="circle_inbox"><span class="percent_text"></span></div>'
                );
                $this.prop("Counter", 0).animate(
                    { Counter: $dataV },
                    {
                        duration: 2000,
                        easing: "swing",
                        step: function (now) {
                            $this.find(".percent_text").text(Math.ceil(now) + "%");
                        },
                    }
                );
                if ($dataV >= 51) {
                    $round.css("transform", "rotate(" + 360 + "deg)");
                    setTimeout(function () {
                        $this.addClass("percent_more");
                    }, 1000);
                    setTimeout(function () {
                        $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                    }, 1000);
                }
            });

        }
        onLoad();

</script>
</body>
</html>
