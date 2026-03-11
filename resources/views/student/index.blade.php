@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $title ?? '' }}</h5>
                    <div class="mb-3" align="right"><a href="{{ route('student.create') }}">Create New Role</a></div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Addres</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->gender == 1 ? 'Male' : 'Female' }}</td>
                                    <td>{{ $student->addres }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td> <img src="{{ asset('storage/students/' . $student->image) }}" width="80"></td>
                                    <td class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('student.edit', $student->id) }}"
                                            class="btn btn-primary btn-sm mb-2">Edit</a>
                                        <form id="delete-form-{{ $student->id }}"
                                            action="{{ route('student.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete-btn">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
