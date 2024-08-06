<?php

namespace App\Repositories ;
use App\Interfaces\OnlineClassesRepositoryInterface ;
use App\Models\{OnlineClasses , Grade , Subject };
use MacsiDigital\Zoom\Facades\Zoom;



class OnlineClassesRepository implements OnlineClassesRepositoryInterface
{
    public function index()
    {
        $onlineClasses = OnlineClasses::all() ;
        return view('pages.OnlineClasses.index' , compact('onlineClasses')) ;
    }

    public function create()
    {
        $grades = Grade::get() ;
        $subjects = Subject::all() ;
        return view('pages.OnlineClasses.create' , compact('grades' , 'subjects')) ;
    }

    public function store($request)
    {
        try
        {
            $user = Zoom::user()->first();
            $meetingData = [
                'topic' => $request->topic,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_time' => $request->start_time,
                'timezone' => 'Africa/Cairo'
            ];
            $meeting = Zoom::meeting()->make($meetingData);

            $meeting->settings()->make([
                'join_before_host' => false,
                'host_video' => false,
                'participant_video' => false,
                'mute_upon_entry' => true,
                'waiting_room' => true,
                'approval_type' => config('zoom.approval_type'),
                'audio' => config('zoom.audio'),
                'auto_recording' => config('zoom.auto_recording')
            ]);
                // حفظ الاجتماع للحصول على `id`
            $savedMeeting = $user->meetings()->save($meeting);

            // تحقق من حصولك على `id` الاجتماع
            if (!$savedMeeting) {
                throw new \Exception("Failed to create Zoom meeting.");
            }
            OnlineClasses::create([
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'subject_id' => $request->subject_id,
                'created_by' => auth()->user()->email ,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            return redirect()->route('onlineClasses.index')->with(['success' => trans('site.added')]) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }


    public function destroy($request , $id )
    {
        try {
            // حذف اولا من زوم
            $meeting = Zoom::meeting()->find($request->meeting_id) ;
            $meeting->delete() ;
            // dd($meeting) ;
            // حذف ثانيا من الداتا بيز
            OnlineClasses::findOrfail($id)->delete();
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }
}
