<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->search;
        $teacher = Teacher::when($search,function($q) use ($search){
            $q->where('name','LIKE',"%{$search}%");
                })->orderByDesc('id')
                ->paginate(20);

        $last_updated = Teacher::orderBy('id','desc')->first('created_at');

        return Inertia::render('Master/Teacher/Index', [
            'filters'       => request()->all('search'),
            'pagetitle'     => 'Daftar Guru',
            'teachers'     => $teacher,
            'last_updated'  => $last_updated??'',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Master/Teacher/Create', [
            'pageTitle' => 'Create New Teacher',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'name' => ['required'],
            'dob' => ['required'],
        ]);

        Teacher::create($data);

        return redirect()->route('teacher.index')->with('success', 'Teacher created.'); 
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
    public function edit(Teacher $teacher)
    {
        return Inertia::render('Master/Teacher/Edit', [
            'teacher' => [
                'id'       => $teacher->id,
                'name'     => $teacher->name,
                'dob'     => $teacher->dob,
            ],
            'pageTitle' => 'Edit Teacher'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Teacher $teacher)
    {
        $data = request()->validate([
            'name'      => ['required'],
            'dob'      => ['required'],
            
        ]);

        $teacher->update($data);

        return redirect()->route('teacher.index')->with('success', 'Teacher updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Teacher deleted.');
    }
}
