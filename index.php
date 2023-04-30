<?php require('config.php'); ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Gusti Agung">
  <meta name="description" content="Status server web for fivem server">
  <title><?php echo $title ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo $favicon ?>">
</head>

<body>
  <main>
    <div class="px-4 py-4 my-4 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo $logo ?>" alt="" width="72" height="57">
      <h1 class="display-5 fw-bold text-body-emphasis"><?php echo $name ?></h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"><?php echo $description ?></p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-2">
            <a href="<?php echo $youtube ?>" class="btn btn-outline-dark" target="_blank">
            <i class="fab fa-youtube"></i>
            </a>
            <a href="<?php echo $discord ?>" class="btn btn-outline-dark" target="_blank">
            <i class="fab fa-discord"></i>
            </a>
            <a href="<?php echo $instagram ?>" class="btn btn-outline-dark" target="_blank">
            <i class="fab fa-instagram"></i>
            </a>
        </div>
      </div>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <di class="row">
        <?php
        $settings['title'] = "";
        $settings['ip'] = $ip;
        $settings['port'] = $port;
        $settings['max_slots'] = $max_slots;

        @$content = json_decode(file_get_contents("http://".$settings['ip'].":".$settings['port']."/info.json"), true);
        @$img_d64 = $content['icon'];

        if($content) {
            $list_players = file_get_contents("http://".$settings['ip'].":".$settings['port']."/players.json");
            $content = json_decode($list_players, true);
            $count_players = count($content);
        ?>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Join Server</h5>
                <a href="fivem://connect/<?php echo $ip ?>:<?php echo $port ?>" class="btn btn-primary">Join Now</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Status Server</h5>
                <button type="button" class="btn btn-success">Online</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Total Player</h5>
                  <button type="button" class="btn btn-primary"><?= $count_players ?>/<?= $settings['max_slots'] ?></button>
              </div>
            </div>
          </div>
          <?php } else { ?>
            <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Join Server</h5>
                <button type="button" class="btn btn-primary" disabled>Join Now</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Status Server</h5>
                <button type="button" class="btn btn-danger">Offline</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Total Player</h5>
                  <button type="button" class="btn btn-primary">0/<?= $settings['max_slots'] ?></button>
              </div>
            </div>
          </div>
          <?php
          } ?>
        </div>
      </div>
    </div>
  </main>

  <footer class="text-body-secondary py-5">
    <div class="container text-center">
      <!-- please don't delete/replace, this is as credit -->
      <p>&copy; Gusti Agung <script>document.write(new Date().getFullYear())</script>. All rights reserved.</p>
    </div>
  </footer>

  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>