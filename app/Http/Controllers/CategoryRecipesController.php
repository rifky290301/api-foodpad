<?php

namespace App\Http\Controllers;

use App\Models\CategoryRecipes;
use Illuminate\Http\Request;

class CategoryRecipesController extends Controller
{
    public function index()
    {
        $category = CategoryRecipes::latest()->get();
        return response()->json([
            'categories' => $category
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'recipe_id' => 'required',
            'category_id' => 'required',
        ]);

        $category = new CategoryRecipes();

        $category->recipe_id = $request->recipe_id;
        $category->category_id = $request->category_id;

        if ($category->save()) {
            return response()->json(["message" => 'Kategori berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Kategori gagal disimpan'], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'recipe_id' => 'required',
            'category_id' => 'required',
        ]);

        $category = CategoryRecipes::findOrFail($id);

        $category->recipe_id = $request->recipe_id;
        $category->category_id = $request->category_id;

        if ($category->save()) {
            return response()->json(["message" => 'Kategori berhasil diubah'], 200);
        }
        return response()->json(["message" => 'Kategori gagal diubah'], 400);
    }

    public function delete($id)
    {
        $category = CategoryRecipes::findOrFail($id);
        if ($category->delete()) {
            return response()->json(["message" => 'Kategori berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Kategori gagal dihapus'], 400);
    }

    // !------------------------------------------------
    public function storee(Request $request)
    {
        $this->validate($request, [
            'recipe_id' => 'required',
            'category_id' => 'required',
        ]);

        $category = new CategoryRecipes();

        $category->recipe_id = $request->recipe_id;
        $category->category_id = $request->category_id;

        $category->save();
        return redirect('/category-recipe');
    }

    public function deletee($id)
    {
        $recipe = CategoryRecipes::findOrFail($id);
        $recipe->delete();
        return redirect('/category-recipe');
    }
}
