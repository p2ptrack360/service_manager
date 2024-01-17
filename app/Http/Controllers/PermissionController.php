<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = DB::select('SELECT * FROM permissions');
        return response()->json($permissions);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DB::insert('INSERT INTO permissions (title) VALUES (?)',
            [$data['title']]);

        return response()->json(['message' => 'Permission created successfully']);
    }

    public function show($id)
    {
        $permission = DB::select('SELECT * FROM permissions WHERE id = ?', [$id]);
        return response()->json($permission);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::update('UPDATE permissions SET title = ? WHERE id = ?', [$data['title'], $id]);

        return response()->json(['message' => 'Permission updated successfully']);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM permissions WHERE id = ?', [$id]);
        return response()->json(['message' => 'Permission deleted successfully']);
    }
}

