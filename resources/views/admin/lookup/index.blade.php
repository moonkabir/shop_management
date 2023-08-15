@extends('admin.adminMaster')
@section('title')
    Lookup Settings
@endsection
@section('adminMainContent')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lookup Settings Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Lookup Name</th>
                                <th>Lookup Value</th>
                                <th>Lookup Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ShopSettings">
                            <?php $i=0; ?>
                            @foreach ($lookups as $lookup)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{$i}}</td>
                                    <td>{{$lookup->name}}</td>
                                    <td>{{$lookup->value}}</td>
                                    <td>{{$lookup->title}}</td>
                                    <td>{{$lookup->created_at}}</td>
                                    <td style="display: flex">
                                        <a href="{{route('LookupEdit',$lookup->id)}}" style="padding: 1px 6px"><i class="mdi mdi-tooltip-edit"></i></a> |
                                        <form action="{{route('LookupDelete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$lookup->id}}">
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
