<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin;
class LoginController extends Controller
{
    public function index(Request $request){
        
        return view('admin.layouts.index');
        
    }
    public function login(Request $request){
        
        if($request->isMethod('post')){
            $rules = [
                'username' => 'required|string',
                'password' => 'required'
            ];
            $params = $request->all();
            $validate = Validator::make($params, $rules);
            if ($validate->fails()) {
                return $validate->messages();
            }
            $useradmin = new  Admin();
            $user = $useradmin->verification_login($request);
            if (!$user) {
               return json_encode(['bool' => false,'message' => '用户密码错误']);
            }else{
               $request->session()->put('username', $request->input('username'));
               $username_uid_session = $user->id;
               $request->session()->put('admin_id',$username_uid_session);
                
              return json_encode(['bool' => true]);
          }
        }
        return view('admin.login.login');
        
    }
}
