@extends('admin.adminMaster')
@section('title')
    Customer Settings
@endsection
@section('adminMainContent')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Settings Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Customer ID No</th>
                                <th>Customer Name</th>
                                <th>Customer Contact No</th>
                                <th>Customer Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            <?php $i=0; ?>
                            @foreach ($customers as $customer)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{$i}}</td>
                                    <td>{{$customer->idNo}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->personal_contact_no}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td style="display: flex">
                                        <a href="{{route('CustomerEdit',$customer->id)}}" style="padding: 1px 6px"><i class="mdi mdi-tooltip-edit"></i></a> |
                                        <form action="{{route('CustomerDelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$customer->id}}">
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
