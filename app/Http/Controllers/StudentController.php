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
        $students = Student::where('meal_card', null)->get();

        foreach($students as $student){
            if($student->image != null){
                $card = ImageManagerStatic::make('card/card.jpg');
                $pic = ImageManagerStatic::make($student->image)->resize(225, 260);
                $card->insert($pic, '', 980, 150);
                $dns = new DNS2D;
                $str=rand(); 
                $result = md5($str); 
                $qr_data = "KIOT-".substr($result, 0, 10);
                $barcode = Image::make(DNS1D::getBarcodePNG($qr_data, 'C39E+'))->resize(1100, 200);
                $card->insert($barcode, '', 60,550);

                $card->text($student->name, 350, 230, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(40);
                    $font->color('#00235d');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });

                $card->text($student->id_number, 400, 280, function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(40);
                    $font->color('#00235d');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });
        
                $card->text($student->department,  340, 335,function ($font) {
                    $font->file(public_path('css/id.ttf'));
                    $font->size(30);
                    $font->color('#757592');
                    // $font->align('center');
                    $font->valign('top');
                    $font->angle(0);
                });
                $tempImage = 'KIOT-STUDENT-CARD-'.$student->name . time() . '.' . 'png';
                // $card->save('cards/'. "ff".time().$card . '.png');
                // $card->storeAs('STUDENT_CARD/', $tempImage, 'public');
                $student->meal_card = "storage/cards/STUDENT_CARD/" . $tempImage;
                $card->save('storage/cards/STUDENT_CARD/'. $tempImage);
                $student->qr = $qr_data;
                $student->save();
 
            }

        }
        return back();
    }
    public function importStudent(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        Excel::import(new StudentsImport(), request()->file('file'));
        return back()->with('success1111111111', 'User Imported Successfully.');
    }
}
