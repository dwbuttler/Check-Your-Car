<?php use Illuminate\Support\Facades\URL; ?>
@extends('app')

@section('title') Welcome @endsection

@section('content')
    <h2>{{ $user->name }}'s Dashboard</h2>

    <p>Registered Vehicles</p>

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
                    <th></th>
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
            <td>
                <a href="vehicle/edit/{{ $vehicle->id }}" class="btn btn-primary">Edit</a>
                <a href="vehicle/delete/{{ $vehicle->id }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>

        @if ($loop->last)
                </tbody>
            </table>
        @endif
    @empty
        <div class="alert alert-primary" role="alert">
            Registered vehicle details will appear here.
        </div>
    @endforelse

    <div class="container">
        <a href="<?=URL::route('vehicle.register')?>" class="btn btn-primary">Register a new vehicle</a>
    </div>
@endsection
