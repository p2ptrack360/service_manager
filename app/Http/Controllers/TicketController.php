<?php
namespace App\Http\Controllers;

use App\Notifications\TicketCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = DB::select('SELECT * FROM vw_tickets');
        return response()->json($tickets);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $ticket_id= 0;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('documents','public');
        } else {
            $profilePath = null;
        }

        DB::insert('INSERT INTO tickets (title, description, completed_date, due_date, company_id, completed_by, business_unit_id,customer_id, vendor_id, vendor_type_id, reported_by, assigned_to, mode_of_complaint, sub_type_id, priority_id, impact_id, status_id, store_contact, created_by, email_status,file) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)',
            [$data['title'], $data['description'], $data['completed_date'], $data['due_date'], $data['company_id'], $data['completed_by'], $data['business_unit_id'],$data['customer_id'], $data['vendor_id'], $data['vendor_type_id'], $data['reported_by'], $data['assigned_to'], $data['mode_of_complaint'], $data['sub_type_id'], $data['priority_id'], $data['impact_id'], $data['status_id'], $data['store_contact'], $data['created_by'], $data['email_status'], $profilePath]);
            $data['created_at'] = now();

        if($data['assigned_type']=='Individual'){
            $insertedId = DB::getPdo()->lastInsertId();
            $ticket = DB::insert('INSERT INTO ticket_assigned_to (ticket_id, user_id, group_id, type) VALUES (?, ?, ?, ?)',
            [$insertedId, $data['assigned_to'], '0', 'Individual']);
            $ticket_id = $insertedId;
        }
        else
        {
            $insertedId = DB::getPdo()->lastInsertId();
            DB::insert('INSERT INTO ticket_assigned_to (ticket_id, user_id, group_id, type) VALUES (?, ?, ?, ?)',
            [$insertedId, '0',$data['assigned_to'], 'Group']);
            $ticket_id = $insertedId;
        }
        // DB::insert('INSERT INTO `notifications`(`type`, `data`, `company_id`, `created_at`, `created_by`)VALUES (?,?,?,?,?)', ['Ticket',$data['title'].' Ticket has been Created',$data['company_id'],$data['created_at'],$data['created_by']]);
         return response()->json(['message' => 'Ticket created successfully','id'=>$ticket_id]);
    }

    public function show($id)
    {
        $ticket = DB::select('SELECT * FROM vw_tickets WHERE id = ?', [$id]);
        return response()->json($ticket);
    }
    public function bu_fields($id)
    {
        $ticket = DB::select('SELECT * FROM `bu_fields` WHERE bu_id=?', [$id]);
        return response()->json($ticket);
    }

    public function companywise($id)
    {
        $tickets = DB::select('SELECT * FROM vw_tickets WHERE company_id = ?', [$id]);
        return response()->json($tickets);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::update('UPDATE tickets SET title = ?, description = ?, completed_date = ?, due_date = ?, company_id = ?, completed_by = ?, business_unit_id = ?,customer_id=?, vendor_id = ?, vendor_type_id = ?, reported_by = ?, assigned_to = ?, mode_of_complaint = ?, sub_type_id = ?, priority_id = ?, impact_id = ?, status_id = ?, store_contact = ?, created_by = ?, email_status = ? WHERE id = ?',
            [$data['title'], $data['description'], $data['completed_date'], $data['due_date'], $data['company_id'], $data['completed_by'], $data['business_unit_id'],$data['customer_id'], $data['vendor_id'], $data['vendor_type_id'], $data['reported_by'], $data['assigned_to'], $data['mode_of_complaint'], $data['sub_type_id'], $data['priority_id'], $data['impact_id'], $data['status_id'], $data['store_contact'], $data['created_by'], $data['email_status'], $id]);

        return response()->json(['message' => 'Ticket updated successfully']);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM tickets WHERE id = ?', [$id]);
        return response()->json(['message' => 'Ticket deleted successfully']);
    }


    public function saveactivity(Request $request)
    {
        $data = $request->all();

        DB::insert('INSERT INTO `ticket_activity`(`remarks`,`ticket_id`, `created_by`)  VALUES ( ?, ?, ?)',
            [$data['remarks'], $data['ticket_id'], $data['created_by']]);

        return response()->json(['message' => 'Ticket created successfully']);
    }

    public function updatevendor(Request $request, $id)
    {
        $data = $request->all();

        DB::update('UPDATE tickets SET vendor_id = ? WHERE id = ?',
            [$data['vendor_id'], $id]);

        return response()->json(['message' => 'Vendor updated successfully']);
    }

    public function saveqoutations(Request $request)
    {
        $data = $request->all();

        DB::insert('INSERT INTO `qoutations`(`company_id`,`ticket_id`, `vendor_id`,`amount`,`description`,`created_at`)  VALUES ( ?, ?, ?,?,?,?)',
            [$data['company_id'], $data['ticket_id'], $data['vendor_id'],$data['amount'],$data['remarks'],$data['created_at']]);

        return response()->json(['message' => 'Qutation created successfully']);
    }
    public function showQuotation($id)
    {
        $ticket = DB::select('SELECT * FROM `vw_quote` WHERE ticket_id = ?', [$id]);
        return response()->json($ticket);
    }
    public function updateqoutations(Request $request, $id)
    {
        $data = $request->all();

        DB::update('UPDATE qoutations SET approved_amount = ?, actual_amount = ? WHERE id = ?',
            [$data['approved_amount'], $data['actual_amount'], $id]);

        return response()->json(['message' => 'Amount updated successfully']);
    }


}
