@extends('admin.master')

@section('title')

@endsection

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">All Brand Information</h2>

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
                                            <th>Brand Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$brand->category->name}}</td>
                                                <td>{{$brand->name}}</td>
                                                <td>{{$brand->description}}</td>

                                                <td><img height="60px" width="80px" src="{{asset($brand->image)}}" alt=""></td>

                                                <td>{{$brand->satus}}</td>
                                                <td>
                                                    <a href="{{route('brand.edit', ['id' => $brand->id])}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('brand.delete', ['id' => $brand->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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


