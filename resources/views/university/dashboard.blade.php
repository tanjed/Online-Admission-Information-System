@extends('master_dashboard')
@section('content')
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">

                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right justify-content-center">
                    <li>
                        <a class="profile-pic" href="#"><b class="hidden-xs">{{auth('university')->user()->name}}</b></a>
                    </li>
                    <li>
                        <a class="profile-pic" href="{{URL::to(route('university.logout'))}}"><b class="hidden-xs">Logout</b></a>
                    </li>
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{URL::to(route('university.dashboard'))}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                </ul>

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid ">
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6">
                        <div class="white-box analytics-info text-center" style="min-height:400px;">
                            <button class="btn btn-success" data-toggle="collapse" data-target="#update">Update Information</button>
                            <button class="btn btn-success" data-toggle="collapse" data-target="#createDept">Create Department</button>
                            <button class="btn btn-success" data-toggle="collapse" data-target="#createCourse">Create Program</button>
                            <button class="btn btn-success" data-toggle="collapse" data-target="#addnotice">Add Notice</button>
                            @if(!empty($errors))
                                <div class="error-log" style="margin-top:5px;">
                                    @foreach($errors->all() as $error)
                                        <small class="text-danger">* {{$error}}</small><br>
                                    @endforeach
                                </div>
                            @endif
                            <div id="addnotice" class="collapse">
                                <form action="{{URL::to(route('create.notice'))}}" style="margin-top: 20px;" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="notice_title" placeholder="Notice Title" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" name="notice_body" placeholder="Notice Body" required></textarea>
                                    </div>
                                    <button class="btn btn-danger" type="submit">Add</button>
                                </form>
                            </div>

                            <div id="createCourse" class="collapse">
                                <form action="{{route('university.createProgram')}}" method="get" style="margin-top: 20px;">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="coursename" placeholder="Course Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="credit" placeholder="Credit">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="cost" placeholder="Cost">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="total_semester" placeholder="Total Semester">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="semester_duration" placeholder="Semester Duration">
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="department">
                                                    @foreach($all_departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-danger" type="submit">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="update" class="collapse">
                                <form action="{{route('university.update')}}" method="post" style="margin-top: 20px;">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="year" placeholder="Established Year" value="{{$university->established_year}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="address" placeholder="Address" value="{{$university->address}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$university->phone}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="website" placeholder="Website" value="{{$university->website}}">
                                            </div>
                                            <button class="btn btn-danger" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="createDept" class="collapse">
                                <form action="{{route('university.createDepartment')}}" method="get" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="department" placeholder="Department Name">
                                            </div>
                                            <button class="btn btn-danger" type="submit">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" >
                        <div class="white-box analytics-info" style="min-height:400px;">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Departments</th>
                                    <th style="text-align: center">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                <tr>
                                    <td><a style="cursor: pointer"  onclick="showList({{$department->id}},'{{$department->name}}')">{{$department->name}}</a></td>
                                    <td>
                                        <button class="btn btn-lg btn-danger badge"  onclick="deleteData('department',{{$department->id}})">
                                            <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$departments->links()}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                           <div class="row">
                               <div class="col-md-6 text-center" style="margin-top: 30px;">Upload University Cover Photo</div>
                               <div class="col-md-6">
                                   @if ($message = Session::get('success'))
                                       <div class="alert alert-success alert-block" style="margin-bottom: 5px;">
                                           <button type="button" class="close" data-dismiss="alert">×</button>
                                           <strong>{{ $message }}</strong>
                                       </div>
                                   @endif
                                       @if ($message = Session::get('error'))
                                           <div class="alert alert-success alert-block" style="margin-bottom: 5px;">
                                               <button type="button" class="close" data-dismiss="alert">×</button>
                                               <strong>{{ $message }}</strong>
                                           </div>
                                       @endif
                                   <form action="{{URL::to(route('upload.cover'))}}" method="POST" enctype="multipart/form-data">
                                       {{csrf_field()}}
                                       <div class="form-group">
                                           <input type="file" class="form-control-file border" name="image" required>
                                       </div>
                                       <button type="submit" class="btn btn-primary">Submit</button>
                                   </form>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="white-box analytics-info " style="min-height:300px;">
                            <b class="list-group-item" style = "text-align: center"> Department Name: <span id="dept_name"></span></b> <br>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style = "text-align: center">Programs</th>
                                    <th style = "text-align: center" >Delete</th>
                                </tr>
                                </thead>
                                <tbody id="program_list" style = "text-align: center">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box analytics-info " style="min-height:300px;">
                            <b class="list-group-item">Course: <span id="course_name"></span></b>
                            <b class="list-group-item">Credit: <span id="course_credit"></span>Credit </b>
                            <b class="list-group-item">Cost: <span id="course_cost"></span> Taka </b>
                            <b class="list-group-item">Total Semester: <span id="total_semester"></span></b>
                            <b class="list-group-item">Semester Duration: <span id="semester_duration"></span> Month/Semester </b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box analytics-info" style="min-height:300px;">
                            <div class="row">
                                <center><b>Input Weiver Information</b></center>
                            </div>
                            <div class="row">
                                <form action="{{URL::to('/university/waiver/update')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <select name="program_id" class="form-control" required>
                                            @foreach ($all_departments as $department){
                                                @foreach ($department->programs as $program){
                                                    <option value="{{$program->id}}">{{$program->name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="range" placeholder="Range" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="percentage" placeholder="Percent" required>
                                    </div>
                                   <center> <button class="btn btn-success" type="submit">Add</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                ///Notice board
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style = "text-align: center;width: 80%">Notice</th>
                                    <th style = "text-align: center" >Delete</th>
                                </tr>
                                </thead>
                                <tbody id="notice_list" style = "text-align: center">
                                @foreach($notices as $notice)
                                    <tr>
                                        <td>{{$notice->notice_title}}</td>
                                        <td>
                                            <button class="btn btn-lg btn-danger badge"  onclick="deleteData('notice',{{$notice->id}})">
                                                <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> &copy; 2019</footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <script>
        let data;
        let program = "program";
        function showList(id,name) {
            $('#program_list').empty();

            $('#dept_name').html(name);
           let request = $.ajax({
                url: "/university/showProgram/"+id,
                method: "GET",
               type:JSON,
            });

            request.done(function( msg ) {
                data = msg;
                for (const key of Object.keys(msg)) {
                    $('#program_list').append('<tr style="cursor: pointer;"><td onclick="showProgramDetails('+msg[key].id+')">'+msg[key].name+'</td>'
                        +'<td><button class="btn btn-lg btn-danger badge"  onclick="deleteData('+program+','+msg[key].id+')">'
                        + '<span> <i class="fa fa-trash" aria-hidden="true"></i></span>'+'</button></td>' +'</tr>');
                }
            });

            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        }
        function showProgramDetails(id) {
            for (const key of Object.keys(data)) {
               if(data[key].id == id){
                   $('#course_name').html(data[key].name);
                   $('#course_cost').html(data[key].cost);
                   $('#course_credit').html(data[key].credit);
                   $('#total_semester').html(data[key].total_semester);
                   $('#semester_duration').html(data[key].semester_duration);
               }
            }
        }

        function deleteData(section,id) {

            let url = "/university/delete/"+section+"/"+id;
            $.ajax({
                url: url,
                method: "Get",
                success:function (response) {
                   setTimeout(function(){ location.reload(); }, 100);
                }
            });

        }
    </script>
@stop