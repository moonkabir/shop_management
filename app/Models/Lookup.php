<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    use HasFactory;

    public function unit(){
        $unit = Lookup::where('name', 'unit')
               ->orderBy('title')
               ->get();
        if(count($unit) > 0){
            return $unit;
        }else{
            return $unit = [];
        }
    }
    public function status(){
        $status = Lookup::where('name', 'status')
               ->orderBy('title')
               ->get();
        if(count($status) > 0){
            return $status;
        }else{
            return $status = [];
        }
    }
}
