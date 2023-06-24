@extends('admin.master')

@section('title')
    Add Category
@endsection

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Update Sub-Category Form</h4>

                    <h4 class="text-center text-success">{{session('message')}}</h4>

                    <form action="{{route('sub-category.update', ['id' => $subCategory->id])}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                            <div class="col-sm-9">

                                <select class="form-control" name="category_id">
                                    <option value="" disabled selected>--select category name--</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $subCategory->category_id ? 'selected' : " "}}>{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>


                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub-Category name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="{{$subCategory->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Sub-Category Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="description" class="form-control">{{$subCategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Sub-Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                                <img src="{{asset($subCategory->image)}}" alt="" height="80px" width="100px">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Sub-Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


