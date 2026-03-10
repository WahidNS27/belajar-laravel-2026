@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $title ?? '' }}</h5>
                    <div class="mb-3" align="right"><a href="{{ route('role.create') }}">Create New Role</a></div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($role as $roles)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $roles->name }}</td>
                                    <td class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('role.edit', $roles->id) }}"
                                            class="btn btn-primary btn-sm mb-2">Edit</a>
                                        <form id="delete-form-{{ $roles->id }}"
                                            action="{{ route('role.destroy', $roles->id) }}" method="POST">
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
