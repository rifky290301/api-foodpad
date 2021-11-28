<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function index()
    {
        $steps = Step::latest()->get();
        return response()->json([
            'steps' => $steps
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'step' => 'required',
            'recipe_id' => 'required',
        ]);

        $step = new Step();

        $step->step = $request->step;
        $step->recipe_id = $request->recipe_id;

        if ($step->save()) {
            return response()->json(["message" => 'Kategori berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Kategori gagal disimpan'], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'step' => 'required',
            'recipe_id' => 'required',
        ]);

        $step = Step::findOrFail($id);

        $step->step = $request->step;
        $step->recipe_id = $request->recipe_id;

        if ($step->save()) {
            return response()->json(["message" => 'Kategori berhasil diubah'], 200);
        }
        return response()->json(["message" => 'Kategori gagal diubah'], 400);
    }

    public function delete($id)
    {
        $step = Step::findOrFail($id);
        if ($step->delete()) {
            return response()->json(["message" => 'Kategori berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Kategori gagal dihapus'], 400);
    }


    // !-----------------------------------------------
    public function storee(Request $request)
    {
        $this->validate($request, [
            'step' => 'required',
            'recipe_id' => 'required',
        ]);

        $step = new Step();

        $step->step = $request->step;
        $step->recipe_id = $request->recipe_id;
        $step->save();
        return redirect('/step');
    }
    public function deletee($id)
    {
        $recipe = Step::findOrFail($id);
        $recipe->delete();
        return redirect('/step');
    }
}
