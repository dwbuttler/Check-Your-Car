<?php use Illuminate\Support\Facades\URL; ?>

@extends('app')

@section('title') Vehicle Registration @endsection

@section('content')
    <div class='container'>
        <form method='post' action='<?=URL::route('vehicle.edit.submit');?>'>
            @csrf
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='make'>Make</label>
                        <input type='text' class='form-control' name='make' id='make'>
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='model'>Model</label>
                        <input type='text' class='form-control' name='model' id='model'>
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='year'>Year</label>
                        <input type='number' class='form-control' name='year' id='year'>
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-5'>
                    <div class='form-group'>
                        <label for='type'>Type</label>
                        <select class='form-control' id='type' name='type'>
                            <option value='sedan'>Sedan</option>
                            <option value='hatchback'>Hatchback</option>
                            <option value='utility'>Utility</option>
                            <option value='van'>Van</option>
                            <option value='truck'>Truck</option>
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
                <button type='submit' class='btn btn-primary'>Register Vehicle</button>
                <a href="/home" class="btn btn-secondary">Back to Home</a>
            </div>
        </form>
    </div>
@endsection
