<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Component
{
    public $theme;
    public function mount()
    {
        $this->theme = Auth::user()->theme;
        $this->emit('themeChange', $this->theme);

    }
    public function change()
    {
         
      $theme = Auth::user()->theme;
       if($theme == 'dark-mode'){
        $user = User::find(Auth::user()->id);
       $user->theme ="light-mode";
       $this->theme = "light-mode";
        $user->save();
        $this->emit('themeChange', "light-mode");
       }
       if($theme == 'light-mode'){
        $user = User::find(Auth::user()->id);
        $user->theme ="dark-mode";
        $this->theme = "dark-mode";
         $user->save();
        
        $this->emit('themeChange', "dark-mode");
       }
       $this->render();
    }
    public function render()
    {
    
        return view('livewire.theme-controller');
    }
}
