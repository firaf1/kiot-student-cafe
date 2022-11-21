<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
class LanguageIndex extends Component
{
    public function ChangeLanguage($locale)
    {
        Session::forget('locale');
        app()->setLocale($locale);
        session()->put('locale', $locale);
     
    }
    public function render()
    {
        // {{ route('change-language', 'am') }}
        return view('livewire.language-index');
    }
}
