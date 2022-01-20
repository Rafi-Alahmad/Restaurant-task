<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            "motto" => ['max:300'],
            "logo" => ['file', 'nullable', 'max:512'],
            "name" => ['required', 'max:50'],
        ])->validate();
        $user = User::find(Auth::guard()->user()->id);
        $user->motto = $request->motto;
        $user->name = $request->name;
        if (isset($request->logo)) {
            $logo_path = $request->file('logo')->store('logos');
            $user->logo = $logo_path;
        }
        
        $user->save();

        return back()->with('success', trans('app.success_update_msg'));

    }

    public function index()
    {
        return view('settings');
    }
}
