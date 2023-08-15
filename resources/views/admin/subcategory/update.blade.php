@extends('admin.adminMaster')
@section('title')
    SubCategory Settings
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
                <h4 class="card-title">Update SubCategory</h4>
                <form class="forms-sample" id="setting_form" action="{{route('SubCategoryUpdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$subcategory->name}}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-3 col-form-label">Category</label>
                        @php $categories = App\Models\Category::all(); @endphp
                        @if(count($categories)>0)
                            <div class="col-sm-9">
                                <select class="form-control" id="category" name="category" value="{{$subcategory->category}}" required>
                                    <option value="">Select Category</option>
                                    @foreach ( $categories as $categorie )
                                        <option value="{{$categorie->id}}" {{$subcategory->category == $categorie->id ? 'selected' : ''}}>{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            No Category found. Please add a category.
                        @endif
                    </div>
                    <input type="hidden" name="id" value="{{$subcategory->id}}" >
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
@endsection
