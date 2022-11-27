<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function view_users(){
        $users=User::all();
        return view('pages.user.view_users',compact('users'));
    }
    public function add_users(Request $request){
        // dd($request->all());

        $request->validate([
            'first_name'=>'required|max:32|min:2',
            'last_name'=>'required|max:32|min:2',
            'email'=>'required|email|max:32|unique:users',  
            'password'=>'required|min:6|max:12',
            'username'=>'required|unique:users',

        ]);
          
           $addUser=new User();
           $addUser->first_name=$request->first_name;
           $addUser->last_name=$request->last_name;
           $addUser->phone_number=$request->phone_number;
           $addUser->email =$request->email ;
           $addUser->gender=$request->gender;
           $addUser->username=$request->username;
           $addUser->password=Hash::make($request->password);
           if($request->hasFile('image')){
            $file=$request->image;
            $fileName="images".time().".".$file->extension();
            $file->storeAs("images", $fileName, 'public');
             $addUser->image="storage/images/".$fileName;
           }
           $addUser->save();
           return back();
    }
    public function edit_users($id){
        $editUser=User::find($id);
        return view('pages.user.edit_users',compact('editUser'));
    }
    public function update_users(Request $request,$id){
        // $request->validate([
        //     'first_name'=>'required|max:32|min:2',
        //     'last_name'=>'required|max:32|min:2',
        //     'email'=>'required|email|max:32|unique:users',  
        //     'username'=>'unique:users|required',

        // ]);
        // dd($request->all());
          

           $update=User::find($id);
           $update->first_name=$request->first_name;
           $update->last_name=$request->last_name;
           $update->phone_number=$request->phone_number;
           $update->email =$request->email ;
           $update->gender=$request->gender;
           $update->username=$request->username;
           $update->password=Hash::make($request->password);
           if($request->hasFile('image')){
            $file=$request->image;
            $fileName="images".time().".".$file->extension();
            $file->storeAs("images", $fileName, 'public');
             $update->image="storage/images/".$fileName;
           }
           $update->update();
           return redirect('/view_user');
    }
    public function delete_users($id){
        $deleteUser=User::find($id);
        $deleteUser->delete();
        return redirect('/view_user');
    }


    public function forgetPassword()
    {
        return view('forget-password');
    } 
    public function sendEmailToVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $confirmation = rand(1000, 9999);
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if(!$user){
            return back()->with('message', 'invalid email ');
        }
        Session::put('forgetConfirmation', $confirmation);
        Session::put('user', $user);
        Mail::to($user->email)->send(new VerifyMail($user->name, $confirmation));
        return redirect()->route('updateForgottenPasswordView');
    }

     public function updateForgottenPasswordView()
    {
        return view('update-forget-password');
    }

    public function updateForgetPassword(Request $request)
    {
        $request->validate([
            'confirm' => 'required|numeric',
            'password' => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required|min:6|max:20|',
        ]);
        $confirmation = session('forgetConfirmation');
        $user = session('user');
        if ($confirmation != $request->confirm) {
            return back()->with('message', 'invalid confirmation number');
        } else {
            $user =  User::findOrFail($user->id);
            $user->password =  Hash::make($request->password);
            $user->save();
            Session::flush();
            return redirect('login')->with('success', 'you have  changed your password successfully');
        }
    }
}
