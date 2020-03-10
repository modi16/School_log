<html>
    <head>
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
        <body> 
            <div class="justify-content-between" id="parent">  
                <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                    
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Display all records</a>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                        
                    </ul>
                    
                </nav>
            </div>
            <div class="container">
                <form method="post" class="border border-light p-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group"> 
                        <label>Name</label> 
                        <input type="text" class="form-control new" name="name" placeholder="Full name">
                    </div>
                    <div class="form-group"> 
                        <label>Email</label>
                        <input type="text" class="form-control new" name="email" placeholder="Email">
                    </div>
                    <div class="form-group"> 
                        <input type="text" class="form-control new" name="qualification" placeholder="Qualification">
                    </div>
                    <div class="row set">
                        <div class="col">
                            <input type="text" class="form-control" name="class" placeholder="Class">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="mobile" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control new"name="address" placeholder="Address">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add">

                </form>
            </div>
            <?php
                include('dbconnection.php');

                if ($_SERVER["REQUEST_METHOD"]=="POST"){
                    $name=filter_var($_POST["name"], FILTER_SANITIZE_STRING);
                    $email=filter_var($_POST["email"],FILTER_SANITIZE_STRING );
                   

                    $new='INSERT INTO teacher_records (Teacher_name, Teacher_email, Teacher_qualification, Teacher_class, Mobile, Address, Joining_date) VALUES (?,?,?,?,?,?, CURDATE())';
                    $stmt = mysqli_prepare($connection, $new);
                    $stmt->bind_param("ssssss", $name, $email, $_POST["qualification"],$_POST["class"], $_POST["mobile"], $_POST["address"] );
                    $stmt->execute();
                    // $run_query=(mysqli_query($connection, $new));
                   
                        echo "Record successfully inserted";
                   
                }
           ;
                
         ?> 
                    
            
        </body>
    
</html> 