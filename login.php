<html>
    <head>
        <link rel="stylesheet" type="text/css" href="home.css">
    </head>
        <body>    
            <div class="homeform">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h1>Please sign in</h1>
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="password" placeholder="Pasword">
                    <input type="submit" class="btn btn-primary" value="Sign in">
                </form>
            </div>
            <?php
                include ('dbconnection.php');
                session_start();

                if ($_SERVER["REQUEST_METHOD"]=="POST"){
                    $user=filter_var($_POST["username"], FILTER_SANITIZE_STRING);
                    $passw=filter_var($_POST["password"],FILTER_SANITIZE_STRING );
                }
                
                $query_select="SELECT * FROM admin WHERE user='$user' and password='$passw'";
                $run_query=(mysqli_query($connection, $query_select));
                $result=mysqli_num_rows($run_query);
                if ($result>0){
                    header("Location: https://localhost/school");
                    
                }
                // else{
                //     echo "wrong name or password";
                // }

            
                $_SESSION ['user'] = array(
                    "username"=>"$user");
                    
            ?>
        </body>
    
</html> 