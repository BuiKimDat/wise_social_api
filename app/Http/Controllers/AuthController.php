<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{

    private $apiResponse;

    public function __construct() {
        $this->apiResponse = new ApiResponse();
    }


    public function register(Request $request)
    {
        $param = $request->all();
        if ($param['password'] != $param['re_password']){
            return $this->apiResponse->BadRequest(trans('message.auth.re_password_err'));
        }
        //Check email exit's
        $checkEmail = User::where('email', $param['email'])->first();
        if ($checkEmail) {
            return $this->apiResponse->BadRequest(trans('message.auth.email_already'));
        }
        $user = new User();
        $user->email = $param['email'];
        $user->password = Hash::make( $param['password']);
        $user->name = $param['name'];
        $user->save();
        Mail::to($param['email'])->send(new RegisterMail($param));
        return $this->apiResponse->success();
    }
}
