<?php use Illuminate\Support\Facades\URL; ?>

@extends('app')

@section('title') Login @endsection

@section('content')
    <form method='post' action='<?=URL::route('login')?>'>
        @csrf
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='email'>Email address</label>
                    <input type='email' class='form-control' name='email' id='email'>
                    @error('email')
                        <div class="alert alert-danger my-2" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='password'>Password</label>
                    <input type='password' class='form-control' name='password' id='password'>
                    @error('password')
                        <div class="alert alert-danger my-2" role="alert">{{ $message }}</div>
                    @enderror
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
            <button type='submit' class='btn btn-primary'>Login</button>
            <a href='<?=URL::route('user.register')?>' class='btn btn-secondary'>Register</a>
        </div>
    </form>
@endsection
