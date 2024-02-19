<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['slug', 'post_image'];

    //in a one to many or one to one, 
    //the single column that connects to many must always
    //have a function with the name spelled in the singular

    public function type()
    {

        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {

        return $this->belongsToMany(Technology::class);
    }
}
