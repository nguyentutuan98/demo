<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    public $timestamps = false;
    protected $table='permission';
    protected $primaryKey='id';
     protected $fillable=[
        'id','role','name'
     ];
}
