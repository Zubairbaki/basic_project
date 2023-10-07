@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footer page</h4>

                         <form action="{{route('Update.footer',$footer->id)}}" method="POST" >
                            @csrf


                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Contact Number </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="number" value="{{$footer->number}}"   type="text" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Descreption</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="short_descreption"  value="{{$footer->short_descreption}}"  type="text"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">address</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="address"  value="{{$footer->address}}"  type="text"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email"  value="{{$footer->email}}"  type="email"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">facebook</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="facebook"  value="{{$footer->facebook}}"  type="text"  id="example-text-input">
                            </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">twitter</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="twitter"  value="{{$footer->twitter}}"  type="text"  id="example-text-input">
                            </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">copyright</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="copyright"  value="{{$footer->copyright}}"  type="text"  id="example-text-input">
                            </div>

                        <!-- end row -->

                        <!-- end row -->
                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <input class="btn btn-info waves-effect waves-light"   value=" Update Footer Data" type="Submit"  id="example-text-input">
                            </div>
                        </div>
                    </form>


                    {{-- endform --}}
                    </div>

        </div>
    </div>
</div>
@endsection
