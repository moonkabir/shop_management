<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    function generateProductID(){
        $maxID = product::max("id");
        if($maxID == null){
            $maxID = 1;
        }
        $month = date("m");
        $year = date("y");
        return "P-".$maxID."-".$month."-".$year;
    }
}
