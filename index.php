<?php

require_once 'views/layouts/header.php';

    echo "<div class='container h-100'>
            <div class='container text-center header'>    
                <h2 class='text-primary'>Check Your Car</h2>
            </div>    
            <div class='container'>
                <form method='post' action='login/process_login.php'>
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
                        <a href='register/register.php' class='btn btn-secondary'>Register</a>
                    </div>
                </form>
            </div>
        </div>";

require_once 'views/layouts/footer.php';