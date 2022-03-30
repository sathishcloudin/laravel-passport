<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class catemodel extends Model
{
    protected $table = 'catemodels';
    protected $fillable =['name','status'];
}
