<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Response;
use Carbon\Carbon;
class UsersController extends Controller
{
    public function test(Request $request, User $User)
        {
            $User = User::all();
            return  response()->json($User);
        }

    public function index(Request $request)
        {
            $User=User::whereNull('deleted_at')                               
                            ->where(function ($q) use ($request){
                                if($request->key){
                                    $q->Where('name', '===', "%{$request->key}%");
                                }
                            })
                               ->whereRoleId($request->role)
                                ->get();
            return response()->json($User);
        }
    public function teachers(Request $request)
        {
            $student=Teacher::whereNull('deleted_at')
                                ->whereRoleId($request->role)
                                ->where(function ($q) use ($request){
                                    if($request->list){
                                        $q->whereDoesntHave('advisories');
                                    }
                                })
                                ->where('name', 'like', "%{$request->key}%")
                                ->get();
            return response()->json($student);
        }
    public function students(Request $request)
            {
                $students=Student::whereNull('deleted_at')
                                    ->whereRoleId($request->role)
                                    ->orderBy('is_male','DESC')
                                    ->where(function ($q) use ($request){
                                        if($request->section_id){
                                            $q->where('section_id', 'like', "%{$request->section_id}%");
                                        }
                                    })
                                    ->where(function ($f) use($request){   
                                        if($request->sy){
                                            $f->where('sy', 'like', "%{$request->sy}%");
                                        }
                                    })
                                    ->where('name', 'like', "%{$request->key}%")
                                    ->get();
                $is_male=$students->where('is_male', 'like', "1")->count();
                $nis_male=$students->where('is_male', 'like', "0")->count();
                return response()->json([$students,$is_male,$nis_male]);
            }
    public function save(Request $request)
    {
        $User=User::create($request->all());
        return Response::json($User, 200);
    }

    public function update(Request $request, User $User)
    {
        $input=$request->all();
        $User->update($input);
        return Response::json($User, 201);
    }

    public function destroy(User $User)
    {
        $User->deleted_at=Carbon::now();
        $User->update();
        return Response::json(array('success'=>true));
    }
}
