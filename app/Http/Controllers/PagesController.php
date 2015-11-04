<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
     return view('pages.about');   //
    }
    
    public function retreat()
    {
     return view('pages.retreat');   //
    }
    
    public function reservation()
    {
     return view('pages.reservation');   //
    }
    public function room()
    {
     return view('pages.room');   //
    }
   public function housekeeping()
    {
     return view('pages.housekeeping');   //
    }
    public function maintenance()
    {
     return view('pages.maintenance');   //
    }
    
    public function grounds()
    {
     return view('pages.grounds');   //
    }
    public function kitchen()
    {
     return view('pages.kitchen');   //
    }
    public function donation()
    {
     return view('pages.donation');   //
    }
    public function bookstore()
    {
     return view('pages.bookstore');   //
    }
    public function user()
    {
     return view('pages.user');   //
    }
    public function support()
    {
     return view('pages.support');   //
    }
    public function welcome()
    {
     return view('welcome');   //
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }
}
