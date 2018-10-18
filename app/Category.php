<?php

namespace CodeEducation;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Mass assignament - ok
     */
    protected $fillable = ['name', 'description'];
}
