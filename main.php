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
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn  my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>

            </nav>
            
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
                </tr>
            </thead>";
                while($result=mysqli_fetch_assoc($run_query)){
                    echo "<tr><td>";
                    echo $result['teacher_id'];
                    echo "</td><td>";
                    echo $result['Teacher name'];
                    echo "</td><td>";
                    echo $result['Teacher email'];
                    echo "</td><td>"; 
                    echo $result['Teacher qualification'];
                    echo "</td><td>";
                    echo $result['Teacher class'];
                    echo "</td><td>";
                    echo $result['Mobile'];
                    echo "</td><td>";
                    echo $result['Address'];
                    echo "</td><td>";
                    echo $result['Joining date'];
                    echo "</td></tr>";                     
                    }
                    echo" </table>";
         ?> 
                    
            
        </body>
    
</html> 