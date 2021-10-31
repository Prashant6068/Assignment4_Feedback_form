<?php
error_reporting(0);
session_start();

// session login logic


// input fields 
$username = input_field($_POST["username"]);
$password = input_field($_POST["password"]);

// error variables 
$usernameErr = $passwordErr  = "";

// validation
if (isset($_POST["sub"])) {

    // username validation 
    if (empty($username)) {
        $usernameErr = "Please Enter Username.";
    } else if (!preg_match("/^[a-z_]+$/", $username)) {
        $usernameErr = "Invalid Username.";
    }

    // password validation 
    if (empty($password)) {
        $passwordErr = "Please Enter Password.";
    } else if (!preg_match("/^[a-zA-Z0-9]{3,16}+$/", $password)) {
        $passwordErr = "Length of password should be between 4, 16 characters.";
    }

    // login logic 
    if ($usernameErr === "" && $passwordErr  === "") {
        if ($username === "test_user" && $password === "123456") {
            $_SESSION["user"] = $username;
            setcookie("username", $username, time() + 3600 * 24);
            setcookie("password", $password, time() + 3600 * 24);
            header("location: index.php");
            exit();
        } else if ($username === "test_user" && $password !== "123456") {
            $passwordErr = "Incorrect Password.";
        } else if ($username !== "text_user" && $password === "123456") {
            $usernameErr = "Invalid User.";
        }
    }
}

?>
<style>
    .p1{
        box-shadow: 5px 5px 10px black;
    }
</style>
<div class="container content">
    <div class="row">
        <!-- <div class="col-md m-auto login-logo">
            <div class="container- text-center">
                <img src="https://images.neosofttech.com/sites/all/themes/neosoft2017/images/neosoftsocial1.jpg" alt="">
                <p class="lead">Some Slogan Comes Here.</p>
            </div>
        </div> -->
        <div class="col-md ">
            <form class="form-si p-4 bg-white  p1" method="POST">
                <div class="text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1mUf8vcnprarYnRVWQDIrlhQXOWYi0sO6fw&usqp=CAU" class="mb-4" alt="" width="60px" height="">
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" onchange="cook();" placeholder="Enter username" value="<?php echo $_GET["uid"]; ?>">
                    <small id="err" class="form-text text-danger"><?php echo $usernameErr; ?></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    <small id="err" class="form-text text-danger"><?php echo $passwordErr; ?></small>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" id="check" name="remember" value="checked"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-dark btn-block" name="sub">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    const cook = () => {
        if (document.getElementById("username").value === "<?php echo $_COOKIE["username"]; ?>") {
            document.getElementById("password").value = "<?php echo $_COOKIE["password"]; ?>";
        } else {
            document.getElementById("password").value = "";
        }
    }
</script>