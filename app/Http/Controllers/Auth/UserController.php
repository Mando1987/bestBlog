<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function edit ($id)
    {
        $user = User::find($id)->get(); 
        //dd($user->name);
        return view('auth.edit' , ['user' => $user]);
    }
  
    protected function validator(Request $request )
    {
        return Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'user_name' => ['required', 'string', 'unique:users' ],
            'image'     => ['image', 'mimes:png,jpeg,jpg' ],
        ]);
    }

    protected function update(Request $request , $id)
    {
        
        if ($request->hasFile('image')){
              $file     = $request->file('image');
              $ext      = $file->getClientOriginalExtension();
              $fileName = 'image_' . time() . "_." . $ext ;
              $file->storeAs('public/images' , $fileName);
          }else{
              $fileName = $request->old_image;
          }
          
         User::find($id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'user_name' => $request->user_name,
            'image'     => $fileName,
        ]);
        return redirect()->route('home')->with('status' , "edit success");
    }
}

