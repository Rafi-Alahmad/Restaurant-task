<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    //
    public function update(Request $request)
    {
        # code...
        Validator::make($request->all(), [
            "motto" => ['max:300'],
            "logo" => ['file', 'nullable', 'max:512'],
            "name" => ['requierd', 'max:50'],
        ]);
        $user = User::find(Auth::guard()->user()->id);
        $user->motto = $request->motto;
        $user->name = $request->name;
        if (isset($request->logo)) {
            $logo_path = $request->file('logo')->store('logos');
            $user->logo = $logo_path;
        }
        
        $user->save();
        dd($request->all());
    }

    public function index()
    {
        return view('settings');
    }
}
