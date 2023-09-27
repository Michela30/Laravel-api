<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//model
use App\Models\Technology;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'creation_date',
        'url',
        'thumb',
        'description',
        'type_id',
        'is_online'
    ];

    //project(many) appartiene a type
    public function type() {

        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
