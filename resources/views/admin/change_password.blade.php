@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password Page</h4>

                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    @endif

                         <form action="{{route('update.password')}}" method="post" >
                            @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="oldpassword"  value="" type="password" placeholder="oldpassword" id="oldpassword">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="newpassword"  value="" type="newpassword" placeholder="Newpassword" id="Newpassword">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Comfirm Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="comfirmpassword"  value="" type="comfirmpassword" placeholder="Comfirm Password" id="comfirmpassword">
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <input class="btn btn-info waves-effect waves-light"   value="Change Password" type="Submit"  id="example-text-input">
                            </div>
                        </div>
                    </form>
                    {{-- endform --}}
                    </div>

        </div>
    </div>
</div>
@endsection
