<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
// use validator;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // protected function validator(Request $request)
    // {
    //     return Validator::make($request->all(), [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.$table],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // $this->validator($request->all())->validate();
        // $user = $this->create($request->all());
        // event(new Registered($user));
        // Auth::login($user);
        // $this->guard()->login($user);
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // UserVerification::generate($user);
        // UserVerification::send($user, 'My Custom E-mail Subject');
        // return $this->registered($request, $user)
        //     ?: redirect($this->redirectPath());
        event(new Registered($user));

        Auth::login($user);




       







        return redirect(RouteServiceProvider::HOME);
    }
}
