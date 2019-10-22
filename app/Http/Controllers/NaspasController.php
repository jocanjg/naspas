<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Animal;
class NaspasController extends Controller
{
      public function index(){
        $animals = DB::table('animals')->orderByRaw('id DESC')
        ->leftJoin('locations', 'animals.location_id', '=', 'locations.id')
        ->select('animals.*', 'animals.dname as dname', 'animals.pname as pname', 'animals.address as address', 'location as location_id', 'animals.age as age','animals.gender as gender','animals.tezina as tezina')
        ->paginate(200);
        return view('naspas',['animals'=>$animals]);

      }
      public function pretraga(){
        $animals = DB::table('animals')->orderByRaw('id DESC')
        ->leftJoin('locations', 'animals.location_id', '=', 'locations.id')
        ->select('animals.*', 'animals.dname as dname', 'animals.pname as pname', 'animals.address as address', 'location as location_id', 'animals.age as age','animals.gender as gender','animals.tezina as tezina')
        ->paginate(200);
        return view('pretraga',['animals'=>$animals]);

      }
}
