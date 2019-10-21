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
                    <a class="profile-pic" href="#"><b class="hidden-xs">{{auth('admin')->user()->name}}</b></a>
                </li>
                <li>
                    <a class="profile-pic" href={{route('admin.logout')}}><b class="hidden-xs">Logout</b></a>
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
                    <a href="{{URL::to(route('admin.dashboard'))}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
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
        <div class="container-fluid">
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- Different data widgets -->
            <!-- ============================================================== -->
            <!-- .row -->
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Total Private University</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash"></div>
                            </li>
                            <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$privateUniversities}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Total Public University</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash2"></div>
                            </li>
                            <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$publicUniversities}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Total Student</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash3"></div>
                            </li>
                            <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$totalStudents}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/.row -->
            <!--row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="white-box">
                        <button type="button" class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="collapse" data-target="#demo"><i class="fas fa-plus"></i></button>
                        @if(!empty($errors))
                            <div class="error-log">
                                @foreach($errors->all() as $error)
                                    <small class="text-danger">* {{$error}}</small><br>
                                @endforeach
                            </div>
                        @endif
                        <div id="demo" class="collapse" style="margin-bottom: 10px;">
                            <form action="{{URL::to('admin/create')}}" method="GET">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4"><input type="text" class="form-control" placeholder="University Name" name="name"></div>
                                    <div class="col-md-3"><input type="text" class="form-control" placeholder="University Email" name="email"></div>
                                    <div class="col-md-2"><button type="submit" class="btn btn-outline-secondary" style="width: 100%;">Add</button></div>
                                </div>
                            </form>
                        </div>
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">University Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">CURD</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($adminUniversities as $university)
                                <tr>
                                    <td>{{$university->name}}</td>
                                    <td>{{$university->email}}</td>
                                    <td><button class="btn btn-lg btn-danger badge"  onclick="deleteData({{$university->id}})">
                                            <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                                        </button>
{{--                                        <button class="btn btn-lg btn-info badge" id="{{$university->id}}">--}}
{{--                                            <span><i class="fas fa-pen"></i></span>--}}
{{--                                        </button>--}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        {{ $adminUniversities->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> &copy {{date('Y')}} </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<script>
   function deleteData(id) {
       let url = "/admin/delete/"+id;
       $.ajax({
           url: url,
           method: "Get",
           success:function () {
               setTimeout(function(){ location.reload(); }, 100);
           }
       });

   }
</script>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
@stop