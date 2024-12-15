<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();

        return view('dashboard.student.index', [
            'title' => 'Daftar Siswa',
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.student.create', [
            'title' => 'Tambah Siswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'grade' => 'required|string',
        ]);

        Student::create($validatedData);

        return redirect()->route('dashboard.student.index')->with('success', 'Student has been added successfully!');
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
        return view('dashboard.student.edit', [
            'title' => 'Edit Siswa',
            'student' => Student::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'grade' => 'required|string',
        ]);

        $student = Student::findOrFail($id);

        $student->update($validatedData);
  
        return redirect()->route('dashboard.student.index')->with('success', 'Student has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('dashboard.student.index')->with('success', 'Student has been deleted successfully!');
    }

    public function report()
    {
        $students = Student::all();

        return view('dashboard.student.report', [
            'title' => 'Laporan Siswa',
            'students' => $students
        ]);
    }
}
