<?php

namespace TypiCMS\Modules\Customers\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use TypiCMS\Modules\Core\Models\User;
use TypiCMS\Modules\Customers\Http\Requests\UserRegistrationFormRequest;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(UserRegistrationFormRequest $request): array
    {
        $data = $request->validated();
        unset($data['accept']);

        if (User::where('email', $data['email'])->exists()) {
            throw ValidationException::withMessages(['email' => [__('An account already exists for this email address. Log in or request a new password.')]]);
        }

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        event(new Registered($user));

        return [
           'success' => true,
            'message' => __('Your account has been created, check your email for the verification link.'),
        ];
    }
}
