<?php

namespace App\Http\Livewire;

use App\Imports\StudentsImport;
use App\Models\Student;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class StudentSuperAdmin extends Component
{
    use WithFileUploads;
    public $student, $search, $inputUser, $file, $delete_id;

    public function submitForm()
    {

        $this->validate([
            'file' => 'required',
        ]);
        Excel::import(new StudentsImport(), $this->file);
        $this->render();
        $this->emit('sweet_alert_comfirmation', "Student Successfully Imported!", 'success', 'Success');

    }
    public function myMount()
    {
        $this->render();
    }
    public function GenerateAgain()
    {
        $id = $this->delete_id;
        $student = Student::findOrFail($id);
        if ($student->status != "Approved") {
            return $this->emit('sweetAlertToast', "Sorry! Its Blocked Account!!", 'error');
        }
        if ($student->image != null && file_exists($student->image)) {

            $card = ImageManagerStatic::make('card/card.jpg');

            $pic = ImageManagerStatic::make($student->image)->resize(225, 260);

            $card->insert($pic, '', 980, 150);
            //  $dns = new DNS2D;

            $random = strtoupper(substr(md5(mt_rand()), 0, 10));

            $qr_data = "KIOT" . $random;

            $barcode = Image::make(DNS1D::getBarcodePNG($qr_data, 'C39E'))->resize(1100, 200);

            $card->insert($barcode, '', 60, 550);

            $id = "ID: " . $student->id_number;

            $card->text($id, 980, 423, function ($font) {

                $font->file(public_path('css/id.ttf'));
                $font->size(40);
                $font->color('#00235d');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $card->text($student->name, 345, 232, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(35);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $card->text($student->department, 400, 288, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $card->text('0' . $student->phone_number, 340, 340, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
            $now = date('Y-m-d');

            $card->text($now, 407, 390, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
            $end = date('Y-m-d', strtotime('+5 years'));

            $card->text($end, 430, 440, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
            $card->text("Wollo University", 488, 495, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $myID = str_replace("/", "-", $student->id_number);

            $tempImage = 'KIOT-STUDENT-CARD-' . $myID . time() . '.' . 'png';

            // $card->save('cards/'. "ff".time().$card . '.png');
            // $card->storeAs('STUDENT_CARD/', $tempImage, 'public');
            $student->meal_card = "cards/STUDENT_CARD/" . $tempImage;

            $card->save('cards/STUDENT_CARD/' . $tempImage);

            $student->qr = $qr_data;

            $student->save();
            if ($student->save()) {
                $this->emit('sweetAlertToast', "Card is Successfully Created!!", 'success');
            } else {
                $this->emit('sweetAlertToast', "Sorry something is went wrong!!", 'error');
            }

        } else {
            $this->emit('sweetAlertToast', "Sorry Image is not found !!", 'error');
        }

    }
    public function ReGenerate($id)
    {
        $this->delete_id = $id;
        $this->emit('Show_shedule_warning_modal', "Input Successfully Added!");
    }
    public function qrGenerete()
    {

        $students = Student::where('meal_card', null)->get();

        foreach ($students as $student) {
            if ($student->image != null && file_exists($student->image) && $student->status == "Approved") {
                $card = ImageManagerStatic::make('card/card.jpg');
                $pic = ImageManagerStatic::make($student->image)->resize(225, 260);
                $card->insert($pic, '', 980, 150);
                $dns = new DNS2D;
                $str = rand();
                $result = md5($str);
                $qr_data = "KIOT-" . strtoupper(substr($result, 0, 10));
                $barcode = Image::make(DNS1D::getBarcodePNG($qr_data, 'C39E'))->resize(1100, 200);
                $card->insert($barcode, '', 60, 550);
                $id = "ID: " . $student->id_number;
                $card->text($id, 980, 423, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(40);
                    $font->color('#00235d');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });

                $card->text($student->name, 345, 232, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(35);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });

                $card->text($student->department, 400, 288, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(30);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });

                $card->text('0' . $student->phone_number, 340, 340, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(30);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });
                $now = date('Y-m-d');

                $card->text($now, 407, 390, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(30);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });
                $end = date('Y-m-d', strtotime('+5 years'));
                $card->text($end, 430, 440, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(30);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });
                $card->text("Wollo University", 488, 495, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(30);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });

                $myID = str_replace("/", "-", $student->id_number);
                $tempImage = 'KIOT-STUDENT-CARD-' . $myID . time() . '.' . 'png';
                // $card->save('cards/'. "ff".time().$card . '.png');
                // $card->storeAs('STUDENT_CARD/', $tempImage, 'public');
                $student->meal_card = "cards/STUDENT_CARD/" . $tempImage;
                $card->save('cards/STUDENT_CARD/' . $tempImage);
                $student->qr = $qr_data;
                $student->save();

            }

        }
    }
    public function generateForOneStudent($id)
    {
        $student = Student::findOrFail($id);
        if ($student->status != "Approved") {
            return $this->emit('sweetAlertToast', "Sorry! Its Blocked Account!!", 'error');
        }
        if ($student->image != null && file_exists($student->image)) {

            $card = ImageManagerStatic::make('card/card.jpg');

            $pic = ImageManagerStatic::make($student->image)->resize(225, 260);

            $card->insert($pic, '', 980, 150);
            $dns = new DNS2D;
            $str = rand();
            $result = md5($str);
            $qr_data = "KIOT-" . strtoupper(substr($result, 0, 10));

            $barcode = Image::make(DNS1D::getBarcodePNG($qr_data, 'C39E+'))->resize(1100, 200);

            $card->insert($barcode, '', 60, 550);

            $id = "ID: " . $student->id_number;

            $card->text($id, 980, 423, function ($font) {

                $font->file(public_path('css/id.ttf'));
                $font->size(40);
                $font->color('#00235d');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $card->text($student->name, 345, 232, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(35);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $card->text($student->department, 400, 288, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $card->text('0' . $student->phone_number, 340, 340, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
            $now = date('Y-m-d');

            $card->text($now, 407, 390, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
            $end = date('Y-m-d', strtotime('+5 years'));
            $card->text($end, 430, 440, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
            $card->text("Wollo University", 488, 495, function ($font) {
                $font->file(public_path('css/id.ttf'));
                $font->size(30);
                $font->color('#757592');
                // $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $myID = str_replace("/", "-", $student->id_number);
            $tempImage = 'KIOT-STUDENT-CARD-' . $myID . time() . '.' . 'png';

            // $card->save('cards/'. "ff".time().$card . '.png');
            // $card->storeAs('STUDENT_CARD/', $tempImage, 'public');
            $student->meal_card = "cards/STUDENT_CARD/" . $tempImage;

            $card->save('cards/STUDENT_CARD/' . $tempImage);

            $student->qr = $qr_data;
            $student->save();
            if ($student->save()) {
                $this->emit('sweetAlertToast', "Card is Successfully Created!!", 'success');
            } else {
                $this->emit('sweetAlertToast', "Sorry something is went wrong!!", 'error');
            }

        } else {
            $this->emit('sweetAlertToast', "Sorry Image is not found !!", 'error');
        }

    }
    public function updatedSearch()
    {
        $this->inputUser = Student::where('type', 'like', '%' . $this->search . '%')
            ->orWhere('id_number', 'like', '%' . $this->search . '%')
            ->orWhere('phone_number', 'like', '%' . $this->search . '%')
            ->orWhere('department', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->get();

        $this->render();
    }
    public function StatusChangeUnapprove($id)
    {
        $student = Student::where('id', $id)->first();
        $student->status = "Unapproved";
        $student->save();
        $this->render();
    }

    public function StatusChangeApprove($id)
    {

        $student = Student::where('id', $id)->first();
        $student->status = "Approved";
        $student->save();
        $this->render();
    }
    public function render()
    {
        if ($this->inputUser == null) {
            return view('livewire.student-super-admin', ['students' => Student::latest()->get()]);
        }

        return view('livewire.student-super-admin', ['students' => $this->inputUser]);

    }
}
