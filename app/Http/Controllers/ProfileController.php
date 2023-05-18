<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\file;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile    = profile::latest()->simplePaginate(5); //latest terbaru

        return view('pages.admin.profile.index', compact('profile')) 
            ->with('i', (request()->input('page', 1) - 1) * 5);;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
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
        $profile    = profile::find($id);
        return view('pages.admin.profile.edit', compact('profile'));
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
        $profile                        = Profile::find($id);
        
        if($request->hasfile('image'))
        {
            $destination                = 'image/'.$profile->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('image');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('image/', $filename);
            $profile->image             = $filename;
        }

        if($request->hasfile('title_image'))
        {
            $destination                = 'title_image/'.$profile->title_image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('title_image');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('title_image/', $filename);
            $profile->title_image       = $filename;
        }

        $profile->title                 = $request->input('title');

        if($request->hasfile('img_navbar'))
        {
            $destination                = 'img_navbar/'.$profile->img_navbar;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('img_navbar');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('img_navbar/', $filename);
            $profile->img_navbar        = $filename;
        }

        if($request->hasfile('img_homemenu'))
        {
            $destination                = 'img_homemenu/'.$profile->img_homemenu;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('img_homemenu');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('img_homemenu/', $filename);
            $profile->img_homemenu      = $filename;
        }

        if($request->hasfile('cover_img_homemenu'))
        {
            $destination                = 'cover_img_homemenu/'.$profile->cover_img_homemenu;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('cover_img_homemenu');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('cover_img_homemenu/', $filename);
            $profile->cover_img_homemenu= $filename;
        }

        $profile->title_homemenu        = $request->input('title_homemenu');
        $profile->description_homemenu  = $request->input('description_homemenu');

        $profile->title_navbar          = $request->input('title_navbar');
        $profile->title_description     = $request->input('title_description');
        $profile->time_open             = $request->input('time_open');
        $profile->time_close            = $request->input('time_close');
        $profile->no_telp               = $request->input('no_telp');
        $profile->address               = $request->input('address');

        if($request->hasfile('img_big'))
        {
            $destination                = 'img_big/'.$profile->img_big;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('img_big');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('img_big/', $filename);
            $profile->img_big           = $filename;
        }

        $profile->title_big             = $request->input('title_big');
        $profile->description_big       = $request->input('description_big');

        if($request->hasfile('img_left'))
        {
            $destination                = 'img_left/'.$profile->img_left;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('img_left');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('img_left/', $filename);
            $profile->img_left          = $filename;
        }

        $profile->title_left            = $request->input('title_left');
        $profile->description_left      = $request->input('description_left');

        
        if($request->hasfile('img_center'))
        {
            $destination                = 'img_center/'.$profile->img_center;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('img_center');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('img_center/', $filename);
            $profile->img_center        = $filename;
        }

        $profile->title_center          = $request->input('title_center');
        $profile->description_center    = $request->input('description_center');
        
        if($request->hasfile('img_right'))
        {
            $destination                = 'img_right/'.$profile->img_right;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file                       = $request->file('img_right');
            $extention                  = $file->getClientOriginalExtension();
            $filename                   = time().'.'.$extention;
            $file->move('img_right/', $filename);
            $profile->img_right          = $filename;
        }
        
        $profile->title_right           = $request->input('title_right');
        $profile->description_right     = $request->input('description_right');

        $profile->update();

        return redirect()->route('profile.index')->with('success', 'Berhasil Update!');

    }

    // public function update(Request $request, $id)
    // {
    //     $profile                        = Profile::find($id);
    //     if($request->hasfile('image'))
    //     {
    //         $profile->image             = $request->file('image')->store('uploads/produks/');
    //     }

    //     if($request->hasfile('title_image'))
    //     {
    //         $profile->title_image       = $request->file('title_image')->store('uploads/produks/');
    //     }

    //     $profile->title                 = $request->input('title');

    //     if($request->hasfile('img_navbar'))
    //     {
    //         $profile->img_navbar        = $request->file('img_navbar')->store('uploads/produks/');
    //     }

    //     $profile->title_navbar          = $request->input('title_navbar');
    //     $profile->title_description     = $request->input('title_description');
    //     $profile->time_open             = $request->input('time_open');
    //     $profile->time_close            = $request->input('time_close');
    //     $profile->no_telp               = $request->input('no_telp');
    //     $profile->address               = $request->input('address');

    //     if($request->hasfile('img_big'))
    //     {
    //         $profile->img_big           = $request->file('img_big')->store('uploads/produks/');
    //     }

    //     $profile->title_big             = $request->input('title_big');
    //     $profile->description_big       = $request->input('description_big');

    //     if($request->hasfile('img_left'))
    //     {
    //         $profile->img_left          = $request->file('img_left')->store('uploads/produks/');
    //     }

    //     $profile->title_left            = $request->input('title_left');
    //     $profile->description_left      = $request->input('description_left');

    //     if($request->hasfile('img_center'))
    //     {
    //         $profile->img_center        = $request->file('img_center')->store('uploads/produks/');
    //     }

    //     $profile->title_center          = $request->input('title_center');
    //     $profile->description_center    = $request->input('description_center');

    //     if($request->hasfile('img_right'))
    //     {
    //         $profile->img_right         = $request->file('img_right')->store('uploads/produks/');
    //     }

    //     $profile->title_right           = $request->input('title_right');
    //     $profile->description_right     = $request->input('description_right');

    //     $profile->update();

    //     return redirect()->route('profile.index')->with('success', 'Berhasil Update!');

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
