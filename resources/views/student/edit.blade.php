@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name" required value="{{ $student->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" required value="{{ $student->email }}">
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="1" {{ $student->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="0" {{ $student->gender == 0 ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="addres" class="form-label">Address</label>
                            <textarea class="form-control" id="addres" name="addres" rows="3" placeholder="Enter your address">{{ $student->addres }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" value="{{ $student->phone }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if ($student->image)
                                <div class="mb-2">
                                    <img id="img-preview" src="{{ asset('storage/students/' . $student->image) }}"
                                        width="100">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image-input" name="image">

                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
