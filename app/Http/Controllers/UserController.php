<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return response()->json([
            'users' => $users
        ], 200);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return response()->json(["message" => 'User berhasil dihapus'], 200);
        }
        return response()->json(["message" => 'User gagal dihapus'], 400);
    }

    public function photoProfile($image)
    {
        try {
            $path = public_path("upload/profile/" . $image);
            return response()->file($path);
        } catch (\Exception $e) {
            return response()->json(["message" => 'Foto profil tidak ditemukan'], 400);
        }
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->file('photo')) {
            $path = public_path("upload/profile/") . $user->photo;
            try {
                unlink($path);
            } catch (\Throwable $th) {
            } finally {
                $date = date('H-i-s');
                $random = \Str::random(5);
                $request->file('photo')->move('upload/profile', $date . $random . $request->file('photo')->getClientOriginalName());
                $user->photo = $date . $random . $request->file('photo')->getClientOriginalName();
            }
        }

        if ($user->save()) {
            return response()->json(["message" => 'User berhasil update'], 200);
        }
        return response()->json(["message" => 'User gagal update'], 400);
    }

    // !-------------------------------------------------------------
    public function storee(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->file('photo')) {
            $path = public_path("upload/profile/") . $user->photo;
            try {
                unlink($path);
            } catch (\Throwable $th) {
            } finally {
                $date = date('H-i-s');
                $random = \Str::random(5);
                $request->file('photo')->move('upload/profile', $date . $random . $request->file('photo')->getClientOriginalName());
                $user->photo = $date . $random . $request->file('photo')->getClientOriginalName();
            }
        }

        $user->password = app('hash')->make($request->password);
        $user->save();

        return redirect('/user');
    }

    public function deletee($id)
    {
        $recipe = User::findOrFail($id);
        $recipe->delete();
        return redirect('/user');
    }
}
