<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\DetailRecipeResource;
use App\Http\Resources\RecipeCategoryResource;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->get();
        return response()->json([
            'recipes' => $recipes
        ], 200);
    }

    public function index2()
    {
        $recipes = Recipe::with(["ratings"])->latest()->get();
        return RecipeResource::collection($recipes);
    }

    public function show($id)
    {
        $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->where('id', $id)->get();
        return response()->json([
            'recipes' => $recipes
        ], 200);
    }

    public function show2($id)
    {
        $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->where('id', $id)->get();
        return DetailRecipeResource::collection($recipes);
    }

    public function trending()
    {
        $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->take(3)->get();
        return response()->json([
            'recipes' => $recipes
        ], 200);
    }

    public function trending2()
    {
        $recipes = Recipe::with(["ratings"])->latest()->get();
        $count = count($recipes);
        for ($i = 0; $i < $count; $i++) {
            $temp = count($recipes[$i]['ratings']);
            $recipes[$i]['jumlah'] = $temp;
        }
        $size = count($recipes) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($recipes[$k]['jumlah'] > $recipes[$j]['jumlah']) {
                    list($recipes[$j], $recipes[$k]) = array($recipes[$k], $recipes[$j]);
                }
            }
        }
        return RecipeResource::collection($recipes);
    }

    public function sementara()
    {
        $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->take(4)->get();
        return response()->json([
            'recipes' => $recipes
        ], 200);
    }

    public function recipeByCategory($category)
    {
        $recipes = DB::table('recipes')
            ->select('*')
            ->join('category_recipes', 'category_recipes.recipe_id', '=', 'recipes.id')
            ->join('categories', 'categories.id', '=', 'category_recipes.category_id')
            ->join('ratings', 'ratings.id', '=', 'recipes.id')
            ->where('categories.category', '=', $category)
            ->get();
        return RecipeCategoryResource::collection($recipes);
    }

    function search($name)
    {

        // $recipes = Recipe::with(["author", "ratings", "steps", "ingredients", "categories"])->where('name', 'LIKE', '%' . $name . '%')->get();
        $recipes = Recipe::with(["ratings"])->where(DB::raw('lower(name)'), 'like', '%' . strtolower($name) . '%')->get();

        if (count($recipes)) {
            return RecipeResource::collection($recipes);
        } else {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
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
            $path = public_path("storage/images/upload/thumbnail/" . $image);
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
        } else {
            $recipe->thumbnail = $request->thumbnail;
        }
        // $date = date('H-i-s');
        // $random = \Str::random(5);
        // $thumbnail = $request->file('thumbnail');
        // $fileName = "{$date}.{$random}.{$thumbnail->extension()}";
        // $thumbnail->storeAs("images/upload/thumbnail", $fileName);

        // $recipe->thumbnail = $fileName;

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
