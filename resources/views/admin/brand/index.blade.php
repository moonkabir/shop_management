@extends('admin.adminMaster')
@section('title')
    Brand Settings
@endsection
@section('adminMainContent')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Brand Settings Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Brand Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            <?php $i=0; ?>
                            @foreach ($brands as $brand)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{$i}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->created_at}}</td>
                                    <td style="display: flex">
                                        <a href="{{route('BrandEdit',$brand->id)}}" style="padding: 1px 6px"><i class="mdi mdi-tooltip-edit"></i></a> |
                                        <form action="{{route('BrandDelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$brand->id}}">
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
