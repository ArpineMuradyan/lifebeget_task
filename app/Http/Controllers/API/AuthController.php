<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AuthController extends BaseController
{

    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

//            return $this->sendResponse($success, 'User signed in');
//            return view('admin.home');
            return redirect('/admin');
        }
        else{
            return redirect('login')
                ->withErrors(['error'=>'Wrong email or password'])
                ->withInput();
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return redirect('registration')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        return redirect('/admin');
//        return view('admin.home');

//        return $this->sendResponse($success, 'User created successfully.');
    }

    public function logout(){
//        if(Auth::logout()){
        Auth::logout();
            return redirect('login');
//        }

    }

}
