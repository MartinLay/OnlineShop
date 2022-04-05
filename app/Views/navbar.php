<?php
  $session = session();
?>
<nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top">
      <a class="navbar-brand" href="#">MARTIN SHOP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <?php if($session->get('isLoggedIn')): ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('home/index')?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php if(session()->get('role')==1): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup= "true" aria-expanded="false">Product</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?= site_url('items/index') ?>">Product List</a>
              <a class="dropdown-item" href="<?= site_url('items/create') ?>">Add Product</a>
            </div>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('transaction/index')?>">Transaction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/ci_onlineshooping/public/column-chart">Sales Chart</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('etalase/index')?>">Product</a>
            </li>
          <?php endif ?>
        </ul>
      <?php endif ?>
        <div class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <?php if($session->get('isLoggedIn')): ?>
              <li class="nav-item">
                <a class="btn btn-success" href="<?= site_url('auth/logout') ?>">Logout</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="btn btn-success" href="<?= site_url('auth/login')?>">Login</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-success" href="<?= site_url('auth/register') ?>">Register</a>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>