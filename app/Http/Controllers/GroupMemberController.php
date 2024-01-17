<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupMemberController extends Controller
{
    public function index()
    {
        $groupMembers = DB::select('SELECT * FROM bu_group_members');
        return response()->json($groupMembers);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO bu_group_members (group_id, member_id) VALUES (?, ?)', [$data['group_id'], $data['member_id']]);
        return response()->json(['message' => 'Group member created successfully']);
    }

    public function show($id)
    {
        $groupMember = DB::select('SELECT * FROM bu_group_members WHERE id = ?', [$id]);
        return response()->json($groupMember);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        DB::update('UPDATE bu_group_members SET group_id = ?, member_id = ? WHERE id = ?', [$data['group_id'], $data['member_id'], $id]);
        return response()->json(['message' => 'Group member updated successfully']);
    }

    public function companywise($id)
    {
        $status = DB::select('SELECT * FROM bu_group_members WHERE group_id = ?', [$id]);
        return response()->json($status);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM bu_group_members WHERE id = ?', [$id]);
        return response()->json(['message' => 'Group member deleted successfully']);
    }
    public function destroygroup($id)
    {
        DB::delete('DELETE FROM bu_group_members WHERE group_id = ?', [$id]);
        return response()->json(['message' => 'Group members deleted successfully']);
    }
}

