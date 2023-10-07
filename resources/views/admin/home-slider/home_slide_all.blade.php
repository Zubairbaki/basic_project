@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slide</h4>

                         <form action="{{route('update.slider')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$homeslide->id}}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title"  value="{{$homeslide->title}}" type="text" placeholder="title" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short_title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="short_title"  value="{{$homeslide->short_title}}" type="text"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">video_url	</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="video_url"  value="{{$homeslide->video_url}}" type="text"  id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Slide Image</label>
                            <div class="col-sm-10">
                                <input name="home_slider" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->


                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <img class="card-img-top img-fluid" id="showImage"
                                        src="{{ (!empty($homeslide->home_slider)) ? url($homeslide->home_slider) : url('upload/no_image.jpg') }}"
                                        width="636" height="825" alt="Card image cap">
                                </div>
                            </div>

                        <!-- end row -->
                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <input class="btn btn-info waves-effect waves-light"   value="Update slide" type="Submit"  id="example-text-input">
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
