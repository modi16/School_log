<html>
    <head>
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
        <body>    
            <nav class="navbar navbar-expand-sm bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Add new record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Display new record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>

            </nav>
            <table class="table">   
            <thead>
                <tr>
                    <td> No.</td>
                    <td> Teacher name</td>
                    <td> Teacher email</td>
                    <td> Teacher qualification</td>
                    <td> Teacher class</td>
                    <td> Mobile</td>
                    <td> Address</td>
                    <td> Joining date</td>
                </tr>
            </thead>
            <?php
                include('dbconnection.php');
                $queryall='SELECT * FROM teacher_records';
                $run_query=(mysqli_query($connection, $queryall));
                
                while($result=mysqli_fetch_assoc($run_query)){
            ?> 
                
                        <tr>
                            <td> <?php echo $result['teacher_id'] ?></td>
                            <td> <?php echo $result['Teacher name'] ?></td>
                            <td> <?php echo $result['Teacher email'] ?></td>
                            <td> <?php echo $result['Teacher qualification'] ?></td>
                            <td> <?php echo $result['Teacher class'] ?></td>
                            <td> <?php echo $result['Mobile'] ?></td>
                            <td> <?php echo $result['Address'] ?></td>
                            <td> <?php echo $result['Joining date'] ?></td>
                        
                        </tr> 

                </table>
                    <?php } ?> 
                    
            
        </body>
    
</html> 