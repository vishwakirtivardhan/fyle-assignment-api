<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
 
use Illuminate\Support\Facades\DB;
use App\Models\branche;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\Cache;
class branchcontroller extends Controller
{
   
     function details(Request $res){

         echo $city= $res->city;
//die();
        //return DB::select("SELECT ifsc,bank_id,branch,city,district FROM branches where city=$city ");
        //return  DB::select("SELECT * FROM branches where city=$city ");
         
      return $data=Cache::remember('databank',15, function() use($city){
        return DB::table('branches')->where('city', $city)->get();
         
       });
     }

     function branchdetails(Request $res){

        $bank_id= $res->bank_id;
//die();
       //return DB::select("SELECT ifsc,bank_id,branch,city,district FROM branches where city=$city ");
       //return  DB::select("SELECT * FROM branches where city=$city ");
      

      return $branchdata=Cache::remember('branchdetails',15, function() use($bank_id){
        return DB::table('branches')->select('city')->where('bank_id', $bank_id)->groupBy('city')->
        get();   
       });


    }

    function bankbranchdetails(Request $res){

        $city= $res->city;
        $bank_id=$res->bank_id;
//die();
        //return DB::select("SELECT ifsc,bank_id,branch,city,district FROM branches where city=$city ");
        //return  DB::select("SELECT * FROM branches where city=$city ");
       return DB::table('branches')->where('city', $city )->where('bank_id', $bank_id)->get();

       
      return $bankbranchdata=Cache::remember('bankbranchdetails',15, function() use($city,$bank_id){
        return DB::table('branches')->select('city')->where('bank_id', $bank_id)->groupBy('city')->
        get();   
       });
        

    }
}
