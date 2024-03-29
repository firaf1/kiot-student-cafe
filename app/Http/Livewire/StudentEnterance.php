<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Ticke;
use Carbon\Carbon;
use Livewire\Component;

class StudentEnterance extends Component
{
    public $student, $status, $errorMessage;

    protected $listeners = ['postAdded' => 'incrementPostCount'];

    public function incrementPostCount($qr)
    {

        $schedule = Schedule::where('type', 'active')->first();
        if ($schedule == null) {
            $this->status = 0;
            $this->emit('tickProblemEmit', "Schedule Successfully Deleted!");
            return $this->errorMessage = "there is no active schedule";
        }
        $this->student = Student::where('qr', $qr)->first();
        if ($this->student) {

            $type = $this->student->type;

            if ($this->student->status == "Unapproved") {

                $this->status = 1;
                $this->errorMessage = "Account is Freezed";

                $not = new Notification();
                $not->user_id = $this->student->id;
                $not->type = "cafe";
                $not->save();

                $this->emit('dangerNotification111', "Schedule Successfully Deleted!");
                return 0;
            } elseif ($schedule->is_for_both == "cafe" && $type == "non-cafe") {
                $this->status = 1;
                $this->errorMessage = "Not Allowed For Non Cafe Student";
                return $this->emit('dangerNotification111', "Schedule Successfully Deleted!");

            } elseif ($this->student && $schedule) {

                $tick = Ticke::where('student_id', $this->student->id)
                    ->where('schedule_id', $schedule->id)->whereDate('created_at', Carbon::today())->count();
                // $tick = Ticke::where('student_id', $this->student->id)->where('schedule_id', $schedule->id)->count();

                if ($tick > 0) {
                    $this->status = 1;
                    $this->emit('tickProblemEmit', "Schedule Successfully Deleted!");
                    $this->errorMessage = "ድጋሜ ነው ...";
                    $this->emit('dangerNotification111', "Schedule Successfully Deleted!");

                } else {
                    $this->emit('beepBeepsuccessSound', "Schedule Successfully Deleted!");
                    $ticke = new Ticke();
                    $ticke->student_id = $this->student->id;
                    $ticke->schedule_id = $schedule->id;
                    $ticke->save();
                    $this->status = 2;
                    return 0;
                }
            }
        } else {
            $this->status = 0;
            $this->errorMessage = "Not Registered";
            $this->emit('dangerNotification111', "Schedule Successfully Deleted!");

        }

    }

    public function render()
    {
        return view('livewire.student-enterance');
    }
}
