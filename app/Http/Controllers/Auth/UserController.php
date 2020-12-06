<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends Controller
{
    public function edit ($id)
    {
        $user = User::find($id)->get(); 
        //dd($user->name);
        $path = 'storage/images/image_1593374042_.jpg';
        $name = File::name( $path );
    
        $extension = File::extension( $path );
    
        $originalName = $name . '.' . $extension;
    
        $mimeType = File::mimeType( $path );
    
        $size = File::size( $path );
    
        $error = null;
    
        $test = false;
    
        $object = new UploadedFile( $path, $originalName, $mimeType, $size, $error, $test );
    
        // dd($object) ;
        return view('auth.edit' , ['user' => $user , 'ph'=> $object]);
    }
  
    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'user_name' => ['required', 'string', 'unique:users' ],
            'image'     => ['image', 'mimes:png,jpeg,jpg' ],
        ]);
    }

    protected function update(AdminRequest  $adminRequest, $id)
    {

        dd($adminRequest);
        // dd($adminRequest->rules());
        
        // if ($adminRequest->hasFile('image')){
        //       $file     = $adminRequest->file('image');
        //       $ext      = $file->getClientOriginalExtension();
        //       $fileName = 'image_' . time() . "_." . $ext ;
        //       $file->storeAs('public/images' , $fileName);
        //   }else{
        //       $fileName = $adminRequest->old_image;
        //   }
          
        //  User::find($id)->update([
        //     'name'      => $adminRequest->name,
        //     'email'     => $adminRequest->email,
        //     'password'  => Hash::make($adminRequest->password),
        //     'user_name' => $adminRequest->user_name,
        //     'image'     => $fileName,
        // ]);
        return redirect()->route('home')->with('status' , "edit success");
    }
}

