<?php
    //Detext the current session
    session_start();

    //Include the page layout header
    include("header.php");
?>

<!-- Create a cenrally located container -->
<div style="width:80%; margin:auto;">
    <!-- Create a HTML Form within the container -->
    <form action="checkLogin.php" method="post">
        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                <span class="page-title">Member Login</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="email">
                Email Address
            </label>
            <div class="col-sm-9">
                <input class="form-control" type="email" name="email" id="email" required/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="password">
               Password
            </label>
            <div class="col-sm-9">
                <input class="form-control" type="password" name="password" id="password" required/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                <button class="btn btn-primary" type='submit'>Login</button>
                <p>Please sign up if you do not have an account.</p>
                <p><a href="forgetPassword.php">Forget Password</a></p>
            </div>
        </div>
    </form>
</div>

<?php
    //Include the Page Layout footer
    include("footer.php");
?>