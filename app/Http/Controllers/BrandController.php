<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $categories, $brands, $brand;

    public function index()
    {
        $this->categories = Category::all();
        return view('admin.brand.index', ['categories' => $this->categories]);
    }
    public function create(Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message', 'create brand info successfully');
    }
    public function manage()
    {
        $this->brands = Brand::all();
        return view('admin.brand.manage', ['brands' => $this->brands]);
    }

    public function edit($id)
    {
        $this->brand = Brand::find($id);
        $this->categories = Category::all();
        return view('admin.brand.edit',
            ['brand' => $this->brand],
            ['category' => $this->categories]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('/brand/manage')->with('message', 'Update Brand info successfully');

    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return back()->with('message', 'Brand info delete successfully');
    }
}
