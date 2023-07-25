@extends('admin.adminMaster')
@section('title')
    Product Settings
@endsection
@section('adminMainContent')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Settings Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>price</th>
                                <th>Status</th>
                                <th>Created Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            <?php $i=0; ?>
                            @foreach ($products as $product)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{$i}}</td>
                                    <td>{{$product->product_id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->subcategory}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{$product->unit}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->is_active}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>

                                        <a href="{{route('ProductEdit',$product->id)}}"><i class="mdi mdi-tooltip-edit"></i></a> |
                                        <form action="{{route('ProductDelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <button type="submit"><i class="mdi mdi-delete"></i></button>
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
