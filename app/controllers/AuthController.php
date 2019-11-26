<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Models\User;

define('ROLE_USER', 'user');

class AuthController extends BaseController
{


    public function __construct()
    {
        if(isAuthenticated()){
            Redirect::to('/');
        }
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function register()
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            if (CSRFToken::verifyCSRFToken($request->token)) {
                $rules = [
                    'username' => ['required' => true, 'maxLength' => 20, 'mixed' => true, 'unique' => 'users'],
                    'email' => ['required' => true, 'email' => true, 'unique' => 'users'],
                    'password' => ['required' => true, 'minLength' => 6],
                    'full_name' => ['required' => true, 'minLength' => 6, 'maxLength' => 50],
                    'street_address' => ['required' => true, 'minLength' => 4, 'maxLength' => 500, 'mixed' => true]
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if ($validate->hasError()) {
                    $errors = $validate->getErrorMessages();
                    return view('register', ['errors' => $errors]);
                }

                //insert into database
                User::create([
                    'username' => $request->username,
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'password' => password_hash($request->password, PASSWORD_BCRYPT),
                    'street_address' => $request->street_address,
                    'post_code' => $request->post_code,
                    'city_suburb_town' => $request->city_suburb_town,
                    'state_territory' => $request->state_territory,
                    'country' => $request->country,
                    'role' => 'user',
                    'agent' => $_SERVER['HTTP_USER_AGENT'],
                    'ip' => get_client_ip_server(),
                    'geo_status' => getGeoPlugin(get_client_ip_server(), 'status'),
                    'geo_city' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'city') : 'UNKNOWN',
                    'geo_region' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'region') : 'UNKNOWN',
                    'geo_region_code' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'regionCode') : 'UNKNOWN',
                    'geo_region_name' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'regionName') : 'UNKNOWN',
                    'geo_country_code' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'countryCode') : 'UNKNOWN',
                    'geo_country_name' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'countryName') : 'UNKNOWN',
                    'geo_latitude' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'latitude') : 'UNKNOWN',
                    'geo_longitude' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'longitude') : 'UNKNOWN',
                    'geo_timezone' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'timezone') : 'UNKNOWN',
                    'geo_currency_code' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'currencyCode') : 'UNKNOWN',
                    'geo_currency_symbol_utf8' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'currencySymbol_UTF8') : 'UNKNOWN',
                    'geo_currency_converter' => getGeoPlugin(get_client_ip_server(), 'status') === 200 ? getGeoPlugin(get_client_ip_server(), 'currencyConverter') : 'UNKNOWN',
                ]);

                Request::refresh();
                return view('register', ['success' => 'Account created, please login']);
            }
            throw new \Exception('Token Mismatch');
        }
        return null;
    }

    public function login()
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            if (CSRFToken::verifyCSRFToken($request->token)) {
                $rules = [
                    'username' => ['required' => true],
                    'password' => ['required' => true],
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if ($validate->hasError()) {
                    $errors = $validate->getErrorMessages();
                    return view('login', ['errors' => $errors]);
                }

                $user = User::where('username', $request->username)
                    ->orWhere('email', $request->username)->first();

                if ($user) {
                    if (!password_verify($request->password, $user->password)) {
                        Session::add('error', 'Incorrect password');
                        return view('login');
                    } else {
                        Session::add('SESSION_USER_ID', $user->id);
                        Session::add('SESSION_USER_NAME', $user->username);

                        if ($user->role === 'admin') {
                            Redirect::to('/admin');
                        } else if ($user->role === 'user' && Session::has('user_cart')) {
                            Redirect::to('/cart');
                        } else {
                            Redirect::to('/');
                        }
                    }
                } else {
                    Session::add('error', 'User not found, please try again');
                    return view('login');
                }
            }
            throw new \RuntimeException('Token Mismatch');
        }
        return null;
    }

    public function logout()
    {
        if(isAuthenticated()){
            Session::remove('SESSION_USER_ID');
            Session::remove('SESSION_USER_NAME');

            if(!Session::has('user_cart')){
                session_destroy();
                session_regenerate_id(true);
            }
        }
        Redirect::to('/');
    }

}