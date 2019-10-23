@extends('master')
@section('content')
<div class="container-fluid" style="min-height: 800px;background:#EAEEF2 ">
    <div class="container bg-light"  style="min-height: 800px;">
        <div class="row">
            <div class="col-md-12">
                <form class="mt-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="search" placeholder="Search">
                    </div>
                </form>
                <div id="result" style="min-height: 5px;position: relative;top: -20px;left: 0px;background:#EAEEF2;padding: 10px;display: none">

                </div>
                <span class="text-danger"><small>* Select maximam 3 university</small></span>
            </div>
        </div>
        <h2><center>Compare</center></h2>    <hr>
        <div class="row p-5">
            <div class="col-md-3 p-0 m-0">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td style="padding: 37px;">University Name</td>
                    </tr>
                    <tr>
                        <td>Established Year</td>
                    </tr>
                    <tr>
                        <td>Total Departments</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 p-0 m-0">
                <table  class="table table-bordered">
                    <tbody id="table1">

                    </tbody>
                </table>
            </div>
            <div class="col-md-3 p-0 m-0">
                <table class="table table-bordered">
                    <tbody id="table2">

                    </tbody>
                </table>
            </div>
            <div class="col-md-3 p-0 m-0">
                <table class="table table-bordered">
                    <tbody id="table3">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let universities,length,table_no = 0;
    $("#search").keyup(function (event) {
        if (event.keyCode == 8 || event.keyCode == 46) {
            $("#result").empty();
        }
         sendData($(this).val());
    });
    function setData(id){
      let university =  universities.find(function (university) {
           return university.id == id;
       });
       let department_number = Object.keys(university.departments).length;

      let query =   '<tr>'+
                        '<td style="padding: 25px;">'+university.name+'</td>'+
                    '</tr>'+
                    '<tr>'+
                         '<td>'+university.established_year+'</td>'+
                    '</tr>'+
                    '<tr>'+
                         '<td>'+department_number+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>'+university.email+'</td>'+
                    '</tr>';
       if(table_no == 0){
          $('#table1').append(query);
       }else if(table_no == 1){
           $('#table2').append(query);
       }else{
           $('#table3').append(query);
       }
        table_no++;
    }

   function sendData(input_value) {
       let request = $.ajax({
           url: "/compare/result",
           method: "GET",
           data: { name : input_value },
       });

       request.done(function( msg ) {
           $("#result").empty();
           $("#result").show();
          universities = JSON.parse(msg);
          length = Object.keys(universities).length;
           for (let i = 0; i<length; i++) {
               $("#result").append('<a class="list-group" onclick="setData('+universities[i].id+')" style="cursor: pointer">'+universities[i].name+'</a>');
           }
       });

   }
</script>
@stop