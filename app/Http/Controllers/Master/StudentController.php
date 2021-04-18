<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->search;
        $student = Student::when($search,function($q) use ($search){
            $q->where('name','LIKE',"%{$search}%");
                })->orderByDesc('id')
                ->paginate(20);

        $last_updated = Student::orderBy('id','desc')->first('created_at');

        return Inertia::render('Master/Student/Index', [
            'filters'       => request()->all('search'),
            'pagetitle'     => 'Daftar Murid',
            'students'     => $student,
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
        return Inertia::render('Master/Student/Create', [
            'pageTitle' => 'Create New Student',
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

        Student::create($data);

        return redirect()->route('student.index')->with('success', 'Student created.'); 
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
    public function edit(Student $student)
    {
        return Inertia::render('Master/Student/Edit', [
            'student' => [
                'id'       => $student->id,
                'name'     => $student->name,
                'dob'     => $student->dob,
            ],
            'pageTitle' => 'Edit student'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student)
    {
        $data = request()->validate([
            'name'      => ['required'],
            'dob'      => ['required'],
            
        ]);

        $student->update($data);

        return redirect()->route('student.index')->with('success', 'Student updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted.');
    }
}
