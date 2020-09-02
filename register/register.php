<?php

require_once '../views/layouts/header.php';

echo "
    <div class='container text-center header'>    
        <a href='../index.php' class='nav-link'><h2>Check Your Car</h2></a>
    </div>
    <div class='container'>
        <form method='post' action='process_registration.php'>
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
";

require_once '../views/layouts/footer.php';