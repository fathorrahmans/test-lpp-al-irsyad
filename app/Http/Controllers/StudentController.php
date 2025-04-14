<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Get All Student
    public function index(Request $request)
    {
        $students = Student::orderBy('id', 'DESC')->paginate(10);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Mendapatkan Seluruh Siswa',
                'data' => $students->items()
            ], 200);
        }

        return view('student.index', compact('students'));
    }

    // Show single Student by id
    public function show($id)
    {
        $student = Student::where('id', $id)->firstOrFail();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Mendapatkan Data Siswa',
            'data' => $student
        ], 200);
    }

    // Store student to database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'kelas' => 'required|string|max:255',
        ]);

        $student = Student::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menambahkan Siswa',
                'data' => $student
            ], 201);
        }

        return redirect()->route('siswa.index');
    }

    // Update data student
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'kelas' => 'required|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Memperbarui Data Siswa',
                'data' => $student
            ]);
        }

        return redirect()->route('siswa.index');
    }

    // Remove student from database
    public function destroy(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Siswa Berhasil Dihapus'
            ], 200);
        }

        return redirect()->route('siswa.index');
    }
}
