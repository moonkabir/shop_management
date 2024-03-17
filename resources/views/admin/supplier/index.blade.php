@extends('admin.adminMaster')
@section('title')
    Supplier Settings
@endsection
@section('adminMainContent')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Supplier Settings Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Supplier ID No</th>
                                <th>Supplier Name</th>
                                <th>Supplier Contact No</th>
                                <th>Supplier Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            <?php $i=0; ?>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{$i}}</td>
                                    <td>{{$supplier->idNo}}</td>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->personal_contact_no}}</td>
                                    <td>{{$supplier->address}}</td>
                                    <td style="display: flex">
                                        <a href="{{route('SupplierEdit',$supplier->id)}}" style="padding: 1px 6px"><i class="mdi mdi-tooltip-edit"></i></a> |
                                        <form action="{{route('SupplierDelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$supplier->id}}">
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
