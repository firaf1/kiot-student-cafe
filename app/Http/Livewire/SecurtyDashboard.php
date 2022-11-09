<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Property_Report;

class SecurtyDashboard extends Component
{
    public $pending, $approved, $unapproved, $totalReport;
    public function render()
    {
        $this->pending = Property::where('status', 'Pending')->count();
        $this->approved = Property::where('status', "Approved")->count();
        $this->unapproved = Property::where('status', "Unapproved")->count();
        $this->totalReport = Property_Report::all()->count();
        return view('livewire.securty-dashboard');
    }
}
