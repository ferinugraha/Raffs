<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->wherein('role', ['Admin','Kasir'])->get();

        return view('pages.admin.register.index' , compact('user')) //compact = membungkus
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.register.create');
    }

    public function view()
    {
        return view('pages.admin.register.view');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    
        return redirect()->route('register.index')->with('success','Berhasil Menyimpan !');
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
        $user = User::findOrFail($id);
        return view('pages.admin.register.edit',compact('user'));
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
        $validateData = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required|min:4',
            'role'      => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        
        $user = User::findOrFail($id);
        $user->update($validateData);
    
        return redirect()->route('register.index')->with('success','Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user       =  User::find($id);
        $user->delete();
        return redirect()->route('register.index')->with('success','Berhasil Hapus!');
    }

    
}
