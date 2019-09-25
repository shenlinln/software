<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Common\CommonFunction;

class Admin extends Model
{
    //
    protected  $table  = 'admin';
    public $timestamps = false;
    
    protected $fillable = ['adminuser','adminpass','adminemail','logintime','loginip','create_at','update_at','admin_role_id'];
    
    
    /**
     * verification login
     *
     */
    public function verification_login($request){
         
        $cf = new CommonFunction();
        $user = admin::where('adminuser', $request['username'])->where('adminpass', $cf->encrypt_password($request['password']))->first();
        return $user;
    }
    
    
    public function admin_list(){
        
        $list = $this::where('id','>','0')->orderBy('id','desc')->paginate(10);
        
        return $list;
    }
    
    public function admin_desc()
    {
        
        $list = $this::where('id','>','0')->orderBy('id','desc')->first();
        
        return $list;
    }
    
    /**
     * add data
     * auth :shenll
     */
    public function store($request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => 'required'
        ];
        
        $validate = Validator::make($request, $rules);
        $cf = new CommonFunction();
        if ($validate->fails()) {
            return $validate->messages()->first();
        }
        if(isset($request['username']) && !empty($request['username'])){
            $this->adminuser = $request['username'];
        }
        if(isset($request['password']) && !empty($request['password'])){
            $this->adminpass =$cf->encrypt_password($request['password']);
        }
        if(isset($request['adminemail']) && !empty($request['adminemail'])){
            $this->adminemail = $request['adminemail'];
        }else{
            $this->adminemail = '0';
        }
        $this->admin_role_id = $request['check_val'];
        $this->logintime = time();
        $this->loginip = getenv( 'REMOTE_ADDR');
        $this->create_at = time();
        $this->update_at = 0;
        $result =  $this->save();
        return $result;
    }
}

