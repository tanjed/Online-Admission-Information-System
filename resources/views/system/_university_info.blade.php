<div class="row m-5">
    <div class="col-md-6">
        <h5 class="m-2 text-center">University Details</h5>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td>Established Year</td>
                <td>{{$university->established_year}}</td>

            </tr>
            <tr>
                <td>Address</td>
                <td>{{$university->address}}</td>

            </tr>
            <tr>
                <td>Email</td>
                <td>{{$university->email}}</td>
            </tr>
            <tr>
                <td>Website</td>
                <td>{{$university->website}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h5 class="m-2 text-center">Waiver Information</h5>
        <table class="table table-bordered">
            <tbody id="waiver">

            </tbody>
        </table>
    </div>
</div>