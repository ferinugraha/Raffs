<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->where('role', 'User')->get();

        return view('pages.admin.user.index' , compact('user')) //compact = membungkus
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function destroy($id)
    {
        $user =  User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','Berhasil Hapus !');
    }

    public function landing_page()
    {
        $menus = DB::table('menu')->get();
        return view('index', compact('menus'));
    }
}
