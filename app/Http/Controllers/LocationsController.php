<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Location;


class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $locations = Location::all();
        return view('locations.index')->with('locations', $locations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $location = new Location;

        $location->location = $request->location;
        $location->save();

        Session::flash('success','Your todo was created!');
        return redirect()->back();
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
      $location = Location::find($id);
    // Redirect to division list if updating division wasn't existed
    // if ($location == null || count($location) == 0) {
    //     return redirect()->intended('/locations');
    // }

    return view('locations/edit', ['location' => $location]);
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
      // $location = Location::findOrFail($id);
      // $this->validateInput($request);
      // $input = [
      //     'location' => $request['location']
      // ];
      // Location::where('id', $id)
      //     ->update($input);
      //
      // return redirect()->intended('locations');

      $location = Location::find($id);

        $location->location = $request->location;
        $location->save();

        Session::flash('success','Your location was updated!');
        return redirect()->intended('/locations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Location::where('id', $id)->delete();
      // return redirect()->intended('dashboard');


        $location = Location::find($id);
        $location->delete();

        Session::flash('success','Your location was deleted!');
        return redirect()->back();

    }

    private function validateInput($request) {
    $this->validate($request, [
    'location' => 'required|max:60|unique:location'
      ]);
    }


}
