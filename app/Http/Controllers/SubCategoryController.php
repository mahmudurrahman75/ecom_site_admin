<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $categories, $subCategories, $subCategory;
    public function index()
    {
        $this->categories = Category::all();
        return view('admin.sub-category.index', ['categories' => $this->categories]);
    }
    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'create subCategory info successfully');
    }
    public function manage()
    {
        $this->subCategories = SubCategory::all();
        return view('admin.sub-category.manage', ['subCategories'=>$this->subCategories]);
    }

    public function edit($id)
    {
        $this->subCategory = SubCategory::find($id);
        $this->categories  = Category::all();

        return view('admin.sub-category.edit',
            [   'subCategory'   => $this->subCategory,
                'categories'    => $this->categories
            ]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::UpdateSubCategory($request, $id);
        return redirect('/sub-category/manage')->with('message', 'Sub-Category info update successfully');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('message', 'Sub-Category info delete successfully');
    }



}
