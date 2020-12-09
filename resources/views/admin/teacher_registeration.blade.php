<!DOCTYPE html>
<html lang="en">
<head>
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta HTTP-EQUIV="Expires" CONTENT="-1">
    <meta charset="utf-8">
    <meta name="csrf-token" content="C3E3lEwI55vDUQApvDuUORaGWKcjcNyfNiiCM5Jg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LAMS</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/registeration.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
        var ok;
    </script>
    <style>
        .center {
            margin: auto;
            width: 90%;
            padding: 10px;
        }
    </style>
</head>
<body class="body">
<div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="/StudentRegister" class="navbar-brand">LAMS</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="navbar-text text-light"> Teacher Registration Form</li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-text text-light"><a class="link text-light" href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="center">
    <form action="/teacherstatus" class="regform" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="Phone_Number">Phone Number<span class="text-danger">*</span></label>
                <input name="PhoneNumber" type="number" class="form-control" placeholder="Phone Number">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-danger">Submit</button>
    </form>
</div>
</body>

</html>
