<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //
    function AddUser(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'=>'required|max:191',
            'email'=>'required|unique:users|max:191',
            'phone'=>'required|max:191',
            'age'=>'required|max:191',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
        
        
        $user = new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->phone=$req->input('phone');
        $user->age=$req->input('age');
        $user->save();
        return $user;
    }}
    function list(){
        return User::all();
    }
    function delete($id)
    {
        $result = User::where('id', $id)->delete();
        if ($result) {
            return ["product has been deleted"];
        }
    }
}
