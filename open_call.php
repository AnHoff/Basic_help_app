<?php
  session_start();
  if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'Y') {
    header('Location: index.php?login=error2');
  };
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-opencall {
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

        <div class="card-opencall">
          <div class="card">
            <div class="card-header">
              Open Call
              <?php if (isset($_GET['submit']) && $_GET['submit'] == 'success') { ?>
                <span class="text-success">Success!</span>
              <?php }; ?>
            </div>

            <!-- Here the card really begins! -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <!-- Creating a simple form -->
                  <form method="post" action="register_call.php">
                    <div class="form-group">
                      <label>Title</label>
                      <input name="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    
                    <div class="form-group">
                      <label>Type</label>
                      <select name="type" class="form-control">
                        <option>User</option>
                        <option>Product</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>System</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Cancel and Open buttons -->
                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block" href="home.php">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Open</button>
                      </div>
                    </div>
                  </form>
                  <!-- Form ends here -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>