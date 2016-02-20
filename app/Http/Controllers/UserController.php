<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;

use DB;
use Validator;
use Input;
use Illuminate\Support\Facades\Hash;

use App\User;


class UserController extends Controller
{
    /**
     * List All of users
     *
     * @author Amjad Ata-Allah <ataallah.amjad@gmail.com>
     */

    public function index() {
        
        $veriables_to_view = array();
        
        $users = User::get();
        
        $veriables_to_view['users'] = $users;
        $veriables_to_view['menu_page_id'] = 'usersPage';
        
        return view('users.index', $veriables_to_view);
    }
    
    /**
     * Save new user
     * 
     * @param Request $request Takes the request as parameter
     * 
     * @action POST
     *
     * @author Amjad Ata-Allah <ataallah.amjad@gmail.com>
     */
    
    public function post_index(Request $request) {
        
        $user = new User;
        $this->validate($request, $user->rules);
        
        $user->username = $request->input('username');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->date_of_birth = date("Y-m-d", strtotime($request->input('date_of_birth')));
        $user->password = Hash::make($request->input('password'));
        

        
        $res = $user->save();
        if($res) {
            Session::flash('message', 'New user created successfully.');
            return Redirect::to('users');
        } else {
            Session::flash('error', 'User did not created!');
            return Redirect::to('users');
        }
    }
    
    /**
     * Update a field in the database
     * 
     * @param Request $request Takes the request as parameter
     * 
     * @action POST
     * 
     * @return string success value or error msg
     *
     * @author Amjad Ata-Allah <ataallah.amjad@gmail.com>
     */
    
    public function editable(Request $request) {
        
        $id_data = explode('#', $request->input('id'));
        $id = $id_data[0];
        $name = $id_data[1];
        
        if($name == "date_of_birth") {
            $value = date("Y-m-d", strtotime($request->input('value')));
        } else {
            $value = $request->input('value');
        }
        
        $req = array($name => $value);
        
        $validator = Validator::make($req, User::$editabel_rules);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return "<span style='color:red; font-size: 9px;'>Error: $errors[0]</span>";
        }
        
        
        $res = DB::table('users')->where('id', $id)->update([$name => $value]);
        
        if($res) {
            return $value;
        } else {
            return 'Error, not saved';
        }
        
    }
    
    /**
     * Delete user from database
     * 
     * @param int $id
     * 
     * @action GET
     * 
     * @author Amjad Ata-Allah <ataallah.amjad@gmail.com>
     */
    
    public function delete($id) {
        
        $user = User::findOrFail($id);
        
        $user->delete();
        Session::flash('message', 'User deleted successfully.');
        return Redirect::to('users');
        
    }
    
        
}

