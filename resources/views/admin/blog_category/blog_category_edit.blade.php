@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update blog Category</h4><br><br>

                         <form action="{{route('update.blog.category',$editblog->id)}}" method="POST" >
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Update blog Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="Blog_category"   type="text" value="{{$editblog->Blog_category}}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <input class="btn btn-info waves-effect waves-light"   value="Update Blog Data" type="Submit"  id="example-text-input">
                            </div>
                        </div>
                    </form>


                    {{-- endform --}}
                    </div>

        </div>
    </div>
</div>
@endsection
