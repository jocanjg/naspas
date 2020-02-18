<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Animal;
use App\Reason;
use App\Location;
use App\Nacin;
use App\User;
use App\Box;
use App\Sort;
use App\Status;
use Session;
use Auth;
use PDF;



class AnimalController extends Controller
{
  private   $total;
  /**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware('auth');

}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $count = DB::table('animals')->count();
      $users = Auth::id();

      $udomljen = DB::table('animals')->whereRaw('vfirstname <> ""')->get()->count();
      $cnvr = DB::table('animals')->whereRaw('status_id = 1')->get()->count();
      $count = DB::table('animals')->count();



    $animals = DB::table('animals')->whereNull('status_id')->orderByRaw('id DESC')
      ->leftJoin('locations', 'animals.location_id', '=', 'locations.id')
      ->select('animals.*', 'animals.dname as dname', 'animals.pname as pname', 'animals.address as address', 'location as location_id', 'text as text')
      ->paginate(5);

      return view('animals/index', ['animals' => $animals, 'count' => $count, 'users' => $users]);
    }


    public function dashboard(){

      $udomljen = DB::table('animals')->whereRaw('vfirstname <> ""')->get()->count();
      $cnvr = DB::table('animals')->whereRaw('status_id = 1')->get()->count();
      $count = DB::table('animals')->count();
      $this->total = $count - $cnvr - $udomljen;
      $cusers = DB::table('users')->count();
      $users = User::paginate(5);
      $animals = DB::table('animals')->orderByRaw('id DESC')
      ->leftJoin('locations', 'animals.location_id', '=', 'locations.id')
      ->select('animals.*', 'animals.dname as dname', 'animals.pname as pname', 'animals.address as address', 'location as location_id')
      ->paginate(10);
      $capacitet = 200;
      $rez= ($this->total * 100) / $capacitet;
      $totals = $this->total;
      return view('dashboard', ['count' => $count, 'animals' => $animals, 'cusers' => $cusers, 'users' => $users, 'rez' => $rez, 'udomljen' => $udomljen, 'cnvr' =>$cnvr, 'totals'=>$totals]);

    }

    public function udomljen()
    {
      $udomljeni = DB::table('animals')->whereRaw('vfirstname <> ""')->get();
      return view('animals.adopted', ['udomljeni' => $udomljeni]);
    }
    public function cnvr()
    {
      $pusteni = DB::table('animals')->whereRaw('status_id = 1')->get();
      return view('animals.cnvr', ['pusteni' => $pusteni]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $sorts = Sort::all();
      $boxes = Box::all();
      $nacins = Nacin::all();
      $reasons = Reason::all();
      $locations = Location::all();
      $statuses = Status::all();
        // return view('animals.create')->with('locations', $locations);
        return view('animals/create', ['locations' => $locations, 'reasons'=>$reasons, 'nacins' => $nacins,'boxes' => $boxes, 'sorts' =>$sorts, 'statuses' => $statuses]);
    }

    public function adopted()
    {
      $animal = Animal::all();
      return view('animals/adopted',['animal' => $animal]);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateInput($request);
        // Upload image
        $path = $request->file('picture')->store('avatars');
        $keys = ['pname', 'dname',  'address', 'location_id', 'chip', 'age', 'date', 'reason_id', 'nacin_id', 'text', 'sort','size','box','gender','hirurg','tezina','datein','status_id'];
        $input = $this->createQueryInput($keys, $request);
        $input['picture'] = $path;
        // Not implement yet
        // $input['company_id'] = 0;
        Animal::create($input);

        return redirect()->intended('/animals');

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
      $boxes = Box::all();
      $animal = Animal::find($id);
      $nacins = Nacin::all();
      $sorts = Sort::all();
      $locations = Location::all();
      $reasons = Reason::all();
      $statuses = Status::all();


      return view('animals/edit', ['animal' => $animal,'locations' => $locations, 'reasons'=>$reasons, 'nacins' => $nacins, 'sorts' => $sorts, 'boxes' => $boxes, 'statuses' => $statuses]);
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
      $animals = Animal::findOrFail($id);
      $this->validateInput($request);
      // Upload image
      $keys = ['pname', 'dname',  'address', 'location_id', 'chip', 'age', 'date', 'reason_id', 'nacin_id', 'status_id', 'text','sort','size', 'box', 'gender', 'hirurg', 'tezina', 'datein', 'vfirstname', 'vlastname', 'vaddress', 'idcard', 'tel','udomljen'];
      $input = $this->createQueryInput($keys, $request);
        if ($request->file('picture')) {
          $path = $request->file('picture')->store('avatars');
          $input['picture'] = $path;
        }

      Animal::where('id', $id)
          ->update($input);

      return redirect()->intended('/animals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Animal::where('id', $id)->delete();
       return redirect()->intended('/animals');
    }

    private function validateInput($request) {
      $this->validate($request, [
          'pname' => 'required|max:60',
          'dname' => 'required|max:60',
          'address' => 'required|max:120',
          'location_id' => 'required',
          'chip' => 'required|max:40',
          'age' => 'required',
          'date' => 'required',
          'text' => 'required'
      ]);
  }

  private function createQueryInput($keys, $request) {
      $queryInput = [];
      for($i = 0; $i < sizeof($keys); $i++) {
          $key = $keys[$i];
          $queryInput[$key] = $request[$key];
      }

      return $queryInput;
  }

  public function search(Request $request) {
      $constraints = [
          'chip' => $request['chip']
          ];
          $users = Auth::id();
     $animals = $this->doSearchingQuery($constraints);
     return view('animals/index', ['animals' => $animals, 'searchingVals' => $constraints, 'users' =>$users]);
  }

  private function doSearchingQuery($constraints) {
      $query = Animal::query();
      $fields = array_keys($constraints);
      $index = 0;
      foreach ($constraints as $constraint) {
          if ($constraint != null) {
              $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
          }

          $index++;
      }
      return $query->paginate(5);
  }

  public function exportPDF(Request $request, $id) {
    $animals = Animal::find($id);
    $pdf = PDF::loadView('report/pdf0', ['animals' => $animals, 'id' => $id]);
    return $pdf->download('Profil.pdf');
    // return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
}

public function izvestajPDF(Request $request, $id) {
  $animals = Animal::find($id);
  $izvestaj = PDF::loadView('report/izvestaj', ['animals' => $animals, 'id' => $id]);
  return $izvestaj->download('Profil.pdf');
  // return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
}

// private function getExportingData($id) {
//     return DB::table('animals')
//     ->select('animals.pname', 'animals.dname',
//     'animals.age', 'animals.chip', 'animals.location_id', 'animals.address', 'animals.hirurg')
//     ->get()
//     ->map(function ($item, $key) {
//     return (array) $item;
//     })
//     ->all();
// }

}
