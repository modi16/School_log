<html>
    <head>
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
        <body> 
        <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="letter">Please complete the form</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                          
                    </div>
                </div>
            </div>   
            <div class="modal fade" id="modalMessage1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="letter">Record successfully updated</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                          
                    </div>
                </div>
            </div>   
            <div class="justify-content-between" id="parent">  
                <nav class="navbar navbar-expand-sm ">
                    
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/school/main.php">Display all records</a>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link" href="/school/logout.php">Logout</a>
                        </li>
                        
                    </ul>
                    
                </nav>
            </div>
            <?php
                include('dbconnection.php');
                
                $queryall="SELECT * FROM teacher_records";
                $run_query=(mysqli_query($connection, $queryall));
                
            ?>            
            <div class="container">
                <form method="post" class="border border-light p-5 position-relative" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group"> 
                        <label>Name</label> 
                        <input type="text" class="form-control new" name="name" placeholder="Full name"><?php $result['Teacher_name']?>
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
                        <input type="text" class="form-control new" name="address" placeholder="Address">
                    </div>
                    <div class="lastline">
                        <input type="file" id="file" name="image"/>
                        <label for="file">Choose a file</label>
                    </div>
                    <div class="lastline">
                        <input type="submit" class="addbtn " data-toggle="modal" data-target="#modalMessage" value="Update">
                    </div>
                </form>
                
            </div>
            

            <?php
                include('dbconnection.php');
                
                
                if ($_SERVER["REQUEST_METHOD"]=="POST"){
                    $name=filter_var($_POST["name"], FILTER_SANITIZE_STRING);
                    $email=filter_var($_POST["email"],FILTER_SANITIZE_STRING );
                    $image = $_FILES['image']['name'];
                    $target = "images/".basename($image);
                    $msg="";
                    
                    if (strlen($name)===0 || strlen($email) ===0 || strlen($_POST["qualification"]) ===0 || strlen($_POST["class"]===0) || strlen($_POST["mobile"]===0) || strlen($_POST["address"]===0)){
                        echo "<script>$('#modalMessage').modal('show')</script>";
                    } else {

                        $new='INSERT INTO teacher_records (Teacher_name, Teacher_email, Teacher_qualification, Teacher_class, Mobile, Address, Joining_date, Profile_Pic) VALUES (?,?,?,?,?,?, CURDATE(),?)';
                        $stmt = mysqli_prepare($connection, $new);
                        $stmt->bind_param("sssssss", $name, $email, $_POST["qualification"],$_POST["class"], $_POST["mobile"], $_POST["address"],$image );
                            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                $msg = "Image uploaded successfully";
                            }else{
                                $msg = "Failed to upload image";
                            }
                    if ($stmt->execute()){
                        echo "<script>$('#modalMessage1').modal('show')</script>";
                    } 
                    }
                    
                }
           ;
                
            ?>  
                    
            
        </body>
    
</html>