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

    public function show($id)
    {
        $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->where('id', $id)->get();
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
        $recipe->description = $request->description;
        $recipe->prepare = $request->prepare;
        $recipe->duration = $request->duration;
        $recipe->level = $request->level;
        $recipe->user_id = $request->user_id;

        if ($request->file('thumbnail')) {
            $path = public_path("upload/profile/") . $recipe->thumbnail;
            try {
                unlink($path);
            } catch (\Throwable $th) {
            } finally {
                $date = date('H-i-s');
                $random = \Str::random(5);
                $request->file('thumbnail')->move('upload/thumbnail', $date . $random . $request->file('thumbnail')->getClientOriginalName());
                $recipe->thumbnail = $date . $random . $request->file('thumbnail')->getClientOriginalName();
            }
        }

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
        $recipe->description = $request->description;
        $recipe->prepare = $request->prepare;
        $recipe->duration = $request->duration;
        $recipe->level = $request->level;
        $recipe->user_id = $request->user_id;

        if ($request->file('thumbnail')) {
            $path = public_path("upload/thumbnail/") . $recipe->thumbnail;
            try {
                unlink($path);
            } catch (\Throwable $th) {
            } finally {
                $date = date('H-i-s');
                $random = \Str::random(5);
                $request->file('thumbnail')->move('upload/thumbnail', $date . $random . $request->file('thumbnail')->getClientOriginalName());
                $recipe->thumbnail = $date . $random . $request->file('thumbnail')->getClientOriginalName();
            }
        }

        if ($recipe->save()) {
            return response()->json(["message" => 'Resep berhasil diubah'], 200);
        }
        return response()->json(["message" => 'Resep gagal diubah'], 400);
    }

    public function delete($id)
    {
        $recipe = Recipe::findOrFail($id);
        $path = public_path("upload/thumbnail/") . $recipe->thumbnail;
        try {
            unlink($path);
        } catch (\Throwable $th) {
        } finally {
            if ($recipe->delete()) {
                return response()->json(["message" => 'Resep berhasil dihapus'], 200);
            }
            return response()->json(["message" => 'Resep gagal dihapus'], 400);
        }
    }

    public function thumbnailImage($image)
    {
        try {
            $path = public_path("upload/thumbnail/" . $image);
            return response()->file($path);
        } catch (\Exception $e) {
            return response()->json(["message" => 'Thumbnail tidak ditemukan'], 400);
        }
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
        $recipe->description = $request->description;
        $recipe->prepare = $request->prepare;
        $recipe->duration = $request->duration;
        $recipe->level = $request->level;
        $recipe->user_id = $request->user_id;
        if ($request->file('thumbnail')) {
            $path = public_path("upload/thumbnail/") . $recipe->thumbnail;
            try {
                unlink($path);
            } catch (\Throwable $th) {
            } finally {
                $date = date('H-i-s');
                $random = \Str::random(5);
                $request->file('thumbnail')->move('upload/thumbnail', $date . $random . $request->file('thumbnail')->getClientOriginalName());
                $recipe->thumbnail = $date . $random . $request->file('thumbnail')->getClientOriginalName();
            }
        }

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
