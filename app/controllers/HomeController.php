<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showWelcome()
    {
        return View::make('hello');
    }

    public function showLogin(){
        return View::make('login');

    }

    public function doLogin()
    {

        // process the form
        $rules = array(
            'email' => 'required|email', // make sure an actual email is set
            'password' => 'required|alphanum|min:3' // password must be alpha numetric and to be greater than 3
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        // if validator fails, redirect back to the form

        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );
            // attempt to do login
            if (Auth::attempt($userdata)) {

                echo 'SUCCESS';
            } else {
                return Redirect::to('login');
            }

        }
    }

}
