<?php use Illuminate\Support\Facades\URL; ?>
@extends('app')

@section('title') Welcome @endsection

@section('content')
    <h2>{{ $user->name }}'s Dashboard</h2>

    <p>Registered Vehicles</p>

    <!-- If the user has any cars, display a table of them -->
    @forelse ($user->vehicles as $vehicle)
        @if ($loop->first)
            <table class='table'>
                <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Make</th>
                    <th scope='col'>Model</th>
                    <th scope='col'>Year</th>
                    <th scope='col'>Type</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
        @endif

        <tr>
            <th scope='row'>{{ $loop->iteration }}</th>
            <td>{{ $vehicle->make }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->year }}</td>
            <td>{{ $vehicle->type }}</td>
            <td>
                <a href='/vehicle/edit/{{ $vehicle->id }}' class='btn btn-secondary'>Edit</a>
                <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteVehicleModal' data-vehicle='{{ $vehicle->id }}' data-vehicle-name='{{ $vehicle->make }} {{ $vehicle->model }}'>Delete</button>
            </td>
        </tr>

        @if ($loop->last)
                </tbody>
            </table>
        @endif
    @empty
        <div class='alert alert-primary' role='alert'>
            Registered vehicle details will appear here.
        </div>
    @endforelse

    <div class='container'>
        <a href='<?=URL::route('vehicle.register')?>' class='btn btn-primary'>Register a new vehicle</a>
    </div>

    @csrf

    <!-- Bootstrap modal -->
    <div class='modal fade' id='deleteVehicleModal' tabindex='-1' aria-labelledby='deleteVehicleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='deleteVehicleModalLabel'>Vehicle Deletion</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'></div>
                <div class='modal-footer'></div>
            </div>
        </div>
    </div>

    <script>
        let vehicleDeleteRoute = ''
        let userHomeRoute = window.location.pathname

        $('#deleteVehicleModal').on('show.bs.modal', function (event) {
            let button              = $(event.relatedTarget)
            let vehicleID           = button.data('vehicle')
            let vehicleDisplayName  = button.data('vehicle-name')
            let modal               = $(this)
            vehicleDeleteRoute      = '/vehicle/delete/' + vehicleID

            modal.find('.modal-body').html('Are you sure you want to delete the <strong>' + vehicleDisplayName + '</strong> from your registered vehicles list?')
            modal.find('.modal-footer').html("<button class='btn btn-secondary' data-dismiss='modal'>Close</button><button class='btn btn-danger' onclick='deleteVehicle()'/>Delete</button>")
        })

        function deleteVehicle() {
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $("input[name='_token']").val())
                },
                url: vehicleDeleteRoute,
                type: 'DELETE',
                success: function () {
                    window.location.replace(userHomeRoute)
                }
            })
        }
    </script>
@endsection
