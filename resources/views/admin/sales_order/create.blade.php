@extends('admin.adminMaster')
@section('title')
    Sales Order Create
@endsection
@section('adminMainContent')
    <style>
        select.form-control,
        select.typeahead,
        select.tt-query,
        select.tt-hint {
            color: #000;
            padding: 0.875rem 1.375rem !important;
        }
    </style>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sales Order FORM</h4>
                <form class="forms-sample" id="setting_form" action="{{ route('SalesOrderStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="date_of_sell" class="col-sm-3 col-form-label">Date Of Sell<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="date_of_sell" name="date_of_sell" placeholder="dd/mm/yyyy" value="{{ old('date_of_sell') }}" required>
                                    @error('date_of_sell')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="manual_order_no" class="col-sm-3 col-form-label">Manual Order No </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="manual_order_no" placeholder="Manual Order No" name="manual_order_no" value="{{ old('manual_order_no') }}" required>
                                    @error('manual_order_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="company_id" class="col-sm-3 col-form-label">Company</label>
                                <div class="col-sm-9">
                                    <select class="select2_dropdown w-100 form-control" name="company_id" value="{{ old('company_id') }}" required>
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="AM">America</option>
                                        <option value="CA">Canada</option>
                                        <option value="RU">Russia</option>
                                    </select>
                                    @error('company_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>





                    <button type="submit" class="btn btn-primary me-2">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraScripts')
@endsection
