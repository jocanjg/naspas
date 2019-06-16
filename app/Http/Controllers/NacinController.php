<?php

namespace App\Http\Controllers;

use Session;
use App\Nacin;
use Illuminate\Http\Request;

class NacinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nacins = Nacin::all();
      return view('nacin.index')->with('nacins', $nacins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nacin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $nacin = new Nacin;

      $nacin->name = $request->name;
      $nacin->save();

      Session::flash('success','Your nacin was created!');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nacin  $nacin
     * @return \Illuminate\Http\Response
     */
    public function show(Nacin $nacin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nacin  $nacin
     * @return \Illuminate\Http\Response
     */
    public function edit(Nacin $nacin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nacin  $nacin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nacin $nacin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nacin  $nacin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $nacin = Nacin::find($id);
      $nacin->delete();

      Session::flash('success','Your nacin was deleted!');
      return redirect()->back();
    }
}
