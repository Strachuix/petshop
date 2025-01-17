<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Wyświetla formularz logowania
    public function loginForm()
    {
        return view('login');
    }

    // Wyświetla formularz rejestracji
    public function registration()
    {
        return view('registration');
    }

    // Obsługuje logowanie
    public function loginPost(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:8',
        ]);

        // Przygotowanie danych użytkownika
        $userData = [
            "username" => $request->get('login'),
            "password" => $request->get('password'),
        ];

        // Wysyłanie danych do API
        $response = Http::post('https://petstore.swagger.io/v2/user/login', $userData);

        // Obsługa odpowiedzi
        if ($response->successful()) {
            return 'User logged in successfully!';
        } else {
            return 'Failed to log in: ' . $response->body();
        }
    }

    // Obsługuje rejestrację
    public function registrationPost(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'login' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',  // Dodanie minimalnej długości hasła
        ]);

        // Przygotowanie danych użytkownika
        $userData = [
            "id" => 0,
            "username" => $request->get('login'),
            "firstName" => $request->get('firstName'),
            "lastName" => $request->get('lastName'),
            "email" => $request->get('email'),
            "password" => $request->get('password'),
            "phone" => "",
            "userStatus" => 0,
        ];

        // Wysyłanie danych do API
        $response = Http::post('https://petstore.swagger.io/v2/user', $userData);

        // Obsługa odpowiedzi
        if ($response->successful()) {
            return 'User registered successfully!';
        } else {
            return 'Failed to register: ' . $response->body();
        }
    }
}
