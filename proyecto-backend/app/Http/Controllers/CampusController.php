<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampusController extends Controller
{
    public function index(){
        $machine = Campus::all();
        return response()->json($machine);
    }
    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|in:habilitado,deshabilitado',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $machine = Campus::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => "Campus registrado correctamente",
            'maquina' => $machine,
        ]);
    }
}