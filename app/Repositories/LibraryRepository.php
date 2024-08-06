<?php

namespace App\Repositories ;
use App\Interfaces\LibraryRepositoryInterface ;
use App\Models\{Grade , Teacher , Library};
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse ;

class LibraryRepository implements LibraryRepositoryInterface
{
    public function index()
    {
        $books = Library::latest()->get() ;
        // Teacher::orderBy('name' , 'ASC')->all()
        return view('pages.Library.index' , compact('books')) ;
    }
    public function create()
    {
        $grades = Grade::all() ;
        $teachers = Teacher::orderBy('name' , 'ASC')->get();
        return view('pages.Library.create' , compact('grades' , 'teachers')) ;
    }

    public function store($request)
    {
        try
        {
            $validate = $request->validate([ 'title' => 'required' ,'file_name' => 'required'  ,'grade_id' => 'required'  ,'class_id' => 'required' ,'section_id' => 'required','teachers_id' => 'required' ]) ;
            if ($request->hasFile('file_name'))
            {
                $book = $request->file('file_name')->storeAs('attachemnts/library/', $request->file_name->getClientOriginalName() , $disk = 'students') ;
            }
            Library::create([
                'title' => $request->title,
                'classroom_id' => $request->class_id ,
                'section_id' => $request->section_id,
                'grade_id' => $request->grade_id ,
                'file_name' => $request->file_name->getClientOriginalName() ,
                'teacher_id' => $request->teachers_id ,
            ]);
            return redirect()->back()->with(['success' => trans('site.added')]) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }

    public function edit($id)
    {
        try
        {
            $book = Library::findorFail($id);
            $grades = Grade::all() ;
            $teachers = Teacher::orderBy('name' , 'ASC')->get();
            return view('pages.Library.edit' , compact('grades' , 'teachers' , 'book')) ;
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update($request , $id)
    {
        try
        {
            $validate = $request->validate([ 'title' => 'required'  ,'grade_id' => 'required'  ,'class_id' => 'required' ,'section_id' => 'required','teachers_id' => 'required' ]) ;
            $book = Library::findOrfail($id) ;

            $valueBookInDB = $book->file_name ;
            // لوحصل وان اختار كتاب جديد خش بقي هنا الاول
            if($request->hasFile('file_name'))
            {
                if(Storage::disk('students')->exists('attachemnts/library/'.$book->file_name))
                {
                    Storage::disk('students')->delete('attachemnts/library/'.$book->file_name);
                }
                $request->file('file_name')->storeAs('attachemnts/library/' , $request->file_name->getClientOriginalName() , $disk = 'students');
                $valueBookInDB = $request->file_name->getClientOriginalName() ;
            }

            $book->update([
                'title' => $request->title,
                'classroom_id' => $request->class_id ,
                'section_id' => $request->section_id,
                'grade_id' => $request->grade_id ,
                'file_name' => $valueBookInDB ,
                'teacher_id' => $request->teachers_id ,
            ]);
            return redirect()->back()->with(['success' => trans('site.updated')]) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }

    public function destroy($id)
    {
        try {
            $book = Library::findOrfail($id);
            if(Storage::disk('students')->exists('attachemnts/library/'.$book->file_name))
            {
                Storage::disk('students')->delete('attachemnts/library/'.$book->file_name) ;
            }
            $book->delete() ;
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }

    public function downloadBook($id)
    {
        try {
            $book = Library::findOrfail($id) ;
            // return response()->download(public_path('attachemnts/library/'.$book->file_name));
            // return Storage::disk('students')->download('attachemnts/library/'.$book->file_name) ;
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }

    }
}
