<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Project Collaboration</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>


<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Project Collaborator  |</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="myaccount.php">My Projects </a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href="upload.php">Upload Project </a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href="recent.php">Recent Projects </a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</nav>

<?php
session_start();
require "dbconn.php";
$usrName = $_SESSION['userSession'];

$sqlquery = "select * from projects";
$result = $conn->query($sqlquery);

while($row = mysqli_fetch_array($result))                     // Display all images
{
  $sqlquery1 = "select Language from languages where Id =".$row[0]."";
  $res = $conn->query($sqlquery1);
        echo '<div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span8">
                <h4><strong>'.$row[2].'</strong></h4>
                <h5>Looking for: '.$row[4].'</h5>
              </div>
            </div>
            <div class="row">
              <div class="span10">      
                <p>
                  '.$row[3].'

                </p>
               <!-- <p><a class="btn" href="#">Read more</a></p> -->
              </div>
            </div>
            <div class="row">
              <div class="span8">
                <p></p>
                <p>
                   <i class="icon-tags"></i> Tags : ';
                    
                   while($lan = mysqli_fetch_array($res))
                   { 
                      echo '<span class="label label-info" style="margin-left: 1em">'.$lan[0].'</span>';  
                   }
                   
                echo '</p>
              </div>
            </div>
            <div class="row">
              <div class="span8">
                <p></p>
                <p>
                  <i class="icon-user"></i> by <a href="#">'.$row[1].'</a><br> 
                   <i class="icon-calendar"></i> Contact: '.$row[5].'
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>';         
}

?>

</body>
</html>