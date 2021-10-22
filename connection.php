<?php
    
    // Database credentials
    $user = "a3004662_SCPUSER";
    $pw = "zxcvasdfqwer1234";
    $db = "a3004662_SCP";
    
    // Database connection PHP object
    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));
    
    // Return all records from database and save as variable
    $result = $connection->query("SELECT * FROM `SCP`") or die(mysqli_error($connection));
    
    // Code for the Form for inserting into the database
    if(isset($_POST['submit']))
    {
        
        // Store values form the form here
        $image = $_POST['img'];
        $scpNumber = $_POST['scpNumber'];
        $objectClass = $_POST['objectClass'];
        $scp = $_POST['scp'];
        $description = $_POST['description'];
        $reference = $_POST['reference'];
        $other = $_POST['other'];

        // Create insert command that will take form values in store in table
        $insert = "INSERT INTO `SCP` ( `img`, `scpNumber`, `objectClass`, `scp`, `description`, `reference`, `other`) VALUES ('$image', '$scpNumber', '$objectClass', '$scp', '$description', '$reference', '$other')";
        
        // Connect to database and run $insert query
        if($connection->query($insert) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a {
                        background-color: #008CBA;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>SCP Record Added Successfully</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a {
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error Submitting SCP Record</h1>
                <p>$connection->error</p>
                <p><a href='form.php'>Back to form page</a></p>
            ";
        }
    }
    
    // Delete Record Function
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        // Delete SQL Command
        $del = "Delete FROM SCP WHERE id=$id";
        
        if($connection->query($del) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a {
                        background-color: #008CBA;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>SCP Record Deleted Successfully</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a {
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error Deleting SCP Record</h1>
                <p>$connection->error</p>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }
    
    // Update Record Function
    if(isset($_POST['update']))
    {
        // Create Variables from our posted form values
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        $img = mysqli_real_escape_string($connection, $_POST['img']);
        $scpNumber = mysqli_real_escape_string($connection, $_POST['scpNumber']);
        $objectClass = mysqli_real_escape_string($connection, $_POST['objectClass']);
        $scp = mysqli_real_escape_string($connection, $_POST['scp']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $reference = mysqli_real_escape_string($connection, $_POST['reference']);
        $other = mysqli_real_escape_string($connection, $_POST['other']);
        
        // Update SQL Command
        $update = "UPDATE `SCP` SET `img` = '$img', `scpNumber` = '$scpNumber', `objectClass` = '$objectClass', `scp` = '$scp', `description` = '$description', `reference` = '$reference', `other` = '$other' WHERE `SCP`.`id` = '$id'";
        
        // Run update query and display success or error message.
        if($connection->query($update) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a {
                        background-color: #008CBA;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record Updated Successfully</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
                style>
                    body{font-family: sans-serif;}
                    a {
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error Updating Record</h1>
                <p>$connection->error</p>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }
?>