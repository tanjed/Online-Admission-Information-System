<div class="row m-5">
    <div class="col-md-12">
        <form class="form-control" style="padding: 10px;">
            <br><span>Department</span>
            <select class="form-control" id="department">
                <option>Select Department</option>
                @foreach($university->departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select><br>
            <span>Program</span>
            <select class="form-control" id="program">
            </select>
        </form>
    </div>
</div>

<div class="row m-5">
    <div class="col-md-12">
        <table class=" table table-bordered text-center">
            <tbody>
            <tr>
                <td>Credit</td>
                <td id="program_credit"></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td id="program_cost"></td>
            </tr>
            <tr>
                <td>Total Semester</td>
                <td id="total_semester"></td>
            </tr>
            <tr>
                <td>Semester Duration</td>
                <td id="semester_duration"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

@push('page_scripts')
    <script>
        var departments = JSON.parse('{!! json_encode($university->departments) !!}');
        $('#department').change(function () {
            unset_program_info();
            var department_id = $(this).val();
            var programs = get_programs(department_id);
            generate_program_select_options(programs);
        });

        $('#program').change(function() {
            unset_program_info();
            var department_id = $('#department').val();
            var programs = get_programs(department_id);
            var program_id = $(this).val();
            var program = programs.find(function (program) {
               return program.id == program_id;
            });


            if (program) set_program_info(program);
        });
        
        function get_programs(department_id) {
            var department = departments.find(function (department) {
                return department.id == department_id;
            });

            if (department) return department.programs;
            return [];
        }

        function generate_program_select_options(programs) {
            $('#program').html('').append(`<option>Select Program</option>`);
            for (var i=0; i<programs.length; i++) {
                var program = programs[i];
                $('#program').append(`<option value="${program.id}">${program.name}</option>`);
            }
        }

        function unset_program_info() {
            $('#program_credit').html('');
            $('#program_cost').html('');
            $('#waiver').empty();
        }

        function set_program_info(program) {
           for (var i = 0; i<program.waivers.length; i++){
               $('#waiver').append('<tr><td>'+program.waivers[i].range+'</td><td>'+program.waivers[i].percentage+'%</td></tr>');
           }
            $('#program_credit').html(program.credit);
            $('#program_cost').html(program.cost);
            $('#total_semester').html(program.total_semester);
            $('#semester_duration').html(program.semester_duration);
        }
    </script>
@endpush