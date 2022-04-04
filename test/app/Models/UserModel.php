<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    public $timestamps = true;
    protected $table='user';
    protected $primaryKey='id';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $fillable=[
        'email','pass','name','permission_role','birthday','active','del_flag','gender','note','create_time','update_time','create_id','update_id'
                        ];
    public function permission(){
        return $this->belongsToMany('App\PermissionModel');
    }
    public static function getUserExprot()
    {
        $records=DB::table('user')
        ->leftjoin('permission','user.permission_role','=','permission.role')
        ->select('user.id','email','user.name','birthday','gender','permission.namerole')
        ->orderby('user.id','desc')
        ->get()->toArray();
        
        
        return $records;
    }
    

}
