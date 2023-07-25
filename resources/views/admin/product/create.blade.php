@extends('admin.adminMaster')
@section('title')
    Product Settings
@endsection
@section('adminMainContent')
    <style>
        select.form-control, select.typeahead, select.tt-query, select.tt-hint {
            color: #000;
            padding: 0.875rem 1.375rem !important;
        }
    </style>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product</h4>
                <form class="forms-sample" id="setting_form" action="{{route('ProductStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                        <label for="code" class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="code" placeholder="Code" name="code" value="{{old("code")}}" required>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="category" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category" name="category" value="{{old("category")}}" required>
                                <option>Select Category</option>
                                <option value="1">Alabama</option>
                                <option value="2">Wyoming</option>
                                <option value="3">America</option>
                                <option value="4">Canada</option>
                                <option value="5">Russia</option>
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="subcategory" class="col-sm-3 col-form-label">Sub Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="subcategory" name="subcategory" value="{{old("subcategory")}}">
                                <option>Select Sub Category</option>
                                <option value="1">Alabama</option>
                                <option value="2">Wyoming</option>
                                <option value="3">America</option>
                                <option value="4">Canada</option>
                                <option value="5">Russia</option>
                            </select>
                            @error('subcategory')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="brand" name="brand" value="{{old("brand")}}" required>
                                <option>Select Brand</option>
                                <option value="1">Alabama</option>
                                <option value="2">Wyoming</option>
                                <option value="3">America</option>
                                <option value="4">Canada</option>
                                <option value="5">Russia</option>
                            </select>
                            @error('brand')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="unit" class="col-sm-3 col-form-label">Unit</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="unit" name="unit" value="{{old("unit")}}" required>
                                <option>Select Unit</option>
                                <option value="1">Alabama</option>
                                <option value="2">Wyoming</option>
                                <option value="3">America</option>
                                <option value="4">Canada</option>
                                <option value="5">Russia</option>
                            </select>
                            @error('unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="min_qty" class="col-sm-3 col-form-label">Minimum Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="min_qty" placeholder="Minimum Quantity" name="min_qty" value="{{old("min_qty")}}">
                            @error('min_qty')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="is_active" id="is_active1" value="1" checked> Active </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="is_active" id="is_active2" value="2"> Inactive </label>
                            </div>
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
