<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->latest()->get();
        return response()->json([
            'recipes' => $recipes
        ], 200);
    }

    // public function trending()
    // {
    //     $recipes = Recipe::with("ratings")->latest()->get();
    //     $result = [];
    //     foreach ($recipes as $recipe) {
    //         $temp = $recipe->rating;
    //         $lengt = sizeof($temp);

    //     }
    //     return response()->json([
    //         'recipes' => $recipes
    //     ], 200);
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'duration' => 'required',
            'level' => 'required',
        ]);

        $recipe = new Recipe();

        $recipe->name = $request->name;
        $recipe->thumbnail = $request->thumbnail;
        $recipe->description = $request->description;
        $recipe->prepare = $request->prepare;
        $recipe->duration = $request->duration;
        $recipe->level = $request->level;
        $recipe->user_id = $request->user_id;

        if ($recipe->save()) {
            return response()->json(["message" => 'Resep berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Resep gagal disimpan'], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'duration' => 'required',
            'level' => 'required',
        ]);

        $recipe = Recipe::findOrFail($id);

        $recipe->name = $request->name;
        $recipe->thumbnail = $request->thumbnail;
        $recipe->description = $request->description;
        $recipe->prepare = $request->prepare;
        $recipe->duration = $request->duration;
        $recipe->level = $request->level;
        $recipe->user_id = $request->user_id;

        if ($recipe->save()) {
            return response()->json(["message" => 'Resep berhasil diubah'], 200);
        }
        return response()->json(["message" => 'Resep gagal diubah'], 400);
    }

    public function delete($id)
    {
        $recipe = Recipe::findOrFail($id);
        if ($recipe->delete()) {
            return response()->json(["message" => 'Resep berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Resep gagal dihapus'], 400);
    }


    // !--------------------------------------------------------------


    public function storee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'duration' => 'required',
            'level' => 'required',
        ]);

        $recipe = new Recipe();

        $recipe->name = $request->name;
        $recipe->thumbnail = $request->thumbnail;
        $recipe->description = $request->description;
        $recipe->prepare = $request->prepare;
        $recipe->duration = $request->duration;
        $recipe->level = $request->level;
        $recipe->user_id = $request->user_id;
        $recipe->save();
        return redirect('/');
    }

    public function deletee($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect('/');
    }
}
