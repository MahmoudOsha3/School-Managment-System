<?php

namespace App\Repositories ;
use App\Interfaces\StudentRepositoryInterface ;
use App\Models\{Grade , Classroom , Sections , Nationalitie , My_Parent , Type_blood ,Gender , Student , Image } ;
use Hash , DB ;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class StudentRepository implements StudentRepositoryInterface
{
    public function getAllStudent()
    {
        // $students = Student::orderBy('id' , 'asc')->get() ;
        $students = Student::latest()->get() ;
        return view('pages.Students.index' , compact('students')) ;
    }

    public function createStudent()
    {
        $data = $this->dataOfstudent() ;
        return view('pages.Students.create' , compact('data') ) ;
    }


    public function storeStudent($request)
    {
        try
        {
            DB::beginTransaction();
            $student = Student::create([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar ],
                'email' => $request->email ,
                'password' => Hash::make($request->password) ,
                'date_birth' => $request->date_birth ,
                'academic_year' => $request->academic_year ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->classroom_id ,
                'section_id' => $request->section_id ,
                'nationalty_id' => $request->nationalitie_id ,
                'blood_id' => $request->blood_id ,
                'gender_id' => $request->gender_id ,
                'parent_id' => $request->parent_id
            ]);

            if($request->hasfile('images'))
            {
                $this->uploadAttachments($request , $student->id , $student->name);
            }
            DB::commit();
            toastr()->success(trans('site.added'));
            return redirect()->route('students.index');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }

    }


    public function showStudent($id)
    {
        $student = Student::findOrfail($id) ;
        return view('pages.Students.show' , compact('student'));
    }

    public function editStudent($id)
    {
        try
        {
            $data = $this->dataOfstudent();
            $student = Student::findOrfail($id) ;
            return view('pages.Students.edit', compact('data' , 'student')) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => 'Student Not Found']) ;
        }

    }

    public function updateStudent($request , $id)
    {
        try
        {
            $student = Student::findOrfail($id);
            $student->update([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar ],
                'email' => $request->email ,
                'password' => Hash::make($request->password) ,
                'date_birth' => $request->date_birth ,
                'academic_year' => $request->academic_year ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->classroom_id ,
                'section_id' => $request->section_id ,
                'nationalty_id' => $request->nationalitie_id ,
                'blood_id' => $request->blood_id ,
                'gender_id' => $request->gender_id ,
                'parent_id' => $request->parent_id
            ]);
            toastr()->success(trans('site.updated'));
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage() ]) ;
        }
    }

    public function deleteStudent($id)
    {
        try
        {
            Student::findOrfail($id)->delete() ;
            toastr()->success(trans('site.deleted'));
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => 'Student Not Found' ]) ;
        }
    }



    // get sections for fill select (form of sections) about a way classroom
    public function  getSectionsAjax($classroom_id)
    {
        $sections = Sections::where('classroom_id' , $classroom_id)->pluck("name", "id");
        return $sections ;
    }

    // uploade files in pages (show details student)
    public function uploadAddtionalAttachments($request)
    {
        try
        {
            $validate = $request->validate(['images' => 'required'] , ['images.required' => 'files is required']) ;
            $this->uploadAttachments($request , $request->student_id , $request->student_name );
            toastr()->success(trans('site.added'));
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage() ]) ;
        }

    }


    public function downloadFile($studentName , $fileName)
    {
        try
        {
            $filePath = public_path('attachemnts/student/'. $studentName . '/' .$fileName) ;
            if (file_exists($filePath))
            {
                return Response::download($filePath);
            }
            else
            {
                return redirect()->back()->with(['error' => __(key:'student.File_not_found')]) ;
            }
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => __(key:'student.File_not_found')]) ;
        }
    }

    public function deleteStudentAttachments($request)
    {
        try
        {
            DB::beginTransaction();
            // Delete img in server disk
            Storage::disk('students')->delete('attachemnts/student/'.$request->student_name.'/'.$request->filename);

            // Delete in data
            Image::where('id',$request->id)->where('filename',$request->filename)->delete();

            DB::commit();
            toastr()->error(trans('site.deleted'));
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => __(key:'student.File_not_found')]) ;
        }

    }





    // ######################################################################################
    // general function
    // ######################################################################################

    public function dataOfstudent()
    {
        $data = [] ;
        $data['grades'] = Grade::all() ;
        $data['classroom'] = Classroom::all() ;
        $data['sections'] = Sections::all() ;
        $data['nationalities'] = Nationalitie::orderBy('name', 'asc')->get() ;
        $data['genders'] = Gender::all() ;
        $data['blood'] = Type_blood::all();
        $data['parent'] = My_Parent::latest()->get();
        return $data ;
    }


    // general function for uploads files student
    public function uploadAttachments($request , $studentId , $studentName)
    {
        foreach ($request->file('images') as $file)
        {
            $nameFile = $file->getClientOriginalName() ;
            $file->storeAs('attachemnts/student/'. $studentName  , $nameFile , 'students') ;

            Image::create([
                'filename' => $nameFile ,
                'imageable_id' => $studentId ,
                'imageable_type' => 'App\Models\Student' ,
            ]);
        }
    }

}
