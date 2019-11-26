<?php

use Philo\Blade\Blade;
use Illuminate\Database\Capsule\Manager as Capsule;
use voku\helper\Paginator;
use App\classes\Session;
use App\Models\User;

function view($path, array $data = [])
{
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';
    $blade = new Blade($view, $cache);
    echo $blade->view()->make($path, $data)->render();
}

function make($filename, $data)
{
    extract($data);
    ob_start();
    include(__DIR__ . '/../../resources/views/emails/' . $filename . '.php');
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

function slug($value)
{
    $value = preg_replace('![^' . preg_quote('_') . '\pL\pN\s]+!u', '', mb_strtolower($value));
    $value = preg_replace('![' . preg_quote('-') . '\s]+!u', '-', mb_strtolower($value));
    return trim($value, '-');

}

function paginate($num_of_records, $total_record, $table_name, $object)
{
    $pages = new Paginator($num_of_records, 'p');
    $pages->set_total($total_record);

    $data = Capsule::select("SELECT * FROM $table_name WHERE deleted_at is null ORDER BY created_at DESC" . $pages->get_limit());

    $response = $object->transform($data);

    return [$response, $pages->page_links()];
}

function get_client_ip_server()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

function getGeoPlugin($ip, $plugin)
{
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip=' . $ip);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    switch ($plugin) {
        case 'status':
            return $jsonData->geoplugin_status;
            break;
        case 'city':
            return $jsonData->geoplugin_city;
            break;
        case 'region':
            return $jsonData->geoplugin_region;
            break;
        case 'regionCode':
            return $jsonData->geoplugin_regionCode;
            break;
        case 'regionName':
            return $jsonData->geoplugin_regionName;
            break;
        case 'countryCode':
            return $jsonData->geoplugin_countryCode;
            break;
        case 'countryName':
            return $jsonData->geoplugin_countryName;
            break;
        case 'latitude':
            return $jsonData->geoplugin_latitude;
            break;
        case 'longitude':
            return $jsonData->geoplugin_longitude;
            break;
        case 'timezone':
            return $jsonData->geoplugin_timezone;
            break;
        case 'currencyCode':
            return $jsonData->geoplugin_currencyCode;
            break;
        case 'currencySymbol_UTF8':
            return $jsonData->geoplugin_currencySymbol_UTF8;
            break;
        case 'currencyConverter':
            return $jsonData->geoplugin_currencyConverter;
            break;
    }

}

function auto_copyright($year = 'auto')
{
    $copyright = '';
    if ($year == 'auto') {
        $copyright = date('Y');
    } else if ((int)$year == date('Y')) {
        $copyright = date('Y');
    } else if ((int)$year < date('Y')) {
        $copyright = (int)$year . ' - ' . date('Y');
    } else if ((int)$year > date('Y')) {
        $copyright = date('Y');
    }
    return $copyright;
}

function asDollars($value)
{
    return '$' . number_format($value, 2);
}

function isAuthenticated()
{
    return Session::has('SESSION_USER_NAME') ? true : false;
}

function user()
{
    if (isAuthenticated()) {
        return User::findOrFail(Session::get('SESSION_USER_ID'));
    }
    return false;
}

function convertMoneyToCents($value)
{
    $value = preg_replace('/\,/i', '', $value);
    $value = preg_replace('/([^0-9\.\-])/i', '', $value);

    if (!is_numeric($value)) {
        return 0.00;
    }

    $value = (float)$value;

    return round($value, 2) * 100;
}