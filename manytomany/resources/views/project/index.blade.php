@extends('layouts.master')

@section('isi')
    <h2 class="text-center">Data Project dan Kelompok</h2>
    <div class="d-flex justify-content-end">

        <a href="projects/create" class="mb-3 btn btn-success">Tambah</a>
    </div>

    <table class="table table-bordered table-stripped">
        <thead>
            <th>Nama(Ketua Kelompok)</th>
            <th>Project</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>
                        <ul>
                            @foreach ($project->users as $user)
                                <li> {{ $user->name }} ({{ $user->pivot->groupleader->name }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $project->name }}</td>
                    <td>
                        <div class="d-flex inline-block">

                            <a href="{{ route('projects.edit', ['project' => $project->id]) }}"
                                class="btn btn-warning mx-1">Edit</a>
                            <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mx-1">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
