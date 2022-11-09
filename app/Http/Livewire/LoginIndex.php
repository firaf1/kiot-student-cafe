<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginIndex extends Component
{
    public $password, $userName, $errorMessage, $forgerPhoneNumber;
    protected $rules = [
        'userName' => 'required',
        'password' => 'required',
    ];

    protected $messages = [
        'userName.required' => 'phone number  cannot be empty.',
        'password.required' => 'password  cannot be empty.',

    ];
    public function LoginRequest()
    {
       

        $this->validate();
        $user = User::where('phone_number',$this->userName)->first();
        
        

       
    
 
        if ($user) {
            // $password = Hash::make($this->password);
            $DB_password = $user->password;
            if (Hash::check($this->password, $DB_password)) {

                Auth::login($user);

                if (Auth::user()->role == '1') {
                    redirect(route('superAdminDashboard'));
                } elseif(Auth::user()->role == '2'){
                    redirect(route('storeDashboard'));
                }

                 elseif(Auth::user()->role == '3'){
                    redirect(route('betDashboard'));
                }
                elseif(Auth::user()->role == '4'){
                    redirect(route('securtyDashboard'));
                }
                else{
                    $this->errorMessage = "Sorry your account is blocked";
                }

            } else {
                //  dd("ddddd");
                $this->errorMessage = "These credentials do not match our records.";
                
            }
        } else {
            $this->errorMessage = "These credentials do not match our records.";
            
        }

    }
    public function render()
    {
        return view('livewire.login-index');
    }
}
