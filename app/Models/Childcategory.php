<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id','subcategory_id');
    }

    public function childcatTrans($locale,$id)
    {
        if($locale == 'bn'){
            $transName = $this->where('id', $id)->first()->bn_name;
        }else{
            $transName = $this->where('id', $id)->first()->childcategoryName;
        }
        return $transName? $transName: $this->childcategoryName;
    }
}
