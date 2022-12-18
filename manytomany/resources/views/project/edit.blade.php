@extends('layouts.master')
@section('isi')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">Form Pembuatan Kelompok</h2>
            <form action="{{ route('projects.update', ['project' => $project->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <select id="name" name="name[]" multiple>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                @foreach ($project->users as $item)
                    @if ($user->id == $item->id)
                        selected
                    @endif @endforeach>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="project">Project</label>
                    <input type="text" name="project" id="project" class="form-control"
                        value="{{ old('project') ?? $project->name }}">
                </div>

                <button type="submit" class="btn btn-primary">Gas</button>

            </form>
        </div>
    </div>
@endsection
