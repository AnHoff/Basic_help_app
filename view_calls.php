<?php
  session_start();
  if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'Y') {
    header('Location: index.php?login=error2');
  };

  // reading archive
  $archive = fopen('callarchive.txt', 'r');

  while (!feof($archive)) {
    $register = fgets($archive);
    $calls[] = $register;
  }

  // closing archive
  fclose($archive);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-viewcall {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <!-- Menu -->
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="png/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Help Desk
      </a>
            
      <!-- Logoff button -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Log Out</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <!-- A card begins here! -->
        <div class="card-viewcall">
          <div class="card">
            <div class="card-header">
              View calls
            </div>
            
            <div class="card-body">

              <?php foreach ($calls as $lines) { ?>
                
                <!-- Working with the .txt archive -->
                <?php
                  // organizing users inputs
                  $content = explode('/', $lines);

                  // show content if the user has created it, only
                  if ($_SESSION['profile_id'] == 2) {
                    if ($_SESSION['id'] != $content[0]) {
                      continue;
                    };
                  };

                  // show everything (adm only)
                  if (count($content) < 4) {
                    continue;
                  };
                ?>
              
                <!-- Print user inputs -->
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $content[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $content[2] ?></h6>
                    <p class="card-text"><?php echo $content[3] ?></p>
                  </div>
                </div>

              <?php } ?>
              
              <!-- Home button -->
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Home</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>