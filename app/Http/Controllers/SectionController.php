<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Response;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function list()
    {
        // return "dasd";
      $section = Section::whereNull('deleted_at')->get();
      return  response()->json($section);
    }
  
      public function index(Request $request)
      {
          $section=Section::whereNull('deleted_at')
                             ->where('name', 'like', "%{$request->key}%")
                              ->get();
          return response()->json($section);
      }
  
      public function save(Request $request)
      {
          $section=Section::create($request->all());
          return Response::json($section, 200);
      }
  
      public function update(Request $request, Section $section)
      {
          $input=$request->all();
          $section->update($input);
          return Response::json($section, 201);
      }
  
      public function destroy(Section $section)
      {
          $section->deleted_at=now();
          $section->update();
          return Response::json(array('success'=>true));
      }
}
