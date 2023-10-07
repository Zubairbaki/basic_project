@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Update Multi Images</h4>

                         <form action="{{route('update.multi.image',['id' => $MultImage->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> About Multi Images</label>
                            <div class="col-sm-10">
                                <input name="multi_image" class="form-control" type="file" id="image" >
                            </div>
                        </div>
                        <!-- end row -->


                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <img class="card-img-top img-fluid" id="showImage"
                                        src="{{asset($MultImage->multi_image) }}"
                                        width="536" height="625" alt="Card image cap">
                                </div>
                            </div>

                        <!-- end row -->
                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <input class="btn btn-info waves-effect waves-light"   value="Add Multi Image" type="Submit"  id="example-text-input">
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
