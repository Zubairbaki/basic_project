@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About page</h4>

                         <form action="{{route('update.about')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$aboutpage->id}}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title"  value="{{$aboutpage->title}}" type="text" placeholder="title" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short_title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="short_title"  value="{{$aboutpage->short_title}}" type="text"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Decription</label>
                            <div class="mb-3">

                                <div>
                                    <textarea required="" name="short_description" class="form-control" rows="5">{{$aboutpage->short_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Long Decription</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="long_description">{{$aboutpage->long_description}}</textarea>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Image</label>
                            <div class="col-sm-10">
                                <input name="about_image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->


                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <img class="card-img-top img-fluid" id="showImage"
                                        src="{{ (!empty($aboutpage->about_image)) ? url($aboutpage->about_image) : url('upload/no_image.jpg') }}"
                                        width="536" height="625" alt="Card image cap">
                                </div>
                            </div>

                        <!-- end row -->
                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <input class="btn btn-info waves-effect waves-light"   value="Update About" type="Submit"  id="example-text-input">
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
