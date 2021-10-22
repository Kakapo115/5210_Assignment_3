<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="Css/Styling.css" rel="stylesheet">

    <title>Secure Contain Protect</title>
  </head>
  <body class="container">
    
    <!-- This is for the database connection -->
    <?php include "connection.php"; ?>
    
    <!-- Menu Div -->
    <div class="row" id="header">
        <div class="col">
            <img src="images/logo.png" id="header_image" alt="SCP Logo">
            <a class="navbar-brand head-text" href="index.php" style="font-size: 40px;">SCP Foundation</a>
            <ul class="nav">
                <!-- Run PHP loop through db and display h1 here, and this will be our menu -->
                <?php foreach($result as $link): ?>
                    <li>
                        <a href="index.php?link='<?php echo $link['scpNumber']; ?>'" class="nav-link head-links"><?php echo $link['scpNumber']; ?></a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="form.php" class="nav-link head-links">Add A SCP Record</a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Main content based on menu click -->
    <div class="row" style="padding: 20px">
        <div class="col">
            <?php
            
                if(isset($_GET['link']))
                {
                    $scpNumber = trim($_GET['link'], "'");
                    
                    // Run sql command to select record based on the GET value
                    $record = $connection->query("SELECT * FROM SCP WHERE scpNumber='$scpNumber'") or die($connection->mysqli_error($connection));
                    
                    // Turn record into associative array
                    $array = $record->fetch_assoc();

                    $image = $array['img'];
                    $scpNumber = $array['scpNumber'];
                    $objectClass = $array['objectClass'];
                    $scp = $array['scp'];
                    $description = $array['description'];
                    $reference = $array['reference'];
                    $other = $array['other'];

                    // Variables to hold out update and delete url strings
                    $id = $array['id'];
                    $update = "update.php?update=" . $id;
                    $delete = "connection.php?delete=" . $id;
                    
                    echo "
                        <img src='$image' id='Floatin'>
                        <h1>SCP: $scpNumber</h1>
                        <h1>Object Class: $objectClass</h1>
                        <hr>
                        <h1>Containment Procedures:</h1>
                        <p>$scp</p>
                        <hr>
                        <h1>Description:</h1>
                        <p>$description</p>
                        <hr>
                        ";
                    if($references != "")
                    {
                        echo "
                            <h1>References:</h1>
                            <p>$reference</p>
                            <hr>
                        "; 
                    }
                    if($other != "")
                    {
                        echo "
                            <h1>Other Information:</h1>
                            <p>$other</p>
                            <hr>
                        "; 
                    }
                    
                    echo "
                        <br>
                        <p>
                            <a href='$update' class='btn buttons'>Update Record</a>
                            <a href='$delete' class='btn buttons'>Delete Record</a>
                            <button onclick='readText()' class='btn buttons'>Read Record</button>
                            <button onclick='pauseText()' class='btn buttons'>⏸</button>
                            <button onclick='resumeText()' class='btn buttons'>▶</button>
                        </p>
                        
                        <script type = 'text/javascript'>
                        function readText() 
                        {
                            window.speechSynthesis.cancel();
                            var newMsg = new SpeechSynthesisUtterance('Number' + \"$scpNumber\" + '! . !' + 'Object Class' + \"$objectClass\" + '! . !' + 'Containment Procedures' + \"$scpContainment\" + '! . !' + 'Description' + \"$description\" + '! . !' + 'References' + \"$reference\" + '! . !' + 'Other Information' +  \"$other\");
                            var msg = newMsg
                            msg.rate = 0.7;
                            window.speechSynthesis.speak(msg);
                        }
                        function pauseText() 
                        {
                            window.speechSynthesis.pause();
                        }
                        function resumeText() 
                        {
                            window.speechSynthesis.resume();
                        }
                        </script>
                    ";
                }
                else
                {
                 echo "
                    <h1>Welcome To The SCP Website</h1>
                    <p>Use the menu above to navigate our options.</p>
                 ";   
                }
            
            ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>