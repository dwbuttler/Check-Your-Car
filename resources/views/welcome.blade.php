<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Check Your Car</title>

        <!-- Bringing in Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class='container h-100'>
            <div class='container text-center header'>
                <h2 class='text-primary'>Check Your Car</h2>
            </div>
            <div class='container'>
                <form method='post' action=''>
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
        </div>
    </body>
</html>
