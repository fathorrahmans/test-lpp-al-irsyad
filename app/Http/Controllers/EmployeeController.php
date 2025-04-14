<?php

namespace App\Http\Controllers;

use App\Mail\EmployeeMail;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    // Get All
    public function index(Request $request)
    {
        $employees = Employee::orderBy('id', 'DESC')->paginate(10);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Mendapatkan Seluruh Pegawai',
                'data' => $employees->items()
            ], 200);
        }

        return view('employee.index', compact('employees'));
    }

    // Show single employee by id
    public function show($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Mendapatkan Data Pegawai',
            'data' => $employee
        ], 200);
    }

    // Store employee to database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'jabatan' => 'required|string|max:255',
        ]);

        $employee = Employee::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menambahkan Pegawai',
                'data' => $employee
            ], 201);
        }

        return redirect()->route('pegawai.index');
    }

    // Update data employee
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'jabatan' => 'required|string|max:255',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Memperbarui Data Pegawai',
                'data' => $employee
            ]);
        }

        return redirect()->route('pegawai.index');
    }

    // Remove employee from database
    public function destroy(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Pegawai Berhasil Dihapus'
            ], 200);
        }

        return redirect()->route('pegawai.index');
    }

    // Send Email Employee
    public function sendEmail($id)
    {
        $employee = Employee::findOrFail($id);
        Mail::to($employee->email)->send(new EmployeeMail($employee));

        return redirect()->route('pegawai.index');
    }
}
