<!DOCTYPE html>
<html lang="en">
    <head>
        <title>smashisland.com - Events Page</title>
        <!--
            * Smash Island Tournament Events
            * 
            * @author Travis Trotto
        -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
         <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

            <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Exo&family=Roboto&display=swap" rel="stylesheet" rel="stylesheet"> 

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/main.css" rel="stylesheet"/>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>

         <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-bottom">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Smash Island</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="events.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.ssbwiki.com/Staten_Island_Power_Rankings" target="_blank">Rankings</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://discord.gg/ZMdKf5w8Cp" target="_blank">Discord</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
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
           //Web Hosted Database 
            /*
            $mysqli = new mysqli('sql102.epizy.com','epiz_28746526','yau58yvYfM','epiz_28746526_crud') or die(mysqli_error($mysqli));
            */

            //Local Hosted Database /**/
            $mysqli = new mysqli('localhost', 'root', 'uY2@b*', 'crud') or die(mysqli_error($mysqli));


            $result = $mysqli->query("SELECT * FROM data ORDER BY id DESC") or die($mysqli->error);
            // pre_r($result);
            ?>

            <div class="table-container">
                <div class="container">
                  <h2>Tournaments</h2>
                  <!--
                  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
                  -->          
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Winner(s)</th>
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
                                <td><span class="spoiler"><?php echo $row['winners']; ?></span></td>
                            </tr>
                    <?php endwhile; ?>
                  </table>
                </div>
            </div>
        </form>

        <footer class="py-5 bg-dark">
            <br><br>
            <div class="container"><p class="m-0 text-center" id="red-text">Copyright &copy; Smash Island 2021</p></div>
        </footer>

        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
