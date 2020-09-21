<?php use Illuminate\Support\Facades\URL; ?>

@extends('app')

@section('title') Vehicle Registration @endsection

@section('content')
    <div class='container'>
        <form method='post' action='<?=URL::route('vehicle.edit');?>'>
            @method('PUT')
            @csrf

            <input type="hidden" name="vehicleID" value="{{ $vehicle->id }}"/>
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='make'>Make</label>
                        <input type='text' class='form-control' name='make' id='make' value="{{ $vehicle->make }}">
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='model'>Model</label>
                        <input type='text' class='form-control' name='model' id='model' value="{{ $vehicle->model }}">
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='year'>Year</label>
                        <input type='number' class='form-control' name='year' id='year' value="{{ $vehicle->year }}">
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='type'>Type</label>
                        <select class='form-control' id='type' name='type'>
                            @foreach($vehicle->getVehicleTypes() as $value => $html)
                                <option value='{{ $value }}' @if($value === $vehicle->type) selected @endif>{{ $html }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-4">
                        @foreach ($errors->all() as $message)
                            <div class="alert alert-danger my-2" role="alert">{{ $message }}</div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class='container text-center'>
                <button type='submit' class='btn btn-primary'>Update Vehicle</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
