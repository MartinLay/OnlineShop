<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <title>Martin Shop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('bootstrap-4.5.3/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body {
       padding-top: 5rem;
      }
     .starter-template {
       padding: 3rem 1.5rem;
       text-align: center;
     }
    </style>
  </head>

  <body>
    <?= $this->include('navbar') ?>

      <main role="main" class="container">

        <?= $this->renderSection('content') ?>

      </main><!-- /.container -->
      <script src = "<?= base_url('jquery-3.6.0.min.js')?>"></script>
      <script src = "<?= base_url('bootstrap-4.5.3/dist/js/bootstrap.min.js')?>"></script>
    <?= $this->renderSection('script') ?>
  </body>
</html> 