<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return response()->json([
            'category' => $category
        ], 200);
    }
    public function index2()
    {
        $category = Category::latest()->get();
        return CategoryResource::collection($category);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($category->save()) {
            return response()->json(["message" => 'Kategori berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Kategori gagal disimpan'], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;

        if ($category->save()) {
            return response()->json(["message" => 'Kategori berhasil diubah'], 200);
        }
        return response()->json(["message" => 'Kategori gagal diubah'], 400);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            return response()->json(["message" => 'Kategori berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Kategori gagal dihapus'], 400);
    }

    // !-----------------------------------------------------------
    public function storee(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $category = new Category();
        $category->category = $request->category;

        $category->save();
        return redirect('/category');
    }

    public function deletee($id)
    {
        $recipe = Category::findOrFail($id);
        $recipe->delete();
        return redirect('/category');
    }
}
