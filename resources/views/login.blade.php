<?php use Illuminate\Support\Facades\URL; ?>

@extends('layouts.header')

<div class='container'>
    <form method='post' action='<?=URL::route('login')?>'>
        @csrf
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='email'>Email address</label>
                    <input type='email' class='form-control' name='email' id='email' aria-describedby='emailHelp'>
                </div>
            </div>
        </div>
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='password'>Password</label>
                    <input type='password' class='form-control' name='password' id='password'>
                </div>
            </div>
        </div>
        <div class='container text-center'>
            <button type='submit' class='btn btn-primary'>Submit</button>
            <a href='<?=URL::route('user.register')?>' class='btn btn-secondary'>Register</a>
        </div>
    </form>
</div>

@extends('layouts.footer')
