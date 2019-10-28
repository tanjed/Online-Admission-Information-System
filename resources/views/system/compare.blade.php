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
                    <div class="input-group mb-3">
                        <select class="form-control" id="programs">

                        </select>
                    </div>
                </form>
                <div id="result" style="min-height: 5px;position: relative;top: -20px;left: 0px;background:#EAEEF2;padding: 10px;display: none;z-index: 1; "></div>
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
                        <td>Program Name</td>
                    </tr>
                    <tr>
                        <td>Total Credit</td>
                    </tr>
                    <tr>
                        <td>Total Semester</td>
                    </tr>
                    <tr>
                        <td>Cost</td>
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

    let departments = [],all_programs =[] ;
    $("#search").keyup(function (event) {
        $("#programs").html('');
        if (event.keyCode == 8 || event.keyCode == 46) {
            $("#result").empty();
        }
         sendData($(this).val());
    });

    $("#programs").change(function () {
       let program_id =  $(this).val();
       let programs = get_program(program_id);
       setData(programs);

    });

    function setData(program) {
        let query =   '<tr>'+
            '<td style="padding: 25px;">'+$('#search').val()+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+program.name+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+program.credit+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+program.total_semester+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+program.cost+'/- </td>'+
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

    function get_program(id) {
        for (let i = 0; i<all_programs.length; i++){
            if(all_programs[i].id == id){
                return all_programs[i];
            }
        }
    }


    function findData(id){

        $("#result").empty();
        $("#result").hide();


      let university =  universities.find(function (university) {
           return university.id == id;
       });
        $("#search").val(university.name);
        $('#programs').append('<option>Choose Program</option>');
        for (let i = 0; i< university.departments.length; i++){
            for (let j = 0; j<university.departments[i].programs.length; j++){
                $('#programs').append(`<option value="${university.departments[i].programs[j].id}"> ${university.departments[i].programs[j].name}</option>`);
                all_programs.push(university.departments[i].programs[j]);
            }
        }
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
               $("#result").append('<a class="list-group" onclick="findData('+universities[i].id+')" style="cursor: pointer">'+universities[i].name+'</a>');
           }
       });

   }
</script>
@stop