<?php use Illuminate\Support\Facades\URL; ?>

@extends('layouts.header')

<div class='container'>
    <form method='post' action='<?=URL::route('user.create');?>'>
        @csrf
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='firstName'>Firstname</label>
                    <input type='text' class='form-control' name='firstName' id='firstName'>
                </div>
            </div>
        </div>
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='lastName'>Lastname</label>
                    <input type='text' class='form-control' name='lastName' id='lastName'>
                </div>
            </div>
        </div>
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='email'>Email address</label>
                    <input type='email' class='form-control' name='email' id='email'>
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
        <div class='row justify-content-center'>
            <div class='col-4'>
                <div class='form-group'>
                    <label for='confirmPassword'>Confirm Password</label>
                    <input type='password' class='form-control' id='confirmPassword'>
                </div>
            </div>
        </div>
        <div class='container text-center'>
            <button type='submit' class='btn btn-primary'>Register</button>
        </div>
    </form>
</div>

@extends('layouts.footer')
