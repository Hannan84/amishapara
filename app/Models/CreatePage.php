<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatePage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pageTrans($locale,$id)
    {
        if($locale == 'bn'){
            $transName = $this->where('id', $id)->first()->bn_name;
        }else{
            $transName = $this->where('id', $id)->first()->name;
        }
        return $transName? $transName: $this->name;
    }
}
