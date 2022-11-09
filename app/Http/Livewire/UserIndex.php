<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Models\Input;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserIndex extends Component
{
    public $firstName, $search,$multi, $inputs, $editFirstName, $inputUser, $editRole, $editGender, $editEmail, $userID, $editLastName, $editPhoneNumber, $lastName, $deleted_id, $password, $phoneNumber, $password_confirmation, $gender, $role;

    protected $rules = [
        'password' => 'min:6|required',
        'password_confirmation' => 'required_with:password|same:password|min:6',
        'firstName' => 'min:2|required',
        'lastName' => 'min:2|required',
        // 'email' => 'min:6|required|unique:users,email,',
        'phoneNumber' => 'min:10|required',
        'gender' => 'required',

        'role' => 'required',
    ];
    public function updatedSearch()
    {
        $this->inputUser = User::where('fname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('lname', 'like', '%' . $this->search . '%')
            ->orWhere('phone_number', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orWhere('role', 'like', '%' . $this->search . '%')
            ->get();
             
        $this->render();
    }
    public function ApprovedUser($id)
    {
    
        $user = User::findOrFail($id);
        $user->status = "Approved";
        $user->save();
        $this->emit('SweetAletSuccessNotification', "Successfully Approved", 'success', 'right');

    }
    public function UnapprovedUser($id)
    {
       
        
        $user = User::findOrFail($id);
        $user->status = "Unapproved";
        $user->save();
        $this->emit('SweetAletSuccessNotification', "Successfully Unapproved", 'success', 'right');

    }
  
    public function AddUser()
    {
        
        $this->validate();
        $user = new User();
        $user->fname = $this->firstName;
        $user->lname = $this->lastName;
        $user->phone_number = $this->phoneNumber;
        $user->old_password = Hash::make($this->password);
        $user->status = "Approved";
        $user->role = $this->role;
        $user->gender = $this->gender;
        $user->save();
        $this->render();
        $this->emit('SweetAletSuccessNotification', "Successfully Registered", 'success', 'right');

    }
    public function editUser($id)
    {
        $this->reset();
        $this->userID = $id;
        $user = User::find($id);
        $this->editFirstName = $user->fname;
        $this->editLastName = $user->lname;
        $this->editPhoneNumber = $user->phone_number;
        //  $this->editEmail = $user->email;
        $this->editRole = $user->role;
        $this->editGender = $user->gender;
        $this->emit('editUserModalShow');

    }
    public function UpdateUserInfo()
    {
        $this->validate([

            'password_confirmation' => 'required_with:password|same:password',
            'editFirstName' => 'min:2|required',
            'editLastName' => 'min:2|required',
            // 'email' => 'min:6|required|unique:users,email,',
            'editPhoneNumber' => 'min:10|required',
            'editGender' => 'required',
            'editRole' => 'required',
        ]);

        $user = User::find($this->userID);
        $user->fname = $this->editFirstName;
        $user->lname = $this->editLastName;
        $user->phone_number = $this->editPhoneNumber;
        $user->gender = $this->editGender;
        $user->role = $this->editRole;
        if ($this->password != null) {
            $user->old_password = Hash::make($this->password);
        }
        $user->save();
        $this->render();
        $this->emit('SweetAletSuccessNotification', "Successfully Updated!", 'success', 'right');
    }
    public function delete()
    {
        $user = User::find($this->deleted_id);
        $user->delete();
        $this->render();

    }
    public function deleted_id($id)
    {
        $this->deleted_id = $id;
        $this->emit('deleted_sweet_alert_modal', "Items Successfully Unapproved!", 'success', 'right');
    }
    public function RoleAsign($userId, $inputId)
    {
   
         $user = User::findOrFail($userId); //
         $user->role_id = $inputId;
         $user->save();
         $this->emit('SweetAletSuccessNotification', "Successfully Updated!", 'success', 'right');
    }
    public function render()
    {
        $this->inputs = Role::where('status', 'Approved')->get();
        if ($this->inputUser != null) {
 
            return view('livewire.user-index', ['users' => $this->inputUser]);
        }

        return view('livewire.user-index', ['users' => User::latest()->get()]);

    }
}
