<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showlogin()
    {
        return response()->view('auth.login');
    }

    public function login(Request $request)
    {

        $validator = Validator($request->all(),[
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::guard('user')->attempt($credentials, $request->input('remember'))) {
            // if (Auth::guard('admin')->check() || Auth::guard('seller')->check()) {
                if(Auth::user()->type == "admin" || Auth::user()->type == "seller") {
                    return redirect('/dashboards');  // Redirect to the dashboard route for admin or seller
                }
                else {
                    return redirect('/en'); // Redirect to the front for regular users
                }
        } else {
            return response()->json([
                'message' => 'Check Email Or Password, try again'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // public function login(Request $request)
    // {
    //     $validator = Validator($request->all(),[
    //         'email' => 'required|string|email|exists:users,email',
    //         'password' => 'required|string|max:100',
    //     ]);

    //     if (!$validator->fails()) {

    //         $credentials =['email'=> $request->input('email'),'password'=> $request->input('password')];

    //         if(Auth::guard('user')->attempt($credentials, $request->input('remember'))) {
    //             return redirect('/');
    //         } else {
    //             return response()->json(
    //                 ['message'=> 'Check Email Or Password, try again'],
    //                 Response::HTTP_BAD_REQUEST
    //             );
    //         }
    //     } else {
    //         return response()->json(
    //             ['message'=> $validator->getMessageBag()->first()],
    //             Response::HTTP_BAD_REQUEST
    //         );

    //     }
    //     return redirect()->route('complaints.index');

    // }

    public function showRegister()
    {
        return response()->view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10','min:10'],
            'email' => ['required', 'string','email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::min(8)], //->letters()->symbols()->mixedCase()->uncompromised()],
            'password_confirmation'=>'required',

        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name .' '. $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => 'user'
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
         Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect('/en');

        // return response()->route('fornt.home');
    }
}
