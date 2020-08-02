<?php
use Illuminate\Support\Facades\DB;

function status_options(){
    $status = DB::table('status')->pluck('status','id');
    return $status;
}

function date_to_db($d){
    $d = explode('/',$d);
    $d =  $d[2].'-'.$d[1].'-'.$d[0];
    return $d;
    
}

function date_to_input($d){
    $d= explode(' ',$d);
    $d = explode('-',$d[0]);
    $d = $d[2].'/'.$d[1].'/'.$d[0];
    return $d;
}