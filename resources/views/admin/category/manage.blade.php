@extends('admin.master')

@section('title')

@endsection

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">All Category Information</h2>

                    {{--Table  --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center text-info">{{session('message')}}</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($categoryes as $category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td><img height="60px" width="80px" src="{{asset($category->image)}}" alt=""></td>
                                            <td>{{$category->status}}</td>
                                            <td>
                                                <a href="{{route('category.edit', ['id' =>$category->id])}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('category.delete', ['id' => $category->id])}}"  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...');"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div>
    </div>

@endsection
