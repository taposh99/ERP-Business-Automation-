<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Branch;
use App\Models\Inventory\Warehouse;
use App\Models\ProductSetup\Category;
use App\Models\ProductSetup\Product;
use App\Models\ProductSetup\Stock;
use App\Models\ProductSetup\SubCategory;
use Illuminate\Http\Request;

class ProductSetupController extends Controller
{
    /////////////// Cagegory ///////////////
    public function manageCategory()
    {
        $categories = Category::all()->sortByDesc('id')->values();
        return view('product_setup.category.table', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.category')->with('message', 'Category Added Successfully');
    }
    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('product_setup.category.edit', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.category')->with('message', 'Category Updated');
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.manage.category')->with('error', 'Category deleted');
    }

    /////////////// sub-Cagegory ///////////////
    public function manageSubCategory()
    {
        $categories = Category::with('subCategories')->orderBy('id', 'desc')->get();

        $subCategories = SubCategory::with('category')->orderBy('id', 'desc')->get();
        // dd($subCategories);

        return view('product_setup.subCategory.table', compact('categories', 'subCategories'));
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories|max:20',
            'description' => 'required',
        ]);
        SubCategory::create([
            'name' => $request->name,
            'description' => $request->description,

            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.manage.subCategory')->with('message', 'Sub-Category added successfully');
    }

    public function editSubCategory($id)
    {
        $subCategory = SubCategory::find($id);
        return view('product_setup.subCategory.edit', compact('subCategory'));
    }
    public function updateSubCategory(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.subCategory')->with('message', 'Sub-Category Updated Successfully');
    }
    public function deleteSubCategory($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->route('admin.manage.subCategory')->with('error', 'Sub-Category Deleted');
    }

    /////////////// product ///////////////
    public function manageProduct()
    {
        // dd('here');
        $categories = Category::with('subCategories')->OrderBy('id', 'desc')->get();
        // dd($categories);
        $subCategories = SubCategory::with('product')->orderBy('id', 'desc')->get();
        $branches = Branch::with('product')->orderBy('id', 'desc')->get();
        $warehouses = Warehouse::with('product')->orderBy('id', 'desc')->get();
        $products = Product::with('subCategory')->orderBy('id', 'desc')->get();
        return view('product_setup.product.table', compact('branches', 'warehouses', 'categories', 'subCategories', 'products'));
    }

    // json = get cat wise sub-cat
    public function getCatWiseSubCat($id)
    {
        $html = '';
        $subCategories = SubCategory::where('category_id', $id)->get();

        foreach ($subCategories as $subCategory) {
            $html .= '<option value="' . $subCategory->id . '"> ' . $subCategory->name . ' </option> ';
        }
        return response()->json($html);
    }
    // json = branch wise warehouse
    public function branchWarhouse($id)
    {
        $html='';
        $i=1;
       $warehouses = Warehouse::where('branch_id',$id)->get();
       foreach($warehouses as $warehouse){
        $i++;
        if($i==2){
            $html .= '<option value="'. $warehouse->id .'" selected>'. $warehouse->name .'</option>';
        }else{
            $html .= '<option value="'. $warehouse->id .'">'. $warehouse->name .'</option>';
        }
       }
       return response()->json($html);
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'offer' => 'required',
            'warranty' => 'required',
            'description' => 'required',

            'category_id' => 'required',
            'sub_category_id' => 'required',
            'branch_id' => 'nullable',
            'warehouse_id' => 'nullable',
        ]);
        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/products'), $filename);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $filename,
            'offer' => $request->offer,
            'warranty' => $request->warranty,
            'description' => $request->description,

            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'branch_id' => $request->branch_id,
            'warehouse_id' => $request->warehouse_id,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product added successfully');
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('product_setup.product.edit', compact('product'));
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'offer' => $request->offer,
            'description' => $request->description,
            'warranty' => $request->warranty,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product updated');
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $image = str_replace('\\', '/', public_path('uploads/products/' . $product->image));
        if (is_file($image)) {
            unlink($image);
            $product->delete();
            return redirect()->route('admin.manage.product')->with('error', 'Product deleted');
        } else {
            $product->delete();
            return redirect()->back()->with('error', 'image not found! product deleted');
        }
    }

    public function viewProduct($id)
    {
        $product = Product::find($id);
        return view('product_setup.product.view', compact('product'));
    }
    public function changeProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/products'), $filename);
        }
        $product->update([
            'image' => $filename,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product Image Updated');
    }

    /////////////// stock ///////////////
    public function manageStock()
    {
        $branches = Branch::with('product')->orderBy('id', 'desc')->get();
        // dd($branches);
        $warehouses = Warehouse::with('product')->orderBy('id', 'desc')->get();
        $products = Product::with('stock')->orderBy('id', 'desc')->get();
        $stocks = Stock::with('product')->orderBy('id', 'desc')->get();
        return view('product_setup.stock.table', compact('branches', 'warehouses', 'products', 'stocks'));
    }

      // json = get warehouse wise product
      public function warehouseProduct($id)
      {
          $html='';
         $products = Product::where('warehouse_id',$id)->get();
         foreach($products as $product){
          $html .= '<option value="'. $product->id .'">'. $product->name .'</option>';
         }
         return response()->json($html);
      }

    public function storeStock(Request $request)
    {
        $request->validate([
            "branch_id" => "required",
            "warehouse_id" => "required",
            "product_id" => "required|unique:stocks",
            "total_qty" => "required",
            "description" => "required",
        ]);

        Stock::create([
            "branch_id" => $request->branch_id,
            "warehouse_id" => $request->warehouse_id,
            "product_id" => $request->product_id,
            "total_qty" => $request->total_qty,
            "description" => $request->description,
        ]);
        return redirect()->route('admin.manage.stock')->with('message', 'Stock added succefully');
    }
    public function editStock($id)
    {
        $stock = Stock::find($id);
        return view('product_setup.stock.edit', compact('stock'));
    }
    public function updateStock(Request $request, $id)
    {
        $stock = Stock::find($id);
        $stock->update([
            "total_qty" => $request->total_qty,
        ]);
        return redirect()->route('admin.manage.stock')->with('message', 'Stock updated');
    }
    public function deleteStock($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return redirect()->route('admin.manage.stock')->with('error', 'Stock deleted');
    }
}
