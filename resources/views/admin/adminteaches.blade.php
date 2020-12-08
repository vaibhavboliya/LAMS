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
<body style="background-color: #efefef">

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
            <li>
                <a href={{route('admin.subject')}}><i class="fa fa-book"></i>Subject</a>
            </li>
            <li  class="active">
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
                    <li class="nav-item"><a class="text-decoration-none text-light" href={{route('logout')}}>Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <section id="content-wrapper">
        <div class="row">
            <div class="container">
                <div style= "margin:10px 0; padding: 10px;background-color:rgba(255, 255, 0, 0.507);" class="d-flex justify-content-spacebetween">
                    <h3 style= "margin:10px 0; padding: 10px;" class="title col-10">Manage Allocated Teacher's</h3>
                    <a href={{route('admin.addteaches')}}><button type="submit" class="btn btn-primary">New Allocation</button></a>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Teaches id</th>
                        <th scope="col">Teacher id</th>
                        <th scope="col">Subject id</th>
                        <th scope="col">Class id</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @if($count!=0)
                        @for($i=0;$i<$count;$i++)
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$teaches_id[$i]}}</td>
                            <td>{{$teacher_name[$i]}}</td>
                            <td>{{$subject_name[$i]}}</td>
                            <td>{{$class_name[$i]}}</td>
                            <form method="POST" action={{route('admin.deleteteaches')}}>
                                @csrf
                                <input value={{$teaches_id[$i]}} type="text" name="teaches_id" hidden readonly >
                                <td><button type="submit" class="btn btn-danger text-white">Delete</button></td>
                            </form>
                    </tr>
                    @endfor
                    @endif
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
