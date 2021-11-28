<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function index()
    {
        $ingredients = Ingredients::latest()->get();
        return response()->json([
            'ingredients' => $ingredients
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
            'recipe_id' => 'required',
        ]);

        $ingredient = new Ingredients();

        $ingredient->name = $request->name;
        $ingredient->value = $request->value;
        $ingredient->recipe_id = $request->recipe_id;

        if ($ingredient->save()) {
            return response()->json(["message" => 'Bahan berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Bahan gagal disimpan'], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
            'recipe_id' => 'required',
        ]);

        $ingredient = Ingredients::findOrFail($id);

        $ingredient->name = $request->name;
        $ingredient->value = $request->value;
        $ingredient->recipe_id = $request->recipe_id;

        if ($ingredient->save()) {
            return response()->json(["message" => 'Bahan berhasil diubah'], 200);
        }
        return response()->json(["message" => 'Bahan gagal diubah'], 400);
    }

    public function delete($id)
    {
        $ingredient = Ingredients::findOrFail($id);
        if ($ingredient->delete()) {
            return response()->json(["message" => 'Bahan berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Bahan gagal dihapus'], 400);
    }

    // !--------------------------------------------------

    public function storee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
            'recipe_id' => 'required',
        ]);

        $ingredient = new Ingredients();

        $ingredient->name = $request->name;
        $ingredient->value = $request->value;
        $ingredient->recipe_id = $request->recipe_id;

        $ingredient->save();
        return redirect('/ingredients');
    }

    public function deletee($id)
    {
        $recipe = Ingredients::findOrFail($id);
        $recipe->delete();
        return redirect('/ingredients');
    }
}
