<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\UserModel;
use App\Models\PermissionModel;
use Validator;
use Session;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Excel;
use App\Exports\Exportcsv;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    public function show_boootstap(Request $req)
    {
        
        return view('bootstrapmodal');
    }

    public function check_login() {
    //$id=$_SESSION["id"];
    
        if(Session::get('id') ) {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function add_user()
    {
        if($this->check_login()==true)
        {
            return view('add-user') ;
        }
        else {
            return redirect::to('login');
            }
    }


    public function save_user(Request $req)
    {
       /* return response()->json([
            'code'=>'400', // validation
            'error' => [
                'email' => 'email is required',
                'pass' => 'password is required'
            ]
        ]);*/
           
        $vali=Validator::make($req->all(),
         [   

            'email'=>'required|max:255',
            'password'=>['required',
                        'regex:/[a-z]/',      
                        'regex:/[A-Z]/',      
                        'regex:/[0-9]/',      
                        'regex:/[@$!%*#?&]/',
                        ],
            'name'=>'required',
            'birth'=>'required',
            'gender'=>'required',

            
        ],
        [
             'email.required' => 'Không được để trống',
             'email.max' =>'Không được vượt quá ký tự',
             'password.required' => 'Không được để trống',
             'password.regex'=>'Phải có đủ chữ thường ,chữ hoa ,số và ký tự đặc biệt',
             'name.required' => 'Không được để trống',
             'birth.required'=>'Không được để trống',
             'gender.required'=>'Không được để trống',

        ]);
        if ($vali->fails()) {
            return response()->json([
                'code' => '400',
                'data' => [],
                'error' => $vali->errors(),
                'msg' => 'error'
            ]);
                       
        }

        
        /*$data=array();
        $data['email']=$req->email;
        $data['pass']=md5($req->password);
        $data['name']=$req->name;
        $data['create_id']= Session::get('id');
        $data['create_time']= Carbon::now()->toDateTimeString();*/
        $new= new UserModel();
        $new->email=$req->email;
        $new->pass=md5($req->password);
        $new->name=$req->name;
        $new->gender=$req->gender;
        $new->note=$req->note;
        $new->permission_role=$req->role;
        //$new->birthday=$req->birth;
        $new->birthday = date('Y-m-d', strtotime($req->birth));
        $new->create_id=Session::get('id');
        $check=UserModel::all();
        //$check=DB::table('user')->select('email')->get();
        //var_dump($check);die;
        
       //var_dump($new);die;
        //$new->save();
        //die;
        foreach( $check as $key=>$value)
        {
            //if($data['email'] !=$value->email)
            
            if($new->email === $value->email)
                 return response()->json(['code'=>'100']);
            
            else
                {
                 $new->save();
                 
                
                if($new)
                {

                  return response()->json(['code'=>'200']);
                }
        
                else
                {
                return response()->json([
                    'code'=>'404',
                    ]);
                }

                }
            //$result=DB::table('user')->insert($data);
            

            } 
             //else if($data['email'] ==$value->email)
             

        

    }
    public function show_role()
    {
        $role=PermissionModel::select('role','name')->get();
        var_dump($role);
    }

    public function update_user(Request $req)
    {
        $vali=Validator::make($req->all(),
         [   

            'email'=>'required|max:255',
            
            'name'=>'required',
            'gender'=>'required',

            
        ],
        [
             'email.required' => 'Không được để trống',
             'email.max' =>'Không được vượt quá ký tự',
             'gender.required'=>'Không được để trống',
             'name.required' => 'Không được để trống',

        ]);
        if ($vali->fails()) {
            return response()->json([
                'code' => '400',
                'data' => [],
                'error' => $vali->errors(),
                'msg' => 'error'
            ]);
                       
        }

        
       
        $id=$req->id;
        $new=UserModel::find($req->id);
        $new->email=$req->email;
        $new->pass=md5($req->password);
        $new->name=$req->name;
        $new->birthday = date('Y-m-d', strtotime($req->birth));
        $new->gender=$req->gender;
        $new->note=$req->note;
        $new->permission_role=$req->role;
        $new->update_id=Session::get('id');
        $check=UserModel::all();
        
        foreach($check as $key =>$value)
        {
            if($new->id != $value->id)
               { 
                if($new->email === $value->email)
                    return response()->json(['code'=>'100']);
                }
            else 
            {
                $new->save();
                
                if($new === false)
             {
                  return response()->json(['code'=>'404']);
             }
            
             else 
             {
                return response()->json(['code'=>'200']);
             }
            }

        }

    }

    public function show_update_modal(Request $req)
    {
            //$role=PermissionModel::select('role','name')->get();
            //var_dump($role);die;
            
        
           $id=$req->id;
           $data=DB::table('user')->where('id',$id)->get();
        
           foreach($data as $key=>$value)
           {
            $birth=date('d-m-Y', strtotime($value->birthday));
           }
           if(!empty($data[0]))
           {
            return response()->json([
                'code'=>'200',
                'data'=>$data[0],
                'day'=>$birth,
                
            ]);
            }
            else 
            {
                return response()->json([
                    'code'=>'404',

                ]);
            }
             
        
    }
    public function show_update($id)
    {
          if($this->check_login()==true)
        { 
        $data=DB::table('user')->where('id',$id)->get();
        return view('/edit-user')->with('data',$data);
        }
        else
        {
            return redirect::to('login');
        }
    }

    public function all_user()
    {

        if($this->check_login()==true)
        {
            
            $role=DB::table('permission')->get();
            
            $data=DB::table('user')->select('*','user.id as id_user')-> leftjoin('permission','user.permission_role','=','permission.role')
                ->where('del_flag','0')->orderby('user.id','desc')->simplePaginate(5);
          
            return view('/all-user')->with('data',$data)->with('role',$role);
            
        }
        else {
            return redirect::to('login');
            }
        
        
        
    }

    public function show_remove_modal(Request $req)
    {
        
           $id=$req->id;
           
           if(!empty($id))
           {
            return response()->json([
                'code'=>'200',
                'data'=>$id,
            ]);
            }
            else 
            {
                return response()->json([
                    'code'=>'404',

                ]);
            }
        
    }

    public function remove_user(Request $req)
    {
        $id=$req->id;
         
        $result=DB::table('user')->where('id',$id)->update(['del_flag' => 1]);
        
        if($result)
        {
            return response()->json(['code'=>'200']);
        }
        else
        {
            return response()->json(['code'=>'404']);
        }
    }

    public function show_change(Request $req)
    {
        $id=$req->id;
           
           if(!empty($id))
           {
            return response()->json([
                'code'=>'200',
                'data'=>$id,
            ]);
            }
            else 
            {
                return response()->json([
                    'code'=>'404',

                ]);
            }

    }

    public function save_change(Request $req)
    {
        $vali=Validator::make($req->all(),
         [   

            'old'=>['required',
                        'regex:/[a-z]/',      
                        'regex:/[A-Z]/',      
                        'regex:/[0-9]/',      
                        'regex:/[@$!%*#?&]/',
                        ],
            'new'=>['required',
                        'regex:/[a-z]/',      
                        'regex:/[A-Z]/',      
                        'regex:/[0-9]/',      
                        'regex:/[@$!%*#?&]/',
                        ],
            'confirm'=>['required',
                        'regex:/[a-z]/',      
                        'regex:/[A-Z]/',      
                        'regex:/[0-9]/',      
                        'regex:/[@$!%*#?&]/',
                        'same:new',
                        ],

            
        ],
        [
             'old.required'=>'Không được bỏ trống',
             'old.regex'=>'Phải có ký tự thường, hoa,số và ký tự đặt biệt',
             'new.required'=>'Không được bỏ trống',
             'new.regex'=>'Phải có ký tự thường, hoa,số và ký tự đặt biệt',
             'confirm.required'=>'Không được bỏ trống',
             'confirm.same'=>'confirm password không đúng',

        ]);
        //var_dump($vali->errors());die;
        if ($vali->fails()) {
            return response()->json([
                'code' => '400',
                'data' => [],
                'error' => $vali->errors(),
                'msg' => 'error'
            ]);
                       
        }

        $id=$req->id;
        $old=md5($req->old);
        $new=UserModel::find($req->id);
        if($old === $new->pass)
        {
            
            $new->pass=md5($req->new);
            $new->save();
            if($new)
            {
                return response()->json([
                    'code'=>'200',


                ]);
            }
            else 
                return response()->json([
                    'code'=>'404',
                ]);
        }
        else 
            return response()->json([
                'code'=>'100',
            ]);
        

    }

    public function unactive(Request $req)
    {
       
        $new=UserModel::find($req->id);
        $new->active=0;
        $new->save();
        if($new){
            return response()->json([
                  'code'=>'200',
            ]);
        }else 
            return response()->json([
                'code'=>'404',
                ]);

    }
     public function active(Request $req)
    {
       
        $new=UserModel::find($req->id);
        $new->active=1;
        $new->save();
        if($new){
            return response()->json([
                  'code'=>'200',
            ]);
        }else 
            return response()->json([
                'code'=>'404',
                ]);

    }
    public function exportcsv(Request $req)
    {   
        $data =array();
        $data=$req->data;
        var_dump($data);die;
        return Excel::download(new Exportcsv ,'user.csv');

    }
    
}
