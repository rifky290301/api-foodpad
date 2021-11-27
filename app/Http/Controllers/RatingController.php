<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $rating = Rating::latest()->get();
        return response()->json([
            'rating' => $rating
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'recipe_id' => 'required',
            'rating' => 'required',
        ]);

        $rating = new Rating();

        $rating->recipe_id = $request->recipe_id;
        $rating->rating = $request->rating;
        $rating->user_id = auth()->user()->id;

        if ($rating->save()) {
            return response()->json(["message" => 'Rating berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Rating gagal disimpan'], 400);
    }

    public function delete($id)
    {
        $rating = Rating::findOrFail($id);
        if ($rating->delete()) {
            return response()->json(["message" => 'Rating berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Rating gagal dihapus'], 400);
    }
}
