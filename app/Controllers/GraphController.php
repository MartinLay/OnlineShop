<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GraphController extends BaseController
{
    public function index()
    {
        return view('index');
    }
    public function showGraph() { 
        $db = \Config\Database::connect();
        $builder = $db->table('tb_transaction'); 
        $query = $builder->select("COUNT(id) as count, amount as s, MONTHNAME(created_date) as month");
        $query = $builder->orderBy("s ASC, month ASC");
        $query = $builder->where("MONTH(created_date) GROUP BY MONTHNAME(created_date), s")->get();
        $record = $query->getResult();

        $usersData = [];

        foreach($record as $row) {
            $usersData[] = array(
                'month'   => $row->month,
                'amount' => floatval($row->s)
            );
        }
        
        $data['usersData'] = ($usersData);    
        return view('v_graph', $data);                
    }
}
