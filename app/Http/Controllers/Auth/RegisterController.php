<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function validatePassword($password) {
        $validator = Validator::make(
            ['password' => $password],
            ['password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/']
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                echo "<script>alert('$error');</script>";
            }
            return false;
        }

        return true;
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                echo "<script>alert('$error');</script>";
            }
            return false;
        }

        // Se la validazione è passata, salva l'utente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Esegui il login dell'utente appena registrato
        Auth::login($user);

        // Effettua il redirect alla homepage
        return redirect()->route('home'); // Assicurati che esista una route chiamata 'home'
    }
}

