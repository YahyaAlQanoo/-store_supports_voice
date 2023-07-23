<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::min(3)->letters()->symbols()->mixedCase()->uncompromised()],
            'password_confirmation' => 'required',
            'image' => 'required|image',
            'logo_image' => 'required',
            'cover_image' => 'required',
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_desc' => ['required', 'string', 'max:255'],
        ]);

        $user = new User();
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->name = $request->fname . ' '. $request->lname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->type = "seller";
        $user->password = Hash::make($request->password);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . 'image' . $user->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("user", $image_name, ['disk' => 'public']);
            $user->image = "user/" . $image_name;
        }
        $saved = $user->save();

        if($saved) {
            $authorizableType = 'App\Models\User';
            $authorizableId = $user->id;
            $roleId = 1;
        
            DB::table('role_user')->insert([
                'authorizable_type' => $authorizableType,
                'authorizable_id' => $authorizableId,
                'role_id' => $roleId
            ]);
        
        
        }

        $store = new Store();
        $store->name = $request->shop_name;
        $store->description = $request->shop_desc;
        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $image_name = time() . 'image' . $store->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("store", $image_name, ['disk' => 'public']);
            $store->logo_image = "store/" . $image_name;
        }
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $image_name = time() . 'image' . $store->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("store", $image_name, ['disk' => 'public']);
            $store->cover_image = "store/" . $image_name;
        }
        $store->user_id = $user->id;




        $store->save();

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect('en/login');
    }
}
