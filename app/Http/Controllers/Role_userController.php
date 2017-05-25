<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Mail;

class Role_userController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, array(
            'user_id' => 'required|integer',
            'role_id' => 'required',
        ));
        
        $session = new Role_user;
        
            $session->user_id = $request->input('user_id');
            $session->role_id = $request->input('role_id');
        
        $session->save();
        
        return view('la.users.index');
    } 
}
