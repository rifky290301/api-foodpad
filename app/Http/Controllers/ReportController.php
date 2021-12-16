<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $report = Report::latest()->get();
        return response()->json([
            'report' => $report
        ], 200);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'report' => 'required',
            'user_id' => 'required',
            'recipe_id' => 'required',
        ]);

        $report = new Report();

        $report->report = $request->report;
        $report->user_id = $request->user_id;
        $report->recipe_id = $request->recipe_id;

        if ($report->save()) {
            return response()->json(["message" => 'Report berhasil disimpan'], 200);
        }
        return response()->json(["message" => 'Report gagal disimpan'], 400);
    }

    public function show($idRecipe, $idUser)
    {
        $report = Report::where("user_id", $idUser)->where("recipe_id", $idRecipe)->latest()->get();
        if (count($report)) {
            return response()->json([
                'report' => $report
            ], 200);
        } else {
            return response()->json(['Result' => 'Data not found'], 404);
        }
    }
}
