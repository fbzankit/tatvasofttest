<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('welcome',['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'startDate' => 'required',
            'endDate' => 'required',
            'repeatType' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back();
        }
        // dd($request);
        $event = new Events();
        $event->title = $request->title;
        $event->startDate = $request->startDate;
        $event->endDate = $request->endDate;
        $event->repeatType = $request->repeatType;
        
        $event->type = $request->type;
        $event->gap = $request->gap;
        $event->day = $request->day;

        if($request->repeatType == '2'){
            $event->type = $request->type2;
            $event->gap = $request->gap2;
        }
        // dd($event);

        if($event->save()){
            session()->put('success','Event Saved Successfuly!');
            return redirect('/');
        }else{
            session()->put('error','Event not Saved!');
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Events::where('id',$id)->first();
        // dd($event);
        return view('viewEvent',['event'=>$event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::where('id',$id)->first();
        return view('addEvent',['event'=>$event]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::where('id',$id)->delete();

        if($event){
            session()->put('success','Event Deleted Successfuly!');
            return redirect()->back();
        }else{
            session()->put('error','Event not Deleted!');
            return redirect()->back();
        }
    }
}
