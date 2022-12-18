<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    use HasFactory;
    public function groupleader(){
        return $this->belongsTo(User::class,'groupleader_id');
    }
}
