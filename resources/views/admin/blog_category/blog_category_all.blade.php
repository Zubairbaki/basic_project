@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog All Category</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                            <th>Blog Category Name</th>

                                            <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogcategory  as $key => $image)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $image->Blog_category }}</td>




                                        <td>
                                            <a href="{{ route('edit.blog.category', ['id' => $image->id]) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete.blog.category', ['id' => $image->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"><i class="fas fa-trash"></i></a>
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

@endsection


