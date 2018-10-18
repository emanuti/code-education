<?php

namespace CodeEducation\Http\Controllers;

use \CodeEducation\Http\Requests\CategoryRequest;
use \CodeEducation\Category;

class CategoriesController extends Controller
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $categories = $this->model->all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->model->fill($request->all())->save();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->model->find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->model->find($id)->update($request->except(['_token', '_method']));
        return redirect()->route('category.index');
    }

    public function destroy($id) {
        $this->model->destroy($id);
        return redirect()->route('category.index');
    }
}
