@extends('admin.adminMaster')
@section('title')
    Shop Settings
@endsection
@section('adminMainContent')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Settings</h4>
                <form class="forms-sample">
                    <div class="form-group row">
                        <label for="Title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Value" class="col-sm-3 col-form-label">Value</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Value" placeholder="Value">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary me-2" onclick="settingsSubmit()">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Striped Table</h4>
                <p class="card-description">
                    Add class <code>.table-striped</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    User
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Progress
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face1.jpg" alt="image" />
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face2.jpg" alt="image" />
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $245.30
                                </td>
                                <td>
                                    July 1, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face3.jpg" alt="image" />
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $138.00
                                </td>
                                <td>
                                    Apr 12, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face4.jpg" alt="image" />
                                </td>
                                <td>
                                    Peter Meggik
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face5.jpg" alt="image" />
                                </td>
                                <td>
                                    Edward
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%"
                                            aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 160.25
                                </td>
                                <td>
                                    May 03, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face6.jpg" alt="image" />
                                </td>
                                <td>
                                    John Doe
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 123.21
                                </td>
                                <td>
                                    April 05, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face7.jpg" alt="image" />
                                </td>
                                <td>
                                    Henry Tom
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 150.00
                                </td>
                                <td>
                                    June 16, 2015
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
    <script>
        function settingsSubmit(){
            var title = $("#Title").val();
            var value = $("#Value").val();
            var url = "{{route('ShopSettingsCreate')}}";
            $.ajax({
                url: url,
                dataType: "json",
                type: "Post",
                data: {
                    _token,
                    title,
                    value
                 },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, exception) {
                    var msg = "";
                    if (xhr.status === 0) {
                        msg = "Not connect.\n Verify Network." + xhr.responseText;
                    } else if (xhr.status == 404) {
                        msg = "Requested page not found. [404]" + xhr.responseText;
                    } else if (xhr.status == 500) {
                        msg = "Internal Server Error [500]." +  xhr.responseText;
                    } else if (exception === "parsererror") {
                        msg = "Requested JSON parse failed.";
                    } else if (exception === "timeout") {
                        msg = "Time out error." + xhr.responseText;
                    } else if (exception === "abort") {
                        msg = "Ajax request aborted.";
                    } else {
                        msg = "Error:" + xhr.status + " " + xhr.responseText;
                    }
                }
            });
        }
    </script>
@endsection
