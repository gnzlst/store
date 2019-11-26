<?php

namespace App\Controllers\Admin;

use App\classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Role;
use App\classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;

class UserController extends BaseController
{
    public $table_name = 'users';
    public $users;
    public $links;

    public function __construct()
    {
        if (!Role::middleware('admin')) {
            Redirect::to('/login');
        }

        $total = User::all()->count();
        $object = new User;

        list($this->users, $this->links) = paginate(10, $total, $this->table_name, $object);
    }

    public function show()
    {
        return view('admin/users/users', [
            'users' => $this->users, 'links' => $this->links
        ]);
    }

    public function register()
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            $extra_errors = [];

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

                $duplicated_username = User::where('username', $request->username)->exists();

                if ($duplicated_username) {
                    $extra_errors['name'] = array('Username already exists');
                }

                $duplicated_email = User::where('email', $request->email)->exists();

                if ($duplicated_email) {
                    $extra_errors['email'] = array('Email already exists');
                }

                if ($validate->hasError() /*|| $duplicated_username || !$duplicated_email*/) {
                    $errors = $validate->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
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
                    'role' => $request->administrator ? 'admin' : 'user',
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

                echo json_encode(['success' => 'Account created successfully']);
                exit;
            }
            throw new \Exception('Token Mismatch');
        }
        return null;
    }

}