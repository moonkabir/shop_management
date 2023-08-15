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
                        @php $categories = App\Models\Category::all(); @endphp
                        @if(count($categories)>0)
                            <div class="col-sm-9">
                                <select class="form-control" id="category" name="category" value="{{old("category")}}" required>
                                    <option>Select Category</option>
                                    @foreach ( $categories as $categorie )
                                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            No Category found. Please add a Category.
                        @endif
                    </div>
                    <div class="row form-group">
                        <label for="subcategory" class="col-sm-3 col-form-label">Sub Category</label>
                        @php $subcategories = App\Models\SubCategory::all(); @endphp
                        @if(count($subcategories)>0)
                            <div class="col-sm-9">
                                <select class="form-control" id="subcategory" name="subcategory" value="{{old("subcategory")}}">
                                    <option>Select Sub Category</option>
                                    @foreach ( $subcategories as $subcategorie )
                                        <option value="{{$subcategorie->id}}">{{$subcategorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('subcategory')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            No Sub Category found. Please add a Sub Category.
                        @endif
                    </div>
                    <div class="row form-group">
                        <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                        @php $brands = App\Models\Brand::all(); @endphp
                        @if(count($brands)>0)
                            <div class="col-sm-9">
                                <select class="form-control" id="brand" name="brand" value="{{old("brand")}}" required>
                                    <option>Select Brand</option>
                                    @foreach ( $brands as $brand )
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            No Brand found. Please add a Brand.
                        @endif
                    </div>
                    <div class="row form-group">
                        <label for="unit" class="col-sm-3 col-form-label">Unit</label>
                        @php
                            $Lookup = new App\Models\Lookup;
                            $units = $Lookup->unit();
                        @endphp
                        @if(count($units)>0)
                            <div class="col-sm-9">
                                <select class="form-control" id="unit" name="unit" value="{{old("unit")}}" required>
                                    <option>Select Unit</option>
                                    @foreach ( $units as $unit )
                                        <option value="{{$unit->value}}">{{$unit->title}}</option>
                                    @endforeach
                                </select>
                                @error('unit')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            No Unit found. Please add a Unit.
                        @endif
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






                    <div class="row form-group">
                        <label for="is_active" class="col-sm-3 col-form-label">Status</label>
                        @php
                            $Lookup = new App\Models\Lookup;
                            $statusData = $Lookup->status();
                        @endphp
                        @if(count($statusData)>0)
                            <div class="col-sm-9">
                                <select class="form-control" id="is_active" name="is_active" value="{{old("is_active")}}" required>
                                    <option>Select Status</option>
                                    @foreach ( $statusData as $status )
                                        <option value="{{$status->value}}">{{$status->title}}</option>
                                    @endforeach
                                </select>
                                @error('is_active')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            No Status found. Please add a Status.
                        @endif
                    </div>






                    <button type="submit" class="btn btn-primary me-2">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
@endsection
