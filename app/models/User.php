<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
        'street_address',
        'post_code',
        'city_suburb_town',
        'state_territory',
        'country',
        'role',
        'agent',
        'ip',
        'geo_status',
        'geo_city',
        'geo_region',
        'geo_region_code',
        'geo_region_name',
        'geo_country_code',
        'geo_country_name',
        'geo_latitude',
        'geo_longitude',
        'geo_timezone',
        'geo_currency_code',
        'geo_currency_symbol_utf8',
        'geo_currency_converter'];
    protected $dates = ['createdAt', 'updatedAt', 'deleted_at'];
    protected $hidden = ['password', 'deleted_at'];

    public function transform($data)
    {
        $users = [];
        foreach ($data as $item) {
            $created_at = new Carbon($item->created_at);
            $updated_at = new Carbon($item->updated_at);
            $users[] = [
                'id' => $item->id,
                'username' => $item->username,
                'full_name' => $item->full_name,
                'email' => $item->email,
                'password' => $item->password,
                'street_address' => $item->street_address,
                'post_code' => $item->post_code,
                'city_suburb_town' => $item->city_suburb_town,
                'state_territory' => $item->state_territory,
                'country' => $item->country,
                'role' => $item->role,
                'created_at' => $created_at->toDateTimeString(),
                'updated_at' => $updated_at->toDateTimeString()
            ];
        }
        return $users;
    }

}

