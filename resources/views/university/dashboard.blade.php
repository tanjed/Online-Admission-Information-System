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
                        <div class="white-box analytics-info text-center" style="min-height:345px;">
                            <button class="btn btn-success" data-toggle="collapse" data-target="#update">Update Information</button>
                            <button class="btn btn-success" data-toggle="collapse" data-target="#createDept">Create Department</button>
                            <button class="btn btn-success" data-toggle="collapse" data-target="#createCourse">Create Program</button>
                            @if(!empty($errors))
                                <div class="error-log" style="margin-top:5px;">
                                    @foreach($errors->all() as $error)
                                        <small class="text-danger">* {{$error}}</small><br>
                                    @endforeach
                                </div>
                            @endif
                            <div id="createCourse" class="collapse">
                                <form action="{{route('university.createProgram')}}" method="get" style="margin-top: 20px;">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="usr" name="coursename" placeholder="Course Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="usr" name="credit" placeholder="Credit">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="usr" name="cost" placeholder="Cost">
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
                                                <input type="text" class="form-control" name="year" placeholder="Established Year">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="website" placeholder="Website">
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

                    <div class="col-md-6">
                        <div class="white-box analytics-info ">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Departments</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                <tr>
                                    <td><a style="cursor: pointer"  onclick="showList({{$department->id}},'{{$department->name}}')">{{$department->name}}</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$departments->links()}}
                        </div>
                    </div>
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="white-box analytics-info ">
                            <b class="list-group-item"> Department Name: <span id="dept_name"></span></b> <br>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Programs</th>
                                </tr>
                                </thead>
                                <tbody id="program_list">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box analytics-info ">
                            <b class="list-group-item">Course: <span id="course_name"></span></b>
                            <b class="list-group-item">Credit: <span id="course_credit"></span>Credit </b>
                            <b class="list-group-item">Cost: <span id="course_cost"></span>Taka </b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box analytics-info ">
                            <table class="table table-striped table-condensed table-teal" style="font-size: 11px">
                                <tbody>
                                <tr>
                                    <th>Marks</th>
                                    <th>Grade</th>
                                    <th>Grade Point</th>
                                    <th>Remarks</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>80-100%</div>
                                    </td>
                                    <td>A +</td>
                                    <td>4.00</td>
                                    <td>Outstanding</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>75-79%</div>
                                    </td>
                                    <td>A</td>
                                    <td>3.75</td>
                                    <td><span class="style6">Excellent</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>70-74%</div>
                                    </td>
                                    <td>A-</td>
                                    <td>3.50</td>
                                    <td>Very Good</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>65-69%</div>
                                    </td>
                                    <td>B+</td>
                                    <td>3.25</td>
                                    <td>Good</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>60-64%</div>
                                    </td>
                                    <td>B</td>
                                    <td>3.00</td>
                                    <td>Satisfactory</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>55-59%</div>
                                    </td>
                                    <td>B-</td>
                                    <td>2.75</td>
                                    <td>Above Average</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>50-54%</div>
                                    </td>
                                    <td>C+</td>
                                    <td>2.50</td>
                                    <td>Average</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>45-49%</div>
                                    </td>
                                    <td>C</td>
                                    <td>2.25</td>
                                    <td>Bellow Average</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>40-44%</div>
                                    </td>
                                    <td>D</td>
                                    <td>2.00</td>
                                    <td>Pass</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>00-39%</div>
                                    </td>
                                    <td>F</td>
                                    <td>0.00</td>
                                    <td>Fail</td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="font-size: 12px; color: #E65100">
                                        <div align="center">Effective from Summer Semester 2007</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <script>
        let data;
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
                    $('#program_list').append('<tr style="cursor: pointer;"><td onclick="showProgramDetails('+msg[key].id+')">'+msg[key].name+'</td></tr>');
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
               }
            }
        }
    </script>
@stop