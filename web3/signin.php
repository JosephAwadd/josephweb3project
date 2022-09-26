<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link href="signin.css" rel="stylesheet" type="text/css" />

</head>
<body>

  <div style="overflow-x:hidden;">
    <div class="row">
        <div class="col-7 firstColWrapper">
            <div class="SigninContainer">
                <div class="signinTitleContainer">
                    <h1>Sign in</h1>
                </div>
                <div class="formContainer" >
                    <form class="usernameInputContainer" name="verifyUserForm" action="verifyUser.php" method="post">
                            <div class="form-floating mb-3"> 
                                <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="submitButton">
                                <input type="submit" value="Sign in" id="subAcc" />
                            </div>
                    </form>
                    <div class="dontHaveAccount">
                        <p>Don't have an account. <a href="signup.php">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="secondColContainer">
                <div><span>Welcome Back!</span></div>
                <div><p>To keep connected with us please<br></br>login in with your personal info.</p></div>
            </div>
        </div>
    </div>
  </div>  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>


