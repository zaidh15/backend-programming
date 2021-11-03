<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {
        // Mengambil data dari database
        $students = Student::all();

        $response = [
            'message' => 'Get all students',
            'data' => $students
        ];
        
        return response()->json($response, 200);
    }
}
