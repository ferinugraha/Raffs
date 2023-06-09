<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Checkout\CheckoutService as Service;
use App\Models\Profile;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile   = Profile::where('id', 1)->first();

        return view('auth.login', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $data = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];
    //     $user = Auth::attempt($data);
    //     if (!$user) {
    //         return redirect()->back()->with('pesan', 'Email atau password salah..!!');
    //     }

    //     if (Auth::user()->role == 'Admin') {
    //         $request->session()->regenerate();
    //         return redirect()->route('admin.index')->with('success', 'Selamat Datang Admin');
    //     } elseif (Auth::user()->role == 'Kasir') {
    //         $request->session()->regenerate();
    //         return redirect()->route('kasir.index')->with('success', 'Selamat Datang Kasir');
    //     } 
    // }

    public function store(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = Auth::attempt($data);
        if (!$user) {
            return redirect()->back()->with('pesan', 'Email atau password salah..!!');
        }

        if (Auth::user()->role == 'Admin') {
            $request->session()->regenerate();
            return redirect()->route('admin.index')->with('success', 'Selamat Datang Admin');
        } elseif (Auth::user()->role == 'Kasir') {
            $request->session()->regenerate();
            return redirect()->route('kasir.index')->with('success', 'Selamat Datang Kasir');
        } else {
            $request->session()->regenerate();
            return redirect()->route('list-menu-user')->with('success', 'Selamat Datang Pelanggan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Logout berhasil');
    }
}
