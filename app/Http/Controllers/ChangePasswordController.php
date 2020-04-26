<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('changePassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['required','same:new_password'],
        ],[
        //sobreescribiendo los mensajes de error para no usar los del archivo /lang/es/validation.php...
            'new_password.min' => 'La contraseña nueva debe contener al menos 8 caracteres.',
            'new_confirm_password.same' => 'La confirmación de la contraseña nueva no coincide.'
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route('cambiarcontra') -> with('status','Contraseña cambiada satisfactoriamente');
    }
}
