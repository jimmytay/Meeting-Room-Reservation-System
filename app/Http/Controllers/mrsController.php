<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Carbon\Carbon;
use DateTime;


class mrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('mrs');
        $events = [];
                $data = Event::all();
                if($data->count()) {
                    foreach ($data as $key => $value) {
                        $events[] = Calendar::event(
                            $value->event_title,
                            false,
                            new \DateTime($value->start_time),
                            new \DateTime($value->end_time),
                            null,
                            // Add color and link on event
                         [
                             'color' => '#ff0000',
                             'url' => 'mrs/show',
                         ]
                        );
                    }
                }
                $calendar = Calendar::addEvents($events)->setOptions([
        'firstDay' => 1
    ])->setCallbacks([
        'eventClick' => 'function() {

        }'
    ]);

;
                return view('mrs.fullcalendar', compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mrs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //return $request->all();
      $request->validate([
    'event_title' => 'required',
    'room_no' => 'required',
    'start_time' => 'required',
    'end_time' => 'required',
    'description' => 'required',
    'participant_no' => 'required',
    'object' => 'required',
    'remark' => 'required',
]);


        $events = new Event;
        $events->event_title = $request->event_title;
        $events->room_no = $request->room_no;
        $events->start_time = date('Y-m-d H:i:s', strtotime($request->start_time));
        $events->end_time = date('Y-m-d H:i:s', strtotime($request->end_time));
        //$events->start_time = $request->start_time;
        //$events->end_time = $request->end_time;
        $events->description = $request->description;
        $events->participant_no = $request->participant_no;
        $events->object = implode(",",$request->object);
        $events->remark = $request->remark;

        $events->save();
        //return redirect()->back();
        return redirect('mrs');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $events = Event::all();
      return view('mrs.show')->with('events',$events);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id);
        return view('mrs.edit',compact('events','id'));
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
        $events = Event::find($id);
        $events->event_title = $request->event_title;
        $events->room_no = $request->room_no;
        $events->start_time = date('Y-m-d H:i:s', strtotime($request->start_time));
        $events->end_time = date('Y-m-d H:i:s', strtotime($request->end_time));
        $events->description = $request->description;
        $events->participant_no = $request->participant_no;
        $events->object = implode(",",$request->object);
        $events->remark = $request->remark;
        $events->save();
        return redirect('mrs')->with('message','Selected data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);
        $events->delete();

        return redirect('mrs')->with('message','Selected data deleted!');
    }
    /*public function showById($id)
    {
        $events = Event::find($id);
        return view('mrs.showById',compact('events','id'));
    }*/







}
