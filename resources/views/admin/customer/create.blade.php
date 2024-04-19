@extends('admin.adminMaster')
@section('title')
    Customer Settings
@endsection
@section('adminMainContent')
    <style>
        select.form-control, select.typeahead, select.tt-query, select.tt-hint {
            color: #000;
            padding: 0.875rem 1.375rem !important;
        }
    </style>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer</h4>
                <form class="forms-sample" id="setting_form" action="{{route('CustomerStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <label for="idNo" class="col-sm-3 col-form-label">Id</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="idNo" placeholder="ID" name="idNo" value="{{old("idNo")}}" required>
                            @error('idNo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{old("name")}}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="personal_contact_no" class="col-sm-3 col-form-label">Contact No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="personal_contact_no" placeholder="Contact No" name="personal_contact_no" value="{{old("personal_contact_no")}}" required>
                            @error('personal_contact_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{old("address")}}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
@endsection
