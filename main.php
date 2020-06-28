<html>
    <head>
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    </head>
        <body> 
            <div class="justify-content-between" id="parent">  
                <nav class="navbar navbar-expand-sm ">
                    
                    <ul class="navbar-nav mr-auto">
                       
                        <li class="nav-item">
                            <a class="nav-link" href="/school/new.php">Add new record</a>
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
                $queryall='SELECT * FROM teacher_records';
                $run_query=(mysqli_query($connection, $queryall));
                echo "<table class='table'>";   
                echo "<tr>
                    <td> No.</td>
                    <td> Teacher name</td>
                    <td> Teacher email</td>
                    <td> Teacher qualification</td>
                    <td> Teacher class</td>
                    <td> Mobile</td>
                    <td> Address</td>
                    <td> Joining date</td>
                    <td> Profile pic</td>
                </tr>
            </thead>";
                while($result=mysqli_fetch_assoc($run_query)){
                    $images_field= $result['Profile_Pic'];
                    $image_show= "images/$images_field";
                    echo "<tr><td>";
                    echo $result['teacher_id'];
                    echo "</td><td>";
                    echo $result['Teacher_name'];
                    echo "</td><td>";
                    echo $result['Teacher_email'];
                    echo "</td><td>"; 
                    echo $result['Teacher_qualification'];
                    echo "</td><td>";
                    echo $result['Teacher_class'];
                    echo "</td><td>";
                    echo $result['Mobile'];
                    echo "</td><td>";
                    echo $result['Address'];
                    echo "</td><td>";
                    echo $result['Joining_date'];
                    echo "</td><td>";  
                    echo "<img src=". $image_show.">";
                    echo "</td></tr>";                     
                    }
                    echo" </table>";
         ?> 
                    
            
        </body>
    
</html> 