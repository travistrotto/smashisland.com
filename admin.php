<!DOCTYPE html>
<html lang="en">
    <head>
        <title>smashisland.com - TO Panel</title>
        <!--
            * Smash Island Tournaments TO Panel 
            * @author Travis Trotto
        -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Staten Island Smash Tournament TO Panel" />
        <meta name="author" content="Travis Trotto" />

        <!-- Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Exo&family=Roboto&display=swap" rel="stylesheet" rel="stylesheet"> 

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/main.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>

        <!-- Menu Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-bottom">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Smash Island</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="events.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.ssbwiki.com/Staten_Island_Power_Rankings" target="_blank">Rankings</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/streams.html">Streams</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://discord.gg/ZMdKf5w8Cp" target="_blank">Discord</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

          <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Smash Island Events</h1>
                    <p class="lead mb-0">Our latest event can be found here:</p>
                    <a href="https://smash.gg/si">smash.gg/si</a>
                </div>
            </div>
        </header>

        <?php require_once 'process.php'; ?>

        <?php 

        if (isset($_SESSION['message'])): ?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">

            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <div class="container">
        

        <?php
           //Web Hosted Database 
            /*
            $mysqli = new mysqli('sql102.epizy.com','epiz_28746526','yau58yvYfM','epiz_28746526_crud') or die(mysqli_error($mysqli));
            */

            //Local Hosted Database /**/
            $mysqli = new mysqli('localhost', 'root', 'uY2@b*', 'crud') or die(mysqli_error($mysqli));


            $result = $mysqli->query("SELECT * FROM data ORDER BY id DESC") or die($mysqli->error);
            // pre_r($result);
            ?>

            <div class="row justify-content-center" >
            <form action="process.php" method="POST">
            <h2>Add Events</h2>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label><strong>Event Name</strong></label>
                    <input type="text" name="name" class="form-control" 
                    value="<?php echo $name; ?>" placeholder="Event Name">
                </div>
                <div class="form-group">
                    <label><strong>Bracket Link</strong></label>
                    <input type="text" name="link" class="form-control" 
                    value="<?php echo $link; ?>" placeholder="https://smash.gg/...">
                </div>
                <div class="form-group">
                    <label><strong>Date of Event</strong></label>
                    <input type="text" name="date" class="form-control" 
                    value="<?php echo $date; ?>" placeholder="MM-DD-YYYY">
                </div>
                <div class="form-group">
                    <label><strong>Winner(s)</strong></label>
                    <input type="text" name="winners" class="form-control" 
                    value="<?php echo $winners; ?>" placeholder="Winner1, Winner2">
                </div>

                <div class="form-group">
                    <?php 
                    if ($update == true):  
                    ?>
                        <button type="submit" class="form-control btn btn-primary" name="update">Update</button>
                    <?php else: ?>
                        <button type="submit" class="form-control btn btn-primary" name="save">Submit</button>
                    <?php endif; ?>
                </div>

            </form>

            
            <div class="table-container">
                <div class="container">
                <h2>+/-</h2>
                  <!--
                  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
                  -->          
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Winner(s)</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>

                    <?php
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <a href=<?php echo $row['link']; ?>>
                                    <?php echo $row['name']; ?>     
                                </td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['winners']; ?></td>
                                <td>
                                   <a href="admin.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">edit</a>
                                   <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                    <?php endwhile; ?>
                  </table>
                </div>
            </div>

            <?php
            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>

         <!-- Copyright -->
        <footer class="py-5 bg-dark">
            <br><br><br><br><br><br><br><br><br><br><br>
            <div class="container"><p class="m-0 text-center" style="color: black;">Copyright &copy; Smash Island 2021</p></div>
            <br><br><br><br>
        </footer>


        </div>

            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
    </body>
</html>
