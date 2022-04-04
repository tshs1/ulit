<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lrn' => ['required', 'string', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $h2 =$data['height']*$data['height'];
            $bmi=$data['weight']/$h2;
            $total= substr($bmi, 0, 5);

        $body =floatval($total);
        $todo =null;
        $year=date("Y");
        $sy= $year.'-'.$year+1;
        if ($body<=18.5) {
            $todo=  "Underweight-Frequent meals
            Eat more small meals during the day than large meals
            Eat nutrient -rich foods
             For extra nutrition along with a healthy diet
            Drink more fluids
            Sip a higher calorie drink with a meal or snack
            Exercise
             It helps to gain weight by building muscles and increasing appetite";
        }elseif ($body>=18.6||$body<=24.9) {
            $todo=  "Normal-Choose foods that have a lot of nutrients but not a lot of calories. NIA has information to help you make healthy food choices and shop for food that’s good for you.
            Limit portion size to control calorie intake.
            Add healthy snacks during the day if you want to gain weight.
            Be as physically active as you can be.";
        }elseif ($body>=25||$body<=29.9) {
            $todo = "Overweight-One way to help reduce weight quickly is to cut back on sugar and starches or carbohydrates.This  could be with a flow carb eating plan or by reducing refined carbs and replacing them with whole grains.Aim to include a variety of foods at each meal to balance your plate and help you lose weight your meals should include
            -a protein source
            -fat source
            -vegetables
            -a small portion complex Carbohydrate such as a whole grain";
        }elseif ($body>=30) {
            $todo = "Obese-One way to help reduce weight quickly is to cut back on sugar and starches or carbohydrates.This  could be with a flow carb eating plan or by reducing refined carbs and replacing them with whole grains.Aim to include a variety of foods at each meal to balance your plate and help you lose weight your meals should include
            -a protein source
            -fat source
            -vegetables
            -a small portion complex Carbohydrate such as a whole grain";
        }else {
            $todo= null;
        }
        return User::create([
            'name' => $data['name'],
            'is_male' => $data['is_male'],
            'dob' => $data['dob'],
            'lrn' => $data['lrn'],
            'email' => $data['email'],
            'section_id' => $data['selectUser'],
            'weight' => $data['weight'],
            'height' => $data['height'],
            'todo' => $todo,
            'sy' => $sy,
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
