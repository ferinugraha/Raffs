<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\file;



class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::latest()->simplePaginate(5); //latest terbaru

        return view('pages.admin.menu.index', compact('menu')) //compact = membungkus
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function menukasir()
    {
        $menu = Menu::latest()->simplePaginate(5); //latest terbaru

        return view('pages.kasir.menu.index', compact('menu')) //compact = membungkus
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.menu.create');
    }

    public function addmenukasir()
    {
        return view('pages.kasir.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu; 
        $menu->product_name = $request->input('product_name');  
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extention;
            $file->move('uploads/produks/', $filename);
            $menu->image = $filename;
        }
        $menu->price = $request->input('price');
        $menu->description = $request->input('description');
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Berhasil Menyimpan!');

    }

    public function storemenukasir(Request $request)
    {
        $menu = new Menu; 
        $menu->product_name = $request->input('product_name');  
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extention;
            $file->move('uploads/produks/', $filename);
            $menu->image = $filename;
        }
        $menu->price = $request->input('price');
        $menu->description = $request->input('description');
        $menu->save();

        return redirect()->route('menu.menukasir')->with('success', 'Berhasil Menyimpan!');

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
        $menu = Menu::find($id);
        return view('pages.admin.menu.edit', compact('menu'));
    }

    public function editmenukasir($id)
    {
        $menu = Menu::find($id);
        return view('pages.kasir.menu.edit', compact('menu'));
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
        $menu               = Menu::find($id);
        $menu->product_name = $request->input('product_name');
        if($request->hasfile('image'))
        {
            $destination    = 'uploads/produks/'.$menu->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file           = $request->file('image');
            $extention      = $file->getClientOriginalExtension();
            $filename       = time().'.'.$extention;
            $file->move('uploads/produks/', $filename);
            $menu->image = $filename;
        }
        $menu->price        = $request->input('price');
        $menu->description  = $request->input('description');
        $menu->update();

        return redirect()->route('menu.index')->with('success', 'Berhasil Update!');

    }

    public function updatemenukasir(Request $request, $id)
    {
        $menu               = Menu::find($id);
        $menu->product_name = $request->input('product_name');
        if($request->hasfile('image'))
        {
            $destination    = 'uploads/produks/'.$menu->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file           = $request->file('image');
            $extention      = $file->getClientOriginalExtension();
            $filename       = time().'.'.$extention;
            $file->move('uploads/produks/', $filename);
            $menu->image    = $filename;
        }
        $menu->price        = $request->input('price');
        $menu->description  = $request->input('description');
        $menu->update();

        return redirect()->route('menu.menukasir')->with('success', 'Berhasil Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu               = Menu::findOrFail($id);
        if($menu) {
            $menu->delete();
            return redirect()->route('menu.index')->with('success', 'Berhasil Hapus!');
        }
        return redirect()->route('menu.index');
    }

    public function deletemenukasir($id)
    {
        $menu               = Menu::findOrFail($id);
        if($menu) {
            $menu->delete();
            return redirect()->route('menu.menukasir')->with('success', 'Berhasil Hapus!');
        }
        return redirect()->route('menu.menukasir');
    }
}
