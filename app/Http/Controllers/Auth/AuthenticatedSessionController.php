<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $matricula=$request->matricula;
        $senha=$request->senha;
        
        $user = \DB::table('users')->where('matricula','=',$matricula)->get();

        if(sizeof($user) != 0){

            foreach($user as $u){
                $user =User::find($u->id); 
            }

            if(($matricula==$user->matricula)&&(Hash::check($senha,$user->password))==true){

                $request->session()->regenerate();
                
                Auth::login($user);

                return redirect()->intended('dashboard');
            }
        }
 
        return back()->withErrors([
            'email' => 'Dados inválidos.',
        ])->onlyInput('email');
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/logar');
    }
}
