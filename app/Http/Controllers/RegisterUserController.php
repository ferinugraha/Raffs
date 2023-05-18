<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile   = Profile::where('id', 1)->first();

        return view('auth.register', compact('profile'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'role'      => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        
        User::create($validateData);
    
        return redirect()->route('registeruser')->with('success','Berhasil Mendaftar !');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()
    {
        try{
            $user       = Socialite::driver('google')->user();
            $finduser   = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::User($finduser);
                return redirect()->intended('List-Menu-Anda');
            }else{
                $newuser = User::create([
                    'name'          => $user->name,
                    'email'         => $user->email,
                    'google_id'     => $user->id,
                    'password'      => bcrypt('123456'),
                    'role'          => 'User',
                ]);
                Auth::login($newuser);
                return redirect()->intended('List-Menu-Anda');
            }
        } catch (\Throwable $th){
            throw $th;
        }
    }
}
