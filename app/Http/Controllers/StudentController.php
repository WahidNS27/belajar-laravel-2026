<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Student";
        $students = Student::get();
        return view('student.index', compact('title', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create role

        $title = "Create New Student";
        return view('student.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store
//validate

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'gender' => 'nullable',
            'phone' => 'nullable',
            'addres' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        //simpan kedatabase nya
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->phone = $request->phone;
        
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('students', $imageName, 'public');
            $student->image = $imageName;
        }
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'addres' => $request->addres,
            'image' => $imageName,
        ]);

        Alert::success('Success', 'Student Created Successfully');
        return redirect()->route('student.index');
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
        //EDIT FUNCTION STUDENT
        $title = "Edit Student";
        $student = Student::findOrFail($id); //select*from users where id='$id';
        return view('student.edit', compact('title', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email,' . $id,
            'gender' => 'nullable',
            'phone' => 'nullable',
            'addres' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $student = Student::findOrFail($id);
        $imageName = $student->image;
        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($student->image && Storage::disk('public')->exists('students/'.$student->image)) {
                Storage::disk('public')->delete('students/'.$student->image);
            }
        
            // upload gambar baru
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('students', $imageName, 'public');
        
            $student->image = $imageName;
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->addres = $request->addres;
        $student->phone = $request->phone;
        $student->image = $request->image;
        $student->save();

        Alert::success('Success', 'Student updated succsessfully');
        return redirect()->route('student.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::findOrFail($id);
        if ($student->image) {
            Storage::disk('public')->delete('students/'.$student->image);
        }
        $student->delete();
      
        Alert::success('Success', 'Student remove succsessfully');
        return redirect()->route('student.index')->with('success' , 'Student deleted successfully');
    }
}
