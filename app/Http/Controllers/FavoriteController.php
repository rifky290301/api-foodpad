<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index($id)
    {
        $favorite = Favorite::with("recipe")->where("user_id", $id)->latest()->get();
        return response()->json([
            'favorite' => $favorite
        ], 200);
    }

    public function favoriteUser()
    {
        $id = auth()->user()->id;
        $favorite = Favorite::with("recipe")->where("user_id", $id)->latest()->get();
        return response()->json([
            'favorite' => $favorite
        ], 200);
    }

    public function show($idRecipe, $idUser)
    {
        $favorite = Favorite::with("recipe")->where("user_id", $idUser)->where("recipe_id", $idRecipe)->latest()->get();
        if (count($favorite)) {
            return response()->json([
                'favorite' => $favorite
            ], 200);
        } else {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'recipe_id' => 'required',
            'user_id' => 'required',
        ]);

        $favorite = new Favorite();

        $favorite->recipe_id = $request->recipe_id;
        $favorite->user_id = $request->user_id;

        if ($favorite->save()) {
            return response()->json(["message" => 'Favorite berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Favorite gagal disimpan'], 400);
    }

    public function delete($id)
    {
        $favorite = Favorite::findOrFail($id);
        if ($favorite->delete()) {
            return response()->json(["message" => 'Favorite berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Favorite gagal dihapus'], 400);
    }
}
