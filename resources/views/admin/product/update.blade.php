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
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Product</h4>
                <form class="forms-sample" id="setting_form" action="{{route('ProductUpdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$product->name}}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="code" class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="code" placeholder="Code" name="code" value="{{$product->code}}" required>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="category" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category" name="category" value="{{$product->category}}" required>
                                <option>Select Category</option>
                                <option {{$product->category == 1 ? "selected" : ""}} value="1">Alabama</option>
                                <option {{$product->category == 2 ? "selected" : ""}} value="2">Wyoming</option>
                                <option {{$product->category == 3 ? "selected" : ""}} value="3">America</option>
                                <option {{$product->category == 4 ? "selected" : ""}} value="4">Canada</option>
                                <option {{$product->category == 5 ? "selected" : ""}} value="5">Russia</option>
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="subcategory" class="col-sm-3 col-form-label">Sub Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="subcategory" name="subcategory" value="{{$product->subcategory}}">
                                <option>Select Sub Category</option>
                                <option {{$product->subcategory == 1 ? "selected" : ""}} value="1">Alabama</option>
                                <option {{$product->subcategory == 2 ? "selected" : ""}} value="2">Wyoming</option>
                                <option {{$product->subcategory == 3 ? "selected" : ""}} value="3">America</option>
                                <option {{$product->subcategory == 4 ? "selected" : ""}} value="4">Canada</option>
                                <option {{$product->subcategory == 5 ? "selected" : ""}} value="5">Russia</option>
                            </select>
                            @error('subcategory')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="brand" name="brand" value="{{$product->brand}}" required>
                                <option>Select Brand</option>
                                <option {{$product->brand == 1 ? "selected" : ""}} value="1">Alabama</option>
                                <option {{$product->brand == 2 ? "selected" : ""}} value="2">Wyoming</option>
                                <option {{$product->brand == 3 ? "selected" : ""}} value="3">America</option>
                                <option {{$product->brand == 4 ? "selected" : ""}} value="4">Canada</option>
                                <option {{$product->brand == 5 ? "selected" : ""}} value="5">Russia</option>
                            </select>
                            @error('brand')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="unit" class="col-sm-3 col-form-label">Unit</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="unit" name="unit" value="{{$product->unit}}" required>
                                <option>Select Unit</option>
                                <option {{$product->unit == 1 ? "selected" : ""}} value="1">Alabama</option>
                                <option {{$product->unit == 2 ? "selected" : ""}} value="2">Wyoming</option>
                                <option {{$product->unit == 3 ? "selected" : ""}} value="3">America</option>
                                <option {{$product->unit == 4 ? "selected" : ""}} value="4">Canada</option>
                                <option {{$product->unit == 5 ? "selected" : ""}} value="5">Russia</option>
                            </select>
                            @error('unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="min_qty" class="col-sm-3 col-form-label">Minimum Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="min_qty" placeholder="Minimum Quantity" name="min_qty" value="{{$product->min_qty}}">
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
                                <input type="radio" class="form-check-input" name="is_active" id="is_active1" value="1" {{$product->is_active == 1 ? "checked" : ""}} > Active </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="is_active" id="is_active2" value="2" {{$product->is_active == 2 ? "checked" : ""}}> Inactive </label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$product->id}}" >
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
@endsection
