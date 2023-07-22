@extends('admin.adminMaster')
@section('title')
    Shop Settings
@endsection
@section('adminMainContent')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Settings</h4>
                <form class="forms-sample" id="setting_form" action="{{route('ShopSettingsCreate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="shop_name" class="col-sm-3 col-form-label">Shop Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_name" placeholder="Shop Name" name="shop_name" value="{{old("shop_name")}}">
                            @error('shop_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{old("address")}}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{old("phone")}}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old("email")}}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo" class="col-sm-3 col-form-label">Logo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="logo" placeholder="Logo" name="logo" value="{{old("logo")}}">
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2" onclick="settingsSubmit()">Submit</button>
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
                                <th>Shop Name</th>
                                <th>Address</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>logo</th>
                                <th>Created Time</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            @foreach ($ShopSettings as $setting)
                                <tr>
                                    <td>{{$setting->shop_name}}</td>
                                    <td>{{$setting->address}}</td>
                                    <td>{{$setting->phone}}</td>
                                    <td>{{$setting->email}}</td>
                                    <td><img src="{{asset('uploadImages')}}/{{$setting->logo}}" alt=""></td>
                                    <td>{{$setting->created_at}}</td>
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
        // function settingsSubmit(){
        //     var shop_name = $("#shop_name").val();
        //     var address = $("#address").val();
        //     var phone = $("#phone").val();
        //     var email = $("#email").val();
        //     var logo = $("#logo").val();
        //     var url = "{{route('ShopSettingsCreate')}}";
        //     $.ajax({
        //         url: url,
        //         dataType: "json",
        //         type: "Post",
        //         data: {
        //             _token,
        //             shop_name,
        //             address,
        //             phone,
        //             email,
        //             logo,
        //          },
        //         success: function (data) {
        //             console.log(data);
        //             $('#setting_form')[0].reset();
        //             $('#ShopSettings tr:last').after(
        //                 `
        //                 <tr>
        //                     <td>${shop_name}</td>
        //                     <td>${address}</td>
        //                 </tr>
        //                 `
        //             );
        //         },
        //         error: function (xhr, exception) {
        //             var msg = "";
        //             if (xhr.status === 0) {
        //                 msg = "Not connect.\n Verify Network." + xhr.responseText;
        //             } else if (xhr.status == 404) {
        //                 msg = "Requested page not found. [404]" + xhr.responseText;
        //             } else if (xhr.status == 500) {
        //                 msg = "Internal Server Error [500]." +  xhr.responseText;
        //             } else if (exception === "parsererror") {
        //                 msg = "Requested JSON parse failed.";
        //             } else if (exception === "timeout") {
        //                 msg = "Time out error." + xhr.responseText;
        //             } else if (exception === "abort") {
        //                 msg = "Ajax request aborted.";
        //             } else {
        //                 msg = "Error:" + xhr.status + " " + xhr.responseText;
        //             }
        //         }
        //     });
        // }
    </script>
@endsection
