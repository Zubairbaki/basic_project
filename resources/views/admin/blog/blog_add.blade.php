@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Blog </h4>

                         <form action="{{route('store.blog')}}" method="POST" enctype="multipart/form-data">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Select</label>
                                    <div class="col-sm-10">
                                        <select name="Blog_categoryid" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($category as $cat)


                                            <option value="{{$cat->id}}">{{$cat->Blog_category}}</option>
                                            @endforeach

                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="Blog_title"  type="text"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog tags</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="Blog_tags"  value="home,tech" type="text"  data-role="tagsinput">
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Descreption</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="Blog_description"></textarea>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Blog Image</label>
                            <div class="col-sm-10">
                                <input name="Blog_image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->


                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <img class="card-img-top img-fluid" id="showImage"
                                        src="{{ url('upload/no_image.jpg') }}"
                                        width="536" height="625" alt="Card image cap">
                                </div>
                            </div>

                        <!-- end row -->
                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <input class="btn btn-info waves-effect waves-light"   value="Insert Blog Data" type="Submit"  id="example-text-input">
                            </div>
                        </div>
                    </form>


                    {{-- endform --}}
                    </div>
                    <script type="text/javascript">
                    $(document).ready(function(){
                        $('#image').change(function(e){
                            var reader = new FileReader();
                            reader.onload=function(e){
                                $('#showImage').attr('src',e.target.result);
                            }
                            reader.readAsDataURL(e.target.files['0']);
                        });
                    })
                    </script>
        </div>
    </div>
</div>
@endsection
