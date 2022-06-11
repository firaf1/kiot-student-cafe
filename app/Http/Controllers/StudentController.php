<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;
 
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('pages.student.add-student', compact('students'));
    }
    public function qr_generate()
    {
        $students = Student::all();
        foreach($students as $student){
            if($student->image != null){
                $card = ImageManagerStatic::make('card/card.jpg')->resize(2000, 3000);
                $pic = ImageManagerStatic::make($student->image)->resize(880, 880);
                $card->insert($pic, '', 570, 490);
                $dns = new DNS2D;
                $str=rand(); 
                $result = md5($str); 
                $qr_data = "KIOT-".substr($result, 0, 10);
                $barcode = Image::make(DNS1D::getBarcodePNG($qr_data, 'C39E+'))->resize(1500, 400);
                $card->insert($barcode, '', 200, 2300);



                $card->text($student->name, 500, 1500, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(150);
                    $font->color('#00235d');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });

                $card->text('Id: '.$student->id_number, 700, 1700, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(80);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });
        
                $card->text( 'department'.$student->department, 700, 2000, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(90);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });
                $tempImage = 'KIOT-STUDENT-CARD-'.$student->name . time() . '.' . 'png';
                // $card->save('cards/'. "ff".time().$card . '.png');
                // $card->storeAs('STUDENT_CARD/', $tempImage, 'public');
                $student->meal_card = "cards/STUDENT_CARD/" . $tempImage;
                $card->save('cards/STUDENT_CARD/'. $tempImage);
                $student->qr = $qr_data;
                $student->save();
 
            }
        }
    }
    public function importStudent(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|max:10000|mimes:xlsx,xls',
        // ]);
        // dd($request->file);
        $path = $request->file;
        // Excel::toCollection(new StudentsImport, $path);
        $res = Excel::import(new StudentsImport("My name is Firaol biru"), request()->file('file'));
        
       
    }
}
