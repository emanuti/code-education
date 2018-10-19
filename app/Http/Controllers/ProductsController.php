<?php

namespace CodeEducation\Http\Controllers;

use CodeEducation\Http\Requests\ProductRequest;
use CodeEducation\Product;
use CodeEducation\Category;

class ProductsController extends Controller
{
    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
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
}
