@extends('admin.master')

@section('title')

@endsection

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">All Sub-Category Information</h2>

                    <h4 class="text-center text-success">{{session('message')}}</h4>

                    {{--Table  --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Category Name</th>
                                            <th>Sub-Category Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($subCategories as $subCategory)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$subCategory->category->name}}</td>
                                            <td>{{$subCategory->name}}</td>
                                            <td>{{$subCategory->description}}</td>

                                            <td><img height="60px" width="80px" src="{{asset($subCategory->image)}}" alt=""></td>

                                            <td>{{$subCategory->satus}}</td>
                                            <td>
                                                <a href="{{route('subCategory.edit', ['id' => $subCategory->id])}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('subCategory.delete', ['id' => $subCategory->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

