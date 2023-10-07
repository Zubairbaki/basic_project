@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog All </h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                            <th>Blog Category</th>
                                            <th>Blog Title</th>
                                            <th>Blog Tags</th>
                                           <th>Blog Image</th>
                                            <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog  as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item['category']['Blog_category']}}</td>
                                        <td>{{ $item->Blog_title}}</td>
                                        <td>{{ $item->Blog_tags}}</td>
                                        <td>
                                            <img src="{{ asset('/' . $item->Blog_image) }}" width="100" height="80">
                                        </td>


                                        <td>
                                            <a href="{{ route('edit.blog', ['id' => $item->id]) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete.blog', ['id' => $item->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"><i class="fas fa-trash"></i></a>
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


