<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link href="signup.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div style="overflow-x:hidden;">
    <div class="row">
        <div class="col-4">
            <div class="firstColContainer">
                <div><span>Glad to see you!</span></div>
                <div><p>Enter your personal details<br></br>and start journey with us.</p></div>
            </div>
        </div>

        <div class="col-8 secondColWrapper">
            <div class="SignupContainer">
                <div class="signupTitleContainer">
                    <h1>Sign up</h1>
                </div>
               
                <div class="signupFormContainer">
                    <form class="formContainer" name="createUserForm" action="createUser.php" method="post" >
                        <div style="display:flex;">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="firstname" placeholder="name@example.com" name="firstname">
                                <label for="floatingInput">First Name</label>
                            </div>

                            <div class="form-floating" style="margin-left:16px;">
                                <input type="text" class="form-control" id="lastname" placeholder="Password" name="lastname">
                                <label for="floatingInput">Last Name</label>
                            </div>
                            
                        </div>

                        <div style="display:flex;">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" placeholder="name@example.com" name="username">
                                <label for="floatingInput">Username</label>
                            </div>

                            <div class="form-floating" style="margin-left:16px;">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                <label for="floatingInput">Email</label>
                            </div>
                            
                        </div>

                        <div style="display:flex;">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="adress" placeholder="name@example.com" name="adress">
                                <label for="floatingInput">Adress</label>
                            </div>

                            <div class="form-floating" style="margin-left:16px;">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                <label for="floatingInput">Password</label>
                            </div>
                            
                        </div>

                        <div class="submitButton">
                            <input type="submit" value="Sign up" id="subAcc" />
                        </div>

                    </form>
                    <div class="alreadyHaveAccount">
                        <p>Already have an account. <a href="signin.php">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>