<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Input;

class RetreatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $retreats = \App\Retreat::all();
        // var_dump($retreats);
        return view('retreats.index',compact('retreats'));   //
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // var_dump($retreats);
        return view('retreats.create');   //
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
        $ret = \App\Retreat::find($id);
       return view('retreats.edit',compact('ret'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    //{
    //   $retreats = \App\Retreat::();
    //   return view('retreats.edit',compact('retreats'));
    //  }
public function edit($id)
    { $ret = \App\Retreat::find($id);
       return view('retreats.edit',compact('ret'));
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
       \App\Retreat::destroy($id);
       return Redirect::action('RetreatsController@index');
       //
    }
    public function saveCreate()
    {
        $input = Input::all();
        $retreat = new \App\Retreat;
        $retreat->idnumber = $input['idnumber'];
        $retreat->title = $input['title'];
        $retreat->description = $input['description'];
        $retreat->start = $input['start'];
        $retreat->end = $input['end'];
        $retreat->type = $input['type'];
        $retreat->silent = $input['silent'];
        $retreat->amount = $input['amount'];
        $retreat->year = $input['year'];
        $retreat->directorid = $input['directorid'];
        $retreat->innkeeperid = $input['innkeeperid'];
        $retreat->assistantid = $input['assistantid'];
        $retreat->save();
        
    return Redirect::action('RetreatsController@index');
    }
}
