<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function about()
    {
        return view('admin.about');
    }

    public function service()
    {
        return view('admin.service');
    }

    public function donation()
    {
        return view('admin.donation');
    }

    public function event()
    {
        return view('admin.event');
    }

    public function feature()
    {
        return view('admin.feature');
    }

    public function team()
    {
        return view('admin.team');
    }

    public function testimonial()
    {
        return view('admin.testimonial');
    }

    public function contact()
    {
        return view('admin.contact');
    }

    public function error()
    {
        return view('admin.404');
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
    public function store(Request $request)
    {
        //
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
