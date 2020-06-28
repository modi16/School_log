<html>
    <head>
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    </head>
        <body>    
            <div class=" homeform">
                <div class="center">
                    <div class="center-copy"></div>
                    <div class="left-box"></div>
                    <div class="right-box"></div>
                    <form method="post" class="test" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <h1 class="instruct">Please sign in</h1>
                        <div class="form-group"> 
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group"> 
                            <input type="text" class="form-control" name="password" placeholder="Pasword">
                        </div>
                        
                        <input type="submit" class="btn btn-outline-light" value="Sign in">
                    </form>
                </div>
            </div>
            <?php
                include ('dbconnection.php');
                session_start();

                if ($_SERVER["REQUEST_METHOD"]=="POST"){
                    $user=filter_var($_POST["username"], FILTER_SANITIZE_STRING);
                    $passw=filter_var($_POST["password"],FILTER_SANITIZE_STRING );

                    $query_select="SELECT * FROM people_admin WHERE user='$user' and password='$passw'";
                    $run_query=(mysqli_query($connection, $query_select));
                    $result=mysqli_num_rows($run_query);
                    if ($result>0){
                        $_SESSION ['user'] = array(
                            "username"=>"$user");
                        header("Location: https://localhost/school/main.php");
                    
                    } else{
                        echo "Your username or password are incorrect";
                    }
                }
 
            
                
                    
            ?>
        </body>
    
</html> 