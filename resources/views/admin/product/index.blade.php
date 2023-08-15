@extends('admin.adminMaster')
@section('title')
    Product Settings
@endsection
@section('adminMainContent')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Settings Table</h4>
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

                                    <td>{{ App\Models\Category::find($product->category)->name;}}</td>
                                    <td>{{ App\Models\SubCategory::find($product->subcategory)->name;}}</td>
                                    <td>{{ App\Models\Brand::find($product->brand)->name;}}</td>
                                    <td>{{ App\Models\Lookup::where(['name'=> 'unit','value'=>$product->unit])->value('title') }}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{ App\Models\Lookup::where(['name'=> 'status','value'=>$product->is_active])->value('title') }}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td style="display: flex">
                                        <a href="{{route('ProductEdit',$product->id)}}" style="padding: 1px 6px"><i class="mdi mdi-tooltip-edit"></i></a> |
                                        <form action="{{route('ProductDelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
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
