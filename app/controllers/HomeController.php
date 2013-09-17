<?php

class HomeController extends BaseController {

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

    public function getIndex()
    {
        return View::make('home.index');
    }

    public function getLogin()
    {
        return View::make('home.login');
    }

    public function postLogin()
    {
        $inputs = Input::all();

        $rules = array('email' => 'required', 'password' => 'required');

        $val = Validator::make($inputs, $rules);

        if($val->fails())
        {
            return Redirect::to('login')->withErrors($val);
        }else
        {
            $credentials = array('email' => $inputs['email'], 'password' => $inputs['password']);

            if(Auth::attempt($credentials))
            {
                return Redirect::to('admin');
            }else
            {
                return Redirect::to('login');
            }
        }
    }

    public function getRegister()
    {
        return View::make('home.register');
    }

    public function postRegister()
    {
        $inputs = Input::all();

        $rules = array('username' => 'required|unique:users',
        'email' => 'required|unique:users|email',
        'password' => 'required');

        $val = Validator::make($inputs, $rules);

        if($val->passes())
        {
            $password = $inputs['password'];
            $password = Hash::make($password);

            $user = new User();
            $user->username = $inputs['username'];
            $user->password = $password;
            $user->email = $inputs['email'];
            $user->save();

            return Redirect::to('login');
        }else
        {
            return Redirect::to('register')->withInput()->withErrors($val);
        }

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}