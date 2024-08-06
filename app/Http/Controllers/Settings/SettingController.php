<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting ;
use Storage ;

class SettingController extends Controller
{

    public function index()
    {
        $collection = Setting::all() ;
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        $settings = $setting['setting'] ;
        return view('pages.Settings.index' , compact('settings'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $data = $request->except('_token' , '_method') ;
            foreach ($data as $key => $value)
            {
                // echo $key .' => '. $value . "<br>";
                Setting::where('key' , $key )->update(['value' => $value ]);
            }
            if ($request->hasFile('logo'))
            {
                $nameLogo = $request->logo->getClientOriginalName();
                $logo_old = Setting::where('key' , 'logo')->pluck('value');
                if(Storage::disk('students')->exists('attachemnts/logo/'.$logo_old[0]))
                {
                    Storage::disk('students')->delete('attachemnts/logo/'.$logo_old[0]) ;
                }
                $new_logo = $request->file('logo')->storeAs('attachemnts/logo' , $nameLogo ,$disk ='students') ;
                Setting::where('key' , 'logo')->update(['value' => $nameLogo ]) ;
            }
            return redirect()->back()->with(['success' , trans('site.updated')]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
