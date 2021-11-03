<?php

namespace App\Http\Controllers;

# mengimport model Student
# digunakan untuk berinteraksi dengan database
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    # method index
    public function index()
    {
        # menggunakan model Student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        # mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    # method show
    function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get Detail Students',
                'data' => $student
            ];


            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not Found'
            ];

            return response()->json($data, 404);
        }
    }

    # method store
    public function store(Request $request)
    {
        # menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        # menggunakan model Student untuk masukan data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    # method update
    public function update(Request $request, $id)
    {
        # mencari id student yang ingin diupdate
        $student = Student::find($id);

        if ($student) {
            # menangkap data request
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            # melakukan update data
            $student->update($input);

            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];

            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    # membuat method destroy
    public function destroy($id)
    {
        # cari id student yang ingin dihapus
        $student = Student::find($id);

        if ($student) {
            # hapus student tersebut
            $student->delete();

            $data = [
                'message' => 'Student is deleted'
            ];

            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }
}