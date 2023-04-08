<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Session;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

class customerController extends Controller
{
    public function index(){
        return view('frontEnd.customer.register');
    }

    public function saveCustomer(Request $request){
//        return $request;
        customer::saveCustomer($request);
        return back();
    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return back();
    }

    public function customerLogIn(){
        return view('frontEnd.customer.customer-login');
    }



    public function customerLogInCheck(Request $request){
        $customerInfo = customer::where('email',$request->user_name)
            ->orwhere('phone',$request->user_name)
            ->first();
        if ($customerInfo){
            $existingPassword=$customerInfo->password;
            if (password_verify($request->password,$existingPassword)){

                Session::put('customerId',$customerInfo->id);
                Session::put('customerName',$customerInfo->name);
//                return back();
                return redirect('/'); //direct home page e niye jauar jonno

            }else{
                return back()->with('message','please use valid password');
            }
        }else{
            return back()->with('message','please use email or phone');
        }
    }
}
