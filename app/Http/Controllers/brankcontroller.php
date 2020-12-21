<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use App\Models\bank;


class brankcontroller extends Controller
{
    
    function details(Request $res){

        $name = $res->bankname;

       //return DB::select("SELECT ifsc,bank_id,branch,city,district FROM branches where city=$city ");
      return  DB::select("SELECT * FROM banks where name Like  '%{$name}%' ORDER BY id ASC limit 4 ");
      //return DB::table('banks')->where('name','LIKE','%{$name}%')->get();
    }

    
}
