<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registeration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/registeration.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
        var ok;
    </script>
</head>
<body class="body">
<div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class="navbar-brand">LAMS</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="navbar-text text-light">Registeration Form</li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-text text-light">Already Registered ? <a class="link text-light" href="/">Click Here</a></li>
            </ul>
        </div>
    </nav>
</div>
@if($errors->any())

        <div class="alert alert-danger" role="alert">
            @foreach ($errors as $error)
                @if($error == 12345)
                    <li>There is a problem in Roll No.</li>
                @endif
                @if($error == 23456)
                    <li>There is a problem in First Name</li>
                @endif
                @if($error == 34567)
                    <li>There is a problem in Middle Name</li>
                @endif
                @if($error == 45678)
                    <li>There is a problem in Last Name</li>
                @endif
                @if($error == 56789)
                    <li>There is a problem with Email Pls use VES official email</li>
                @endif
                @if($error == 67891)
                    <li>There is a problem with your phone number Pls check</li>
                @endif
                @if($error == 78912)
                    <li>There is a problem with your phone number Pls check</li>
                @endif
            @endforeach
        </div>

@endif
<div class="information">
    <h2 class="text-dark">Student Entry</h2><br>
    <p id="cb">
        <em>Please agree to the <span class="text-danger">accuracy </span> of the information in this form. </em>
    </p>
    <p id="pass">
        <em>Please enter <span class="text-danger">consistent</span> passwords. </em>
    </p>
    <p id="fill">
        <em>Please <span class="text-danger">fill</span> all the information in this form. </em>
    </p>
</div>
<div class="containerform">
    <form action="/status" class="regform" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="Enrollment_Number">Enrollment_Number<span class="text-danger">*</span></label>
                <input name="EnrollmentNumber" type="text" class="form-control" placeholder="Enrollment Number">
            </div>
            <div class="form-group col-md-3">
                <label for="first_name">First Name<span class="text-danger">*</span></label>
                <input name="firstName" type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group col-md-3">
                <label for="middle_name">Middle Name<span class="text-danger">*</span></label>
                <input name="middleName" type="text" class="form-control" placeholder="Your Middle Name">
            </div>
            <div class="form-group col-md-3">
                <label for="last_name">Last Name<span class="text-danger">*</span></label>
                <input name="lastName" type="text" class="form-control" placeholder="Your Last Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="email">Email<span class="text-danger">*</span></label>
                <input name="email1" type="email" class="form-control" placeholder="year.first_name.last_name@ves.ac.in">
            </div>
            <div class="form-group col-md-3">
                <label for="phone_number_student">Parent's Email<span class="text-danger">*</span></label>
                <input name="email2" type="email" class="form-control" placeholder="example@gmail.com">
            </div>
            <div class="form-group col-md-3">
                <label for="phone_number_student">Student's Phone Number<span class="text-danger">*</span></label>
                <input name="studentPhone" type="number" class="form-control" placeholder="xxxxxxxxxx">
            </div>
            <div class="form-group col-md-3">
                <label for="phone_number_parent">Parent's Phone Number<span class="text-danger">*</span></label>
                <input name="parentPhone" type="number" class="form-control" placeholder="xxxxxxxxxx">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="class">Select Your Class<span class="text-danger">*</span></label>
                <select name="className" id="inputState" class="form-control">
                    <option selected value="select class">Select Class</option>
                    <option value="D2C">D2C</option>
                    <option value="D7C">D7C</option>
                    <option value="D12C">D12C</option>
                    <option value="D17C">D17C</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="roll_no.">Roll Number<span class="text-danger">*</span></label>
                <input name="rollNo" type="number" class="form-control" placeholder="Eg. 18">
            </div>
            <div class="form-group col-md-3">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input name="new-passoword" type="password" class="form-control" placeholder="Enter your password" id="password">
            </div>
            <div class="form-group col-md-3">
                <label class="passwordstatus" for="dispalying_password"></label>
                <label for="repassword">Confirm Password<span class="text-danger">*</span></label>
                <input name="repassword" type="password" class="form-control" placeholder="re-enter your password" id="repassword">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
            <span class="text-danger">
              <span class="text-danger">*</span>You agree that all the above entered information is <em>accurate</em>.
            </span>
                </label>
            </div>
        </div>
    </form>
    <button class="btn btn-outline-danger">Submit</button>
</div>
<script type="text/javascript">
    $(".btn").click(function() {
        ok = true;
        console.log(ok);
        if (!($("#gridCheck").prop("checked"))) {
            $("#cb").show(250);
            ok = false;
        } else {
            $("#cb").hide(250);
        }
        if ($("#password").val() != $("#repassword").val()) {
            $("#pass").show(250);
            ok = false;
        } else {
            $("#pass").hide(250);
        }

        if ($("input[type=text]").val() == "" || $("input[type=number]").val() == "" || $("input[type=email]").val() == "" || $("input[type=password]").val() == "") {
            $("#fill").show(250);
            ok = false;
        } else {
            $("#fill").hide(250);
        }
        console.log(ok);
        if (ok) {
            $(".regform").submit();
        }
        /* else{
             $(".regform").submit(false);
             console.log($(".regform").attr("onsubmit"));
         }*/

    });
    // TODO: Form Validation.
    // Check if password1 matches password2 also include strength of password
    // Submit form only when the checkbox is selected
</script>
</body>

</html>
