<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<link href="<?= base_url('bootstrap-4.5.3/site/docs/4.5/examples/carousel/carousel.css') ?>" rel="stylesheet">  
 
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
  <div class="carousel-item active">
    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg>

    <div class="container">
      <div class="carousel-caption text-left">
      <h1 class="display-3">Welcome To Martin Shop</h1>
  <h4> 
		<?php
			echo session()->get('username');
		?>
  </h4>
        <p><a class="btn btn-lg btn-primary" href="#">Shop Now</a></p>
      </div>
    </div>
  </div>
  <div class="carousel-item">
    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg>

    <div class="container">
      <div class="carousel-caption">
        <h1>Another example headline.</h1>
        <p>Some representative placeholder content for the second slide of the carousel.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="carousel-item">
    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg>

    <div class="container">
      <div class="carousel-caption text-right">
        <h1>One more for good measure.</h1>
        <p>Some representative placeholder content for the third slide of this carousel.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
      </div>
    </div>
  </div>
</div>
<button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</button>
</div>
<?= $this->endSection() ?>