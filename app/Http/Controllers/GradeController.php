<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function create()
    {
        return view('grades.import_grades');
    }


    public function store(Request $request)
    {
        $file = $request->file('import_grades');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
            //Check for file extension and size
            $this->checkUploadedFileProperties($extension, $fileSize);
            //Where uploaded file will be stored on the server 
            $location = 'uploads'; //Created an "uploads" folder for that
            // Upload file
            $file->move($location, $filename);
            // In case the uploaded file path is to be stored in the database 
            $filepath = public_path($location . "/" . $filename);
            // Reading file
            $file = fopen($filepath, "r");
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            //Read the contents of the uploaded file 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata);
                // Skip first row (Remove below comment if you want to skip the first row)
                if ($i == 0) {
                    $i++;
                    continue;
                }
                for ($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            fclose($file); //Close after reading
            $j = 0;
            foreach ($importData_arr as $importData) {
                $regNumber = $importData[1]; //Get user names
                $studentId = Student::all()->where('ref_number', '=', $regNumber)->first();
                $j++;
                try {
                    if ($studentId === null) {
                        continue;
                    }
                    DB::beginTransaction();
                    Grade::create([
                        'student_id' => $studentId->id,
                        'course_id' => $importData[2],
                        'marks' => $importData[3],
                    ]);
                    StudentCourse::create([
                        'student_id' => $studentId->id,
                        'course_id' => $importData[2]
                    ]);
                    DB::commit();
                } catch (\Exception $e) {
                    //throw $th;
                    DB::rollBack();
                }
            }
            return back()->with(
                'message',
                "$j records successfully uploaded"
            );
        } else {
            //no file was uploaded
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
    }
    public function checkUploadedFileProperties($extension, $fileSize)
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize <= $maxFileSize) {
            } else {
                throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
            }
        } else {
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }
}
