@extends('app')

@section('title') Welcome @endsection

@section('content')
    <h2>{{ $user->name }}'s Dashboard</h2>

    <!-- If the user has any cars, display a table of them -->
    @forelse ($user->vehicles as $vehicle)
        @if ($loop->first)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Type</th>
                </tr>
                </thead>
                <tbody>
        @endif

        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $vehicle->make }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->year }}</td>
            <td>{{ $vehicle->type }}</td>
        </tr>

        @if ($loop->last)
                </tbody>
            </table>
        @endif
    @empty
        <div class="alert alert-primary" role="alert">
            You currently have no registered vehicles.
        </div>
    @endforelse

    <div class="container">
        <a href="/vehicle/register" class="btn btn-primary">Register a new vehicle</a>
    </div>
@endsection
