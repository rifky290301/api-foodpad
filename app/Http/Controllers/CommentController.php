<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::latest()->get();
        return response()->json([
            'comment' => $comment
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'recipe_id' => 'required',
            'user_id' => 'required',
        ]);

        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->recipe_id = $request->recipe_id;
        $comment->user_id = $request->user_id;

        if ($comment->save()) {
            return response()->json(["message" => 'Comment berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Comment gagal disimpan'], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);
        $comment = Comment::findOrFail($id);
        $comment->comment = $request->comment;

        if ($comment->save()) {
            return response()->json(["message" => 'Comment berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Comment gagal disimpan'], 400);
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->delete()) {
            return response()->json(["message" => 'Comment berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'Comment gagal dihapus'], 400);
    }
}
