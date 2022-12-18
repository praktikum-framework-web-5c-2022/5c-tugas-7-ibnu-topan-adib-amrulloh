@extends('layouts.master')
@section('isi')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">Form Pembuatan Kelompok</h2>
            <form action="{{ route('projects.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <select id="name" name="name[]" multiple>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="project">Project</label>
                    <input type="text" name="project" id="project" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Gas</button>

            </form>
        </div>
    </div>
@endsection
