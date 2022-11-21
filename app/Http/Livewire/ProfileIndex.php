<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileIndex extends Component
{
    use WithFileUploads;
    public $fname, $lname, $profilePicture, $password_confirmation, $newPassword, $image, $email, $phone_number, $password;
    protected $rules = [
        'phone_number' => 'required',
        'lname' => 'required',
        'fname' => 'required',
    ];
    public function mount()
    {
        $this->fname = Auth::user()->fname;
        $this->lname = Auth::user()->lname;
        $this->email = Auth::user()->email;
        $this->image = Auth::user()->image;
        $this->phone_number = Auth::user()->phone_number;
    }
    public function UpdateProfile()
    {
        if($this->email != null){
            $this->validate([
                'email'=>'email|max:32|unique:users',

            ]);
        }
        
        $this->validate();
         $user = User::where('id', '=', Auth::user()->id)->first();
         $user->lname = $this->lname;
         $user->fname = $this->fname;
         $user->email = $this->email;
         if($this->profilePicture != null){
            $this->validate([
                'profilePicture'=>'image|mimes:jpeg,jpg,png,gif|max:1000',

            ]);
            $tempImage = 'kiot-user-' . time() . '.' .  $this->profilePicture->extension();
            $this->profilePicture->storeAs('User_Profile/', $tempImage, 'public');
            $user->image = "storage/User_Profile/" . $tempImage;
            $this->image = "storage/User_Profile/" . $tempImage;
         }
         $user->save();
       
         $this->emit('postAdded', "Profile Info Successfully Updated!", 'success', 'center' , 'Success');
    }
    public function password_update(){
        $this->validate([
            'password' => 'required', 
            'newPassword' => 'required', 
            'password_confirmation' => 'required', 
        ]);
      
        $user = User::find(Auth::user()->id);
        if(Hash::check($this->password, $user->password)){
            
             if($this->password_confirmation == $this->newPassword){
               $user->password = Hash::make($this->newPassword);
               $user->save();
              $this->password = null;
              $this->password_confirmation = null;
              $this->newPassword = null;
               $this->emit('postAdded', "Password Successfully Updated!", 'success', 'right' , 'Success');
               Auth::logout();
               return Redirect::route('login');
               
              }
              else{
                $this->addError('password_confirmation', ' Password is Don\'t Match');
             

              }
        }
        else{
            $this->addError('password', 'Wrong Password');
             

        }
    
       
    }
    public function render()
    {
        return view('livewire.profile-index');
    }
}
