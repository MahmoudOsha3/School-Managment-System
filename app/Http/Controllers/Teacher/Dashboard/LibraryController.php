<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Library , Grade} ;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{

    public function index()
    {
        $books = Library::where('teacher_id' , auth()->user()->id )->get() ;
        return view('pages.Teachers.dashboard.library.index' , compact('books')) ;
    }

    public function create()
    {
        $grades = Grade::all() ;
        return view('pages.Teachers.dashboard.library.create' , compact('grades')) ;
    }

    public function store(Request $request)
    {
        try
        {
            $validate = $request->validate([ 'title' => 'required' ,'file_name' => 'required'  ,'grade_id' => 'required'  ,'class_id' => 'required' ,'section_id' => 'required' ]) ;
            if ($request->hasFile('file_name'))
            {
                $request->file('file_name')->storeAs('attachemnts/library/' , $request->file_name->getClientOriginalName() , $disk = 'students') ;
            }
            Library::create([
                'title' => $request->title ,
                'file_name' => $request->file_name->getClientOriginalName(),
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->class_id ,
                'section_id' => $request->section_id,
                'teacher_id' => auth()->user()->id ,
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
            return view('pages.Teachers.dashboard.Library.edit' , compact('grades', 'book')) ;
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $validate = $request->validate([ 'title' => 'required' ,'file_name' => 'required'  ,'grade_id' => 'required'  ,'class_id' => 'required' ,'section_id' => 'required' ]) ;
            $book = Library::findorfail($id) ;
            $valueBookInDB = $book->file_name ;

            if ($request->hasFile('file_name'))
            {
                // لو ملف موجود امسحة و حط الجديد
                if(Storage::disk('students')->exists('attachemnts/library/'.$book->file_name))
                {
                    Storage::disk('students')->delete('attachemnts/library/'.$book->file_name) ;
                }
                $request->file('file_name')->storeAs('attachemnts/library/' , $request->file_name->getClientOriginalName() , $disk = 'students') ;
                $valueBookInDB = $request->file_name->getClientOriginalName() ;
            }
            $book->update([
                'title' => $request->title ,
                'file_name' => $valueBookInDB,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->class_id ,
                'section_id' => $request->section_id,
                'teacher_id' => auth()->user()->id ,
            ]);
            return redirect()->back()->with(['success' => trans('site.added')]) ;
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
