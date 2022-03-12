<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{

    public function index()
    {
        // $calendar = Calendar::all();
        $calendar = Calendar::select('title', 'startTime AS start', 'endTime AS end')->get();
        
        return json_encode( compact('calendar')['calendar'] );
        
        return view('calendar',compact('calendar')); 
        
    }

    public function create()
    {
        return view('calendars.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
       ]);

       $calendar = Calendar::create([ 
            'title' => $request->title, 
            'startTime' => date($request->startTime),
            'endTime' => date($request->endTime)
       ]);

       return redirect("/calendar");

    //    return $this->index();
    }


    public function show($id)
    {
        $calendar= Calendar::find($id); 
        return view('calendars.show',compact('calendars'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
