@extends('app')

@section('title') Defect Reported @endsection

@section('content')
    <p>Dear {{ $user->name }},</p>

    <p>We have received reports that one of your registered vehicles has a defect:</p>

    <ul>
        <li>Make: {{ $vehicle->make }}</li>
        <li>Model: {{ $vehicle->model }}</li>
        <li>Year: {{ $vehicle->year }}</li>
    </ul>

    <p>Defect description: <strong>{{ $defect->description }}</strong></p>

    <p>Please contact the local car manufacturer for your vehicle to get this remedied.</p>

    <p>Kind Regards,</p>

    <p>Check Your Car Team</p>
@endsection
