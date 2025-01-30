<?php
session_start();
include('./db/db.php');

// Handle Signup
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username already exists
    $check_user_sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows > 0) {
        echo "<p>Username already taken. Try another.</p>";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Account created successfully. Please <a href='#' onclick='document.getElementById(\"signinForm\").style.display=\"block\"'>Sign In</a></p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
}

// Handle Sign In
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id']; // Store user ID in session
            header("Location: ./home page 2/temp.php");  // Redirect to dashboard after login
 // Stay on the main page
            exit();
        } else {
            echo "<p>Invalid password!</p>";
        }
    } else {
        echo "<p>No user found with that username!</p>";
    }
}

// Handle Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">

    <script>
        // Function to toggle visibility of Sign Up and Sign In forms
        function toggleForm(formId) {
            // Hide both forms first
            document.getElementById("signupForm").style.display = "none";
            document.getElementById("signinForm").style.display = "none";

            // Show the selected form
            document.getElementById(formId).style.display = "block";
        }
    </script>
</head>
<body>
    <div class="main">
        <div class="page1">
            <div class="nav">
                <h3>start-x</h3>
                <div class="nav-part1">
                    <h3 id="signIn">sign-in</h3>
                    <h3 id="signUp" >sign-up</h3>    
                    <!-- <a href="./home page 2/temp.php"></a> -->
                </div>
            </div>
            <div class="page1-part1">
                <img src="https://images.deccanherald.com/deccanherald/2023-12/875a81af-ee4a-49b1-904a-8711995bab8b/file7t2il92yo0jyghjbl0t.jpeg?w=1200&h=675&auto=format%2Ccompress&fit=max&enlarge=true" alt="">
            </div> 
            <div class="page1-part2">
                <div class="box">
                    <img onclick="redirect()" src="./img/main atal poster.jpg" alt="">
                </div>
                <div class="box">
                    <img  onclick="redirect()" src="./img/jailer.webp" alt="">
                </div>
                <div class="box">
                    <img  onclick="redirect()" src="./img/fastx.jpg" alt="">
                </div>
                <div class="box">
                     <img onclick="redirect()"  src="./img/animal.jpg" alt="">
                </div>
                <div class="box">
                   <img onclick="redirect()"  src="./img/Oppenheimer poster.jpg" alt="">
                </div>
                <div class="box">
                    <img onclick="redirect()"  src="./img/jhon wick.jpg" alt="">
                </div>
            </div>
            

            
            <div class="signUpPage signInPage">
                <div class="nav123">
                    <h3 class="closeSignIn" style="align-items: center; justify-content: center; display: flex;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="1.2vw" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.708 19.273a.686.686 0 0 0-.05-.966l-6.121-5.55h14.71c.416 0 .753-.338.753-.756a.755.755 0 0 0-.752-.758H5.53l6.129-5.548a.69.69 0 0 0 .05-.969.676.676 0 0 0-.961-.05l-7.522 6.812a.69.69 0 0 0 0 1.017l7.52 6.82c.28.252.71.23.962-.052Z"></path>
                        </svg>
                        home</h3>
                        <div class="nav-part1">
                            <h3>est-2024</h3>
                        </div>
                    </div>
                    <hr class="animated-hr" />
                    <div class="signUpPage-part1"> 
                        <div class="signUpPage-part11">
                            <h3>otp verification</h3>
                            <div class="signUpPage-bottom">
                                <h1>Start <br> Your <br> Journey</h1>
                            </div>
                            
                        </div>
                        <div id="signupForm" class="container"> 
                            <form method="POST" action="index.php">
                                <label for="activity" class="required">username</label>
                                <input type="text" placeholder="username" name="username" required>
                                <label for="activity" class="required">password aahe</label>
                                <input type="password" placeholder="password" name="password" required>
                                <input type="submit" name="signup" value="Sign Up">
                                
                            </form>
                        </div> 
                    </div>
                    
                </div>
                    


                <div class="signUpPage">
                <div class="nav123">
                    <h3 class="closeSignUp" style="align-items: center; justify-content: center; display: flex;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="1.2vw" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.708 19.273a.686.686 0 0 0-.05-.966l-6.121-5.55h14.71c.416 0 .753-.338.753-.756a.755.755 0 0 0-.752-.758H5.53l6.129-5.548a.69.69 0 0 0 .05-.969.676.676 0 0 0-.961-.05l-7.522 6.812a.69.69 0 0 0 0 1.017l7.52 6.82c.28.252.71.23.962-.052Z"></path>
                        </svg>
                        home</h3>
                        <div class="nav-part1">
                            <h3>est-2024</h3>
                        </div>
                    </div>
                    <hr class="animated-hr" />
                    <div class="signUpPage-part1"> 
                        <div class="signUpPage-part11">
                            <h3>otp verification</h3>
                            <div class="signUpPage-bottom">
                                <h1>Start <br> Your <br> Journey</h1>
                            </div>
                            
                        </div>
                        <div class="container"> 
                        <form method="POST" action="index.php">
                                <label for="activity" class="required">username</label>
                                <input type="text" name="username" required>
                                <label for="activity" class="required">password</label>
                                <input type="password" name="password" required>
                                <input type="submit" name="signin" value="Sign In">
                                
                            </form> 
                        </div> 
                    </div>
                    
                </div>


                <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
        <a href="index.php?logout=true">Logout</a><br>

        <!-- Go to Comments Pages -->
        <a href="comment1.php">Go to Comment Page 1</a><br>
        <a href="comment2.php">Go to Comment Page 2</a><br>
        <a href="comment3.php">Go to Comment Page 3</a><br>
    <?php else: ?>
        <p>Please <a href="#" onclick="toggleForm('signinForm')">Sign In</a> or <a href="#" onclick="toggleForm('signupForm')">Sign Up</a></p>
    <?php endif; ?>


        </div>
    
    </div>
    <script src="./js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script> 
    <script>
        let redirect = () => {
    alert('Please Sign In..!')
    window.location.href="index.php"
}
    </script>
</body>
</html>

