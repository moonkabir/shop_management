@extends('admin.adminMaster')
@section('title')
    SubCategory Settings
@endsection
@section('adminMainContent')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">SubCategory Settings Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>SubCategory Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            <?php $i=0; ?>
                            @foreach ($subcategorys as $subcategory)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{$i}}</td>
                                    <td>{{ App\Models\Category::find($subcategory->category)->name;}}</td>
                                    <td>{{$subcategory->name}}</td>
                                    <td>{{$subcategory->created_at}}</td>
                                    <td style="display: flex">
                                        <a href="{{route('SubCategoryEdit',$subcategory->id)}}" style="padding: 1px 6px"><i class="mdi mdi-tooltip-edit"></i></a> |
                                        <form action="{{route('SubCategoryDelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$subcategory->id}}">
                                            <button type="submit" style="border: 0;"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </td>
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
@endsection
