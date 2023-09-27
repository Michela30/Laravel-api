<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    //type(one) ha molti projects
    public function projects() {

        return $this->hasMany(Project::class);
    }
}
