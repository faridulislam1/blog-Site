<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
//use MongoDB\Driver\Session;

class customer extends Model
{
    use HasFactory;
    private static $customer;
    public static function saveCustomer($request){
        self::$customer = new customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->phone = $request->phone;
        self::$customer->password = bcrypt($request->password);
        self::$customer->save();

        Session::put('customerId',self::$customer->id);
        Session::put('customerName',self::$customer->name);
    }
}
