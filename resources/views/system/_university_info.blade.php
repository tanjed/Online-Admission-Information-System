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
                <td><a href="https://{{$university->website}}" target="_blank">{{$university->website}}</a></td>
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