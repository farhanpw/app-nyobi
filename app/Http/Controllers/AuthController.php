<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $token = Auth::guard('api')->attempt($credentials);
            return response()->json([
                'success' => true,
                'message' => 'login berhasil',
                'token' => $token
            ]);
            // make repeat session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                $token = Auth::guard('api')->attempt($credentials);
                return response()->json([
                    'success' => true,
                    'message' => 'login berhasil',
                    'token' => $token,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'email atau password salah',
                ]);

                // if user admin
                return redirect()->intended('/Dashboard');
            } else {
                $token = Auth::guard('api')->attempt($credentials);
                return response()->json([
                    'success' => true,
                    'message' => 'login berhasil',
                    'token' => $token,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'email atau password salah',
                ]);

                // if user member
                return redirect()->intended('/');
            }

            return response()->json([
                'success' => false,
                'message' => 'email atau password salah'
            ]);
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        // Auth::guard('webmember')->logout();
        // Session::flush();

        // return redirect('/');
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|same:konfirmasi_password',
            'konfirmasi_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            Session::flash('errors', $validator->errors()->toArray());
            return redirect('/register');
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        unset($input['konfirmasi_password']);
        User::create($input);

        Session::flash('success', 'Account succescfully created!');
        return redirect('/login');
    }



    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth()->factory()->getTTL() * 60
    //     ]);
    // }

}
