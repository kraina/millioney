<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

use App\User;
use App\Property;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $pages = Page::all();

        //return view('admin.users.index')->with('users', $users);
        return view('admin.super.pages.index', compact('users', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.super.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title'             => 'required',
            'description'       => '',
            'location'          => '',
            'notes'             => '',
            'team'              => '',
        ]);
        $event = Page::add($data);
        /*
        $event = Property::add($data);

        if($request->hasFile('photo_id')){
            $files = $request->file('photo_id');
            $property_photo_name = $event->UploadPropertyPhoto($files);
        }
        */
        return redirect('admin.super/pages')->with('success', "Page created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page = Page::where('id', $page)->first();

            return view('admin.super.pages.edit', compact('page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
