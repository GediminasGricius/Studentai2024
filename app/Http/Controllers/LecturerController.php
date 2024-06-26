<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Lecturer::class,'lecturer');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('lecturers.index',[
            'lecturers'=>Lecturer::with('courses')-> get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lecturer=Lecturer::create($request->all());
        $lecturer->save();
        return redirect()->route('lecturers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', [
            'lecturer'=>$lecturer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $lecturer->update($request->all());
        $lecturer->save();
        return redirect()->route('lecturers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('lecturers.index');
    }


}
