<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LoginForm');
    }

     public function registerForm()
    {
        return view('Register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:10',
            'password' => ['required', 'string', Password::min(6)],
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if ($request->username === $request->password) {
            session(['user' => $request->username]);

            return redirect('/login/success');
        }

        return redirect('/login')
            ->withErrors(['login' => 'Username dan password harus memiliki nilai yang sama'])
            ->withInput();
    }

     public function register(Request $request)
    {
        // Validasi input
        $request -> validate([
            'nama' => 'required|max:50',
            'alamat' => 'required|max:300',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|min:3',
            'password' => ['required', 'String', Password::min(6)],
            'confirm_password' => 'required|same:password'
        ], [
            'nama.required' => 'Nama tidak boleh mengandung angka',
            'alamat.max' => 'Alamat maksimal 300 karakter',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid',
            'password.required' => 'Password minimal harus 6 karakter',
            'confirm_password.same' => 'Password dan Confirm Password tidak sama'
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil! Silakan Login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
