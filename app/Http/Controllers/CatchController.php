<?php

namespace App\Http\Controllers;
use Session;
use App\Catch;
use Illuminate\Http\Request;

class CatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $catches = Catch::all();
      return view('catch.index')->with('catches', $catches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catch/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $catch = new Catch;

      $catch->name = $request->name;
      $catch->save();

      Session::flash('success','New way of catching was created!');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function show(Reason $reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function edit(Reason $reason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reason $reason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $catches = Catch::find($id);
      $catches->delete();

      Session::flash('success','Way of catching was deleted!');
      return redirect()->back();
    }

    private function validateInput($request) {
      $this->validate($request, [
          'name' => 'required|max:60'
      ]);
  }
}
