<?php

namespace TypiCMS\Modules\Customers\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use TypiCMS\Modules\Customers\Http\Requests\PasswordChangeFormRequest;
use TypiCMS\Modules\Customers\Http\Requests\ProfileFormRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('customers::public.profile', ['user' => auth()->user()]);
    }

    public function save(ProfileFormRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());
        return back()->with('success', __('Profile is updated'));
    }

    public function changePassword(PasswordChangeFormRequest $request)
    {
        $user = auth()->user();
        if(!Hash::check($request->get('old_password'), $user->password)) {
            throw ValidationException::withMessages(['old_password' => [__('Old Password is incorrect')]]);
        }

        $user->password = Hash::make($request->get('password'));
        $user->save();
        return back()->with('success', __('Password is updated'));
    }
}
