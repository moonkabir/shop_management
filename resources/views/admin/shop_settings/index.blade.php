@extends('admin.adminMaster')
@section('title')
    Shop Settings
@endsection
@section('adminMainContent')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Settings</h4>
                <form class="forms-sample" id="setting_form">
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
                <h4 class="card-title">Shop Settings Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            @foreach ($ShopSettings as $setting)
                                <tr>
                                    <td>{{$setting->title}}</td>
                                    <td>{{$setting->value}}</td>
                                </tr>
                            @endforeach
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
                    $('#setting_form')[0].reset();
                    $('#ShopSettings tr:last').after(
                        `
                        <tr>
                            <td>${title}</td>
                            <td>${value}</td>
                        </tr>
                        `
                    );
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
