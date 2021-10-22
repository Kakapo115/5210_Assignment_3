<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="Css/Styling.css" rel="stylesheet">

    <title>Enter Record</title>
  </head>
  <body class="container">
      
      <!-- Menu Div -->
    <div class="row" id="header">
        <div class="col">
            <img src="images/logo.png" id="header_image" alt="SCP Logo">
            <a class="navbar-brand head-text" href="index.php" style="font-size: 40px;">SCP Foundation</a>
        </div>
    </div>
    
    <h1>Enter Record Below...</h1>
    <form class="form-group" method= "post" action="connection.php">
        
        <label>Add Image Address</label>
        <br>
        <input type="text" name="img" class="form-control" placeholder="images/name-of-image...">
        <br>

        <label>SCP Number*:</label>
        <br>
        <input type="text" class="form-control" name="scpNumber" placeholder="SCP-???" required>
        <br>

        <label>Object Class*:</label>
        <br>
        <input type="text" class="form-control" name="objectClass" placeholder="Euclid?" required>
        <br>

        <label>SCP Containment Information*:</label>
        <br>
        <textarea class="form-control" name="scp" rows="10" required></textarea>
        <br>

        <label>Description*:</label>
        <br>
        <textarea class="form-control" name="description" rows="10" required></textarea>
        <br>

        <label>References:</label>
        <br>
        <textarea class="form-control" name="reference" rows="10"></textarea>
        <br>

        <label>Other Information:</label>
        <br>
        <textarea class="form-control" name="other" rows="10"></textarea>
        <br>
              
        <br><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit Record">
    </form>
    <br><br>
    <p>
        <a href="index.php" class="btn btn-dark">Back To Index Page.</a>
    </p>
    
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