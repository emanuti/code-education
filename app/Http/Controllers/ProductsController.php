<?php

namespace CodeEducation\Http\Controllers;

use Illuminate\Http\Request;
use CodeEducation\Http\Requests\ProductRequest;
use CodeEducation\Http\Requests\ProductImageRequest;
use CodeEducation\Product;
use CodeEducation\Category;
use CodeEducation\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    private $model;
    private $productImageModel;

    public function __construct(Product $product, ProductImage $productImageModel)
    {
        $this->model = $product;
        $this->productImageModel = $productImageModel;
    }

    public function index()
    {
        $products = $this->model->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->model->fill($request->all())->save();
        return redirect()->route('product.index');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->all();
        $product = $this->model->find($id);
        return view('products.edit', compact('product', 'categories'));
    }

    public function update($id, ProductRequest $request)
    {
        $this->model->find($id)->fill($request->all())->save();
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->model->destroy($id);
        return redirect()->route('product.index');
    }

    public function indexImages($id)
    {
        $product = $this->model->find($id);
        return view('products.images.index', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->model->find($id);
        return view('products.images.create', compact('product'));
    }

    public function storeImage($id, ProductImageRequest $request)
    {
        $file       = $request->file('product_image');
        $extension  = $file->getClientOriginalExtension();

        $productImage = $this->productImageModel::create([
            'product_id' => $id,
            'extension'  => $extension
        ]);
            
        Storage::disk('local_public')->put($productImage->id. '.' .$extension, File::get($file));

        return redirect()->route('product.images.index', compact('id'));
    }

    public function destroyImage($id)
    {
        $productImage = $this->productImageModel->find($id);

        if(file_exists(public_path() . '/uploads/' . $productImage->id . '.'.$productImage->extension)){
            Storage::disk('local_public')->delete($productImage->id . '.' . $productImage->extension);
        }

        $product = $productImage->product;
        $productImage->delete();

        return redirect()->route('product.images.index', ['id' => $product->id]);
    }
}
