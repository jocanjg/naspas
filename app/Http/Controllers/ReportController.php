<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
// use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        date_default_timezone_set('asia/ho_chi_minh');
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime("+30 days"));
        $constraints = [
            'from' => $now,
            'to' => $to
        ];

        $animals = $this->getAnimals($constraints);
        return view('report/index', ['animals' => $animals, 'searchingVals' => $constraints]);
    }


    public function exportPDF(Request $request) {
       $constraints = [
          'from' => $request['from'],
          'to' => $request['to']
      ];
      $animals = $this->getExportingData($constraints);
      $pdf = PDF::loadView('report/pdf', ['animals' => $animals, 'searchingVals' => $constraints]);
      return $pdf->download('report_from_'. $request['from'].'_to_'.$request['to'].'.pdf');
      // return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
  }

  // private function prepareExportingData($request) {
  //     $author = Auth::user()->name;
  //     $animals = $this->getExportingData(['from'=> $request['from'], 'to' => $request['to']]);
  //     return Excel::create('report_from_'. $request['from'].'_to_'.$request['to'], function($excel) use($employees, $request, $author) {
  //
  //     // Set the title
  //     $excel->setTitle('List of hired employees from '. $request['from'].' to '. $request['to']);
  //
  //     // Chain the setters
  //     $excel->setCreator($author)
  //         ->setCompany('HoaDang');
  //
  //     // Call them separately
  //     $excel->setDescription('The list of hired employees');
  //
  //     $excel->sheet('Hired_Employees', function($sheet) use($employees) {
  //
  //     $sheet->fromArray($employees);
  //         });
  //     });
  // }

  public function search(Request $request) {
      $constraints = [
          'from' => $request['from'],
          'to' => $request['to']
      ];

      $animals = $this->getAnimals($constraints);
      return view('report/index', ['animals' => $animals, 'searchingVals' => $constraints]);
  }

  private function getAnimals($constraints) {
      $animals = Animal::where('date', '>=', $constraints['from'])
                      ->where('date', '<=', $constraints['to'])
                      ->get();
      return $animals;
  }

  private function getExportingData($constraints) {
      return DB::table('animals')
      ->select('animals.pname', 'animals.dname',
      'animals.age', 'animals.chip', 'animals.location_id', 'animals.address', 'animals.hirurg')
      ->where('date', '>=', $constraints['from'])
      ->where('date', '<=', $constraints['to'])
      ->get()
      ->map(function ($item, $key) {
      return (array) $item;
      })
      ->all();
  }

}
