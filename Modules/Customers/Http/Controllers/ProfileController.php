<?php

namespace TypiCMS\Modules\Customers\Http\Controllers;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('customers::public.profile', ['user' => auth()->user()]);
    }

    public function save()
    {

    }

    public function changePassword()
    {

    }
}
