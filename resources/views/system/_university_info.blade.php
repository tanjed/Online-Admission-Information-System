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
            <tbody>
            <tr>
                <td>>=3.80</td>
                <td>20%</td>

            </tr>
            <tr>
                <td>>=3.85</td>
                <td>30%</td>

            </tr>
            <tr>
                <td>>=3.90</td>
                <td>50%</td>
            </tr>
            <tr>
                <td>4.00</td>
                <td>100%</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>