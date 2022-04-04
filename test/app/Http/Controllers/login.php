<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;

session_start();
class login extends Controller

{
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

	public function show_login(){
       if($this->check_login()==true)
        {
            return redirect::to('welcome') ;
        }
        else {
		    return view('login');
            }
            //return view('login');
	}

    public function show_welcome()
    {
      if($this->check_login()==true )
        {
            return view ('/welcome');
        }
        else
        {
            return redirect::to('/login');
        }
    
    }

    public function dangnhap (Request $req)
    {
       /* return json_encode([
            'code' => 200,
            'msg' =>'login ok'
        ]);*/

        //var_dump($_POST);die;
        $vali=Validator::make($req->all(),
         [   

            'email'=>'required',
            'password'=>'required',
                  
        ],
        [
             'email.required' => 'Không được để trống',
             'password.required' => 'Không được để trống',
        ]);
        if ($vali->fails()) {
            return response()->json([
                'code' => '400',
                'data' => [],
                'error' => $vali->errors(),
                'msg' => 'error'
            ]);
                       
        }

    	$email=$req->email;
    	$pass=md5($req->password);
        

    	$result= DB::table('user')->where('email',$email)->where('pass',$pass)->first();
    	
    	if ($result)
        {

           Session::put('id', $result->id);
           Session::put('name',$result->name);

            
            
    		return response()->json(['code'=>'200',
                                     'status'=>'sucess'
                                    ]);
                
                
    	}
        else
        {
    	 return response()->json(['code'=>'404',
                                  'status'=>'fail'
                                 ]);
    	}

    }
    
    

    public function logout()
    {
       
        Session::put('id', null);
        Session::put('name',null);

        return redirect::to('/login');
    }
    

}
