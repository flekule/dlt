<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('testing', function(){

    $t = Tower::all();

   user::create([
       'firstname' => Input::get('name'),
        'surname' => Input::get('surname'),
        'password' => Input::get('password'),
        'email' => Input::get('email'),
        'IMEI' => Input::get('IMEI'),

    ]);

    dd($t->toJson());
});


//
Route::resource('Towers', 'TowersController');

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users', 'UsersController@index');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');

Route::get('/', function()
{
    return View::make('hello');
});
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses'=>'HomeController@doLogin'));

Route::get('/register',function()
{
    return View::make('register');
});

Route::post('login2', function(){


/**
 * check for POST request
 */
if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];

    // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login
        $email = $_POST['email'];
        $password = $_POST['password'];

        // check for user
        $user = $db->getUserByEmailAndPassword($email, $password);
        if ($user != false) {
            // user found
            $response["error"] = FALSE;

            /*$response["user"]["password"] = $user["password"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["created_at"] = $user["created_at"];
            $response["user"]["updated_at"] = $user["updated_at"];*/
            return json_encode($response);
        } else {
            // user not found
            // return json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect email or password!!";
            return json_encode($response);
        }
    } else if ($tag == 'register') {
        // Request type is Register new user

        $email = $_POST['email'];
        $password =$_POST['password'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $imei = $_POST['imei'];

        // check if user is already existed
        if ($db->isUserExisted($email, $password)) {
            // user is already existed - error response
            $response["error"] = TRUE;
            $response["error_msg"] = "User already existed";
            return json_encode($response);
        } else {
            // store user
            $user = $db->storeUser($firstname, $surname, $email, $password, $imei);
            if ($user) {
                // user stored successfully
                $response["error"] = FALSE;

                /*   $response["user"]["firstname"] = $user["firstname"];
                   $response["user"]["surname"] = $user["surname"];
                   $response["user"]["email"] = $user["email"];

                   $response["user"]["password"] = $user["password"];
                   $response["user"]["imei"] = $user["imei"];
                   $response["user"]["created_at"] = $user["created_at"];
                   $response["user"]["updated_at"] = $user["updated_at"];*/
                return json_encode($response);
            } else {
                // user failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "Error occured in Registration";
                return json_encode($response);
            }
        }
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'login' or 'register'";
        return json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    return json_encode($response);
}

});


Route::get('/location',function()
{

    return View::make('location');
});
Route::post('/register', function(){
   $user = new user;
    $user->firstname= Input::get('firstname');
    $user->surname= Input::get('surname');
    $user->email= Input::get('email');
    $user->password= Input::get('password');
    $user->imei= Input::get('imei');
    $user->save();
    user::create([
        'firstname' => Input::get('name'),
        'surname' => Input::get('surname'),
        'password' => Input::get('password'),
        'email' => Input::get('email'),
        'IMEI' => Input::get('IMEI'),

    ]);
    $theEmail = Input::get('email');
    return View::make('hello')->with('theEmail',$theEmail);


});
Route::get('/signup',function()
{
    return View::make('users.signup');
});

Route::get('/about', function()
{
    return View::make('users.about');
});
Route::get('/contact', function()
{
    return View::make('users.contact');
});



Route::post('contact',function()
{
    $data = Input::all();
    $rules = array(
        'name' => 'required',
        'subject' => 'required',
        'message' => 'required'
    );
    $validator = Validator::make($data, $rules);
    if($validator->fails()) {
        return
            Redirect::to('contact')->withErrors($validator)->withInput();
    }
    return 'Message has been sent. Thank you!';
});


