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
                $id=$_GET['userid'];

                if(count($_POST)>0) {
                    mysqli_query($connection,"UPDATE teacher_records SET Teacher_name=$name, Teacher_email=$email, Teacher_qualification='" . $_POST["qualification"] . "', Teacher_class= '" . $_POST["class"] . "', Mobile='" . $_POST["mobile"] . "', Address='" . $_POST["address"] ."', Profile_Pic=$image WHERE teacher_id='" . $_POST['teacher_id'] . "'");
                    
                    echo "<script>$('#modalMessage1').modal('show')</script>";
                        header ('Location: main.php');;
                    }
                    $id=$_GET['userid'];
                    $queryall="SELECT * FROM teacher_records WHERE teacher_id ='$id'";
                    $run_query=(mysqli_query($connection, $queryall));
                    $result=mysqli_fetch_assoc($run_query)
            ?>            
            <div class="container">
                <form method="post" class="border border-light p-5 position-relative" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group"> 
                        <label>Name</label> 
                        <input type="text" class="form-control new" name="name" value="<?php echo $result['Teacher_name'];?>">
                    </div>
                    <div class="form-group"> 
                        <label>Email</label>
                        <input type="text" class="form-control new" name="email" value="<?php echo $result['Teacher_email'];?>">
                    </div>
                    <div class="form-group"> 
                        <input type="text" class="form-control new" name="qualification" value="<?php echo $result['Teacher_qualification'];?>">
                    </div>
                    <div class="row set">
                        <div class="col">
                            <input type="text" class="form-control" name="class" value="<?php echo $result['Teacher_class'];?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="mobile" value="<?php echo $result['Mobile'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control new" name="address" value="<?php echo $result['Address'];?>">
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
        </body>
    
</html>