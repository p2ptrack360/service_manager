<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index($c_id,$group,$bu_id,$user_id)
    {

        if($group == 'Manager')
        {

            $bu_ids = DB::select("SELECT GROUP_CONCAT(id SEPARATOR ', ') as ids FROM `business_units` where parent_bu_id = ?", [$bu_id]);
            if($bu_ids[0]->ids == null)
            {
                $all_bus = $bu_id;
            }
            else
            {
                $all_bus = $bu_ids[0]->ids.', '.$bu_id;
            }

            $length = Str::length($all_bus);

            // echo $all_bus;
            // echo "SELECT * FROM `vw_tickets` where company_id = ".$c_id." and business_unit_id IN (".$all_bus.");";
            $total_tickets = DB::select("SELECT * FROM `vw_tickets` where company_id = ".$c_id." and business_unit_id IN (".$all_bus.");");
            return response()->json($total_tickets);
        }
        else
        {
            $total_tickets = DB::select("SELECT * FROM `vw_tickets` where company_id = ? and business_unit_id = ? and (created_by = ? or assigned_to = ?)", [$c_id,$bu_id,$user_id,$user_id]);
            return response()->json($total_tickets);
        }

    }

    public function get_customers_wise_t($c_id,$bu_id,$cus_id){
        $total_tickets = DB::select("SELECT * FROM `vw_tickets` WHERE company_id=? and business_unit_id =? and cus_id =?", [$c_id,$bu_id,$cus_id]);
        return response()->json($total_tickets);
    }
    public function get_customers($c_id){
        $total_tickets = DB::select("SELECT * FROM `customers` WHERE bu_id=?", [$c_id]);
        return response()->json($total_tickets);
    }

    public function company_wise_dashboard($c_id){
        $total_tickets = DB::select("SELECT * FROM `vw_tickets` where company_id = ?", [$c_id]);
        return response()->json($total_tickets);
    }
    public function created_by_t($u_id){
        $total_tickets = DB::select("SELECT * FROM `vw_tickets` WHERE reported_by = ?", [$u_id]);
        return response()->json($total_tickets);
    }
    public function assign_to_me($u_id){
        $total_tickets = DB::select("SELECT * FROM `vw_tickets` WHERE assigned_to =?", [$u_id]);
        return response()->json($total_tickets);
    }


    public function super_admin_tickets(){
        $total_tickets = DB::select("SELECT * FROM `vw_tickets`");
        return response()->json($total_tickets);

    }
    public function buwise_records($c_id,$bu_id){
        $total_tickets=DB::select('SELECT * FROM `vw_tickets` WHERE company_id =? AND business_unit_id =?', [$c_id,$bu_id]);
        return response()->json($total_tickets);
    }

    public function totaltickets($c_id, $from, $to)
    {

        $total_tickets = DB::select("SELECT count(*) as total_tickets FROM `vw_tickets` where company_id = ? and created_at>=? and created_at <=?;", [$c_id, $from, $to]);
        return response()->json($total_tickets);
    }

    public function pendingtickets($c_id, $from, $to)
    {

        $pending_tickets = DB::select("SELECT count(*) as pending_tickets FROM `vw_tickets` where company_id = ? and status_title = 'Open' and created_at>=? and created_at <=?;", [$c_id, $from, $to]);
        return response()->json($pending_tickets);
    }
    public function inprogresstickets($c_id, $from, $to)
    {

        $inprogress_tickets = DB::select("SELECT count(*) as inprogress FROM `vw_tickets` where company_id = ? and status_title = 'In Progress' and created_at>=? and created_at <=?;", [$c_id, $from, $to]);
        return response()->json($inprogress_tickets);
    }

    public function closedtickets($c_id, $from, $to)
    {

        $inprogress_tickets = DB::select("SELECT count(*) as closed FROM `vw_tickets` where company_id = ? and status_title = 'Closed' and created_at>=? and created_at <=?;", [$c_id, $from, $to]);
        return response()->json($inprogress_tickets);
    }
    public function alltickets($c_id, $from, $to)
    {

        $alltickets = DB::select("SELECT *  FROM `vw_tickets` where company_id = ?  and created_at>=? and created_at <=?;", [$c_id, $from, $to]);
        return response()->json($alltickets);
    }
    public function impactgraph($c_id, $from, $to)
    {

        $impactgraph = DB::select("SELECT count(*) as ticket,impact_title FROM `vw_tickets` where company_id = ? and created_at >= ? and created_at <= ? group by impact_id;", [$c_id, $from, $to]);
        return response()->json($impactgraph);
    }
    public function priority_graph($c_id, $from, $to)
    {

        $priority_graph = DB::select("SELECT count(*) as ticket,priority_title FROM `vw_tickets` where company_id = ? and created_at >= ? and created_at <= ? group by priority_id;", [$c_id, $from, $to]);
        return response()->json($priority_graph);
    }
    public function yearly_graph($c_id)
    {

        $yearly_graph = DB::select("SELECT `months`.`Month` AS `Month`, COALESCE(COUNT(tickets.created_at), 0) AS `TicketCount` FROM ( SELECT 1 AS `Month` UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12 ) AS Months LEFT JOIN vw_tickets tickets ON MONTH(tickets.created_at) = Months.`Month` AND YEAR(tickets.created_at) = YEAR(CURDATE()) AND tickets.company_id = ? GROUP BY Months.`Month` ORDER BY Months.`Month`;", [$c_id]);
        return response()->json($yearly_graph);
    }

    public function notifyemail($id, $tid)
    {

        $response1 = DB::select("SELECT * FROM `vw_tickets` WHERE `id` =?;", [$tid]);
        $response  = DB::select("SELECT * FROM `users` WHERE `id`  =?;", [$id]);
        echo $response1[0]->id;
        echo $response1[0]->title;
        echo $response1[0]->description;
        echo $response1[0]->due_date;
        echo $response1[0]->completed_date;
        echo $response1[0]->completed_by;
        echo $response1[0]->created_at;
        echo $response1[0]->reported_by_name;
        echo $response1[0]->bu_name;
        echo $response1[0]->status_title;


        $user_email = $response[0]->about;


        $data = [
            'name' => $response1[0]->title,
            'description' => $response1[0]->description,
            'due_date' => $response1[0]->due_date,
            'completed_by' => $response1[0]->completed_by,
            'created_at' => $response1[0]->created_at,
            'reported_by' => $response1[0]->reported_by_name,
            'bu_name' => $response1[0]->bu_name,
            'status_title' => $response1[0]->status_title,
            'resolved_name' => $response1[0]->resolved_name,
            'ticket_id' => $response1[0]->id

        ];

        $mailContent = view('mail', $data)->render();
        //abdulsamadq67@gmail.com
        Mail::send([], [], function ($message) use ($mailContent,$user_email) {
            $message->to($user_email, 'Service Manager')
                ->subject('Here are your login credentials for your Account')
                ->setBody($mailContent, 'text/html');
        });
        return  response()->json($response1);
    }

    public function weekly_graph_inprogress($c_id)
    {

        $yearly_graph = DB::select("SELECT
        DAYNAME(week_dates.`Date`) AS `Day`,
        COALESCE(COUNT(tickets.id), 0) AS `TicketCount`
    FROM (
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 1) DAY AS `Date`
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 2) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 3) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 4) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 5) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 6) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 7) DAY
    ) AS week_dates
    LEFT JOIN vw_tickets AS tickets ON DATE(tickets.created_at) = week_dates.`Date`
                    AND YEAR(tickets.created_at) = YEAR(CURDATE())
                    AND tickets.status_title = 'In Progress'
    GROUP BY week_dates.`Date`
    ORDER BY week_dates.`Date`;", [$c_id]);
        return response()->json($yearly_graph);
    }


    public function weekly_graph_open($c_id)
    {

        $yearly_graph = DB::select("SELECT
        DAYNAME(week_dates.`Date`) AS `Day`,
        COALESCE(COUNT(tickets.id), 0) AS `TicketCount`
    FROM (
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 1) DAY AS `Date`
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 2) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 3) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 4) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 5) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 6) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 7) DAY
    ) AS week_dates
    LEFT JOIN vw_tickets AS tickets ON DATE(tickets.created_at) = week_dates.`Date`
                    AND YEAR(tickets.created_at) = YEAR(CURDATE())
                    AND tickets.status_title = 'Open'
    GROUP BY week_dates.`Date`
    ORDER BY week_dates.`Date`;", [$c_id]);
        return response()->json($yearly_graph);
    }

    public function weekly_graph_completed($c_id)
    {

        $yearly_graph = DB::select("SELECT
        DAYNAME(week_dates.`Date`) AS `Day`,
        COALESCE(COUNT(tickets.id), 0) AS `TicketCount`
    FROM (
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 1) DAY AS `Date`
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 2) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 3) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 4) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 5) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 6) DAY
        UNION ALL
        SELECT CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 7) DAY
    ) AS week_dates
    LEFT JOIN vw_tickets AS tickets ON DATE(tickets.created_at) = week_dates.`Date`
                    AND YEAR(tickets.created_at) = YEAR(CURDATE())
                    AND tickets.status_title = 'Completed'
    GROUP BY week_dates.`Date`
    ORDER BY week_dates.`Date`;", [$c_id]);
        return response()->json($yearly_graph);
    }
}
