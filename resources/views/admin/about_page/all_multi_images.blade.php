@extends('admin.admin_master')

@section('admin')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Images</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>About Multi Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allMultImage as $key => $image)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('/' . $image->multi_image) }}" width="100" height="80" alt="Image {{ $key + 1 }}">
                                        </td>

                                        <td>

                                            <a href="{{ route('edit.multi.image', ['id' => $image->id]) }}" class="btn btn-primary" title="Edit"> <i class=" fas fa-edit"></i></a>
                                            <a href="{{ route('delet.multi.image', ['id' => $image->id]) }}" class="btn btn-danger" title="Delete" id="delete"><i class="  fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid  -->
    </div>
    <!-- End Page-content -->
</div>
@endsection


