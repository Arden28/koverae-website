<?php

namespace Modules\MyKover\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MyKoverController extends Controller
{
    public function index(Request $request)
    {
        return view('mykover::index', [
            'user' => $request->user(),
        ]);
    }

    public function create()
    {
        return view('mykover::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     */
    public function show($id)
    {
        return view('mykover::show');
    }

    public function edit($id)
    {
        return view('mykover::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }
}
