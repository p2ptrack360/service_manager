<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomainController extends Controller
{
    public function index()
    {
        $domains = DB::select('SELECT * FROM domains');
        return response()->json($domains);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DB::insert('INSERT INTO domains (title, status) VALUES (?, ?)',
            [$data['title'], $data['status']]);

        return response()->json(['message' => 'Domain created successfully']);
    }

    public function show($id)
    {
        $domain = DB::select('SELECT * FROM domains WHERE id = ?', [$id]);
        return response()->json($domain);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::update('UPDATE domains SET title = ?, status = ? WHERE id = ?', [$data['title'], $data['status'], $id]);

        return response()->json(['message' => 'Domain updated successfully']);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM domains WHERE id = ?', [$id]);
        return response()->json(['message' => 'Domain deleted successfully']);
    }
}

