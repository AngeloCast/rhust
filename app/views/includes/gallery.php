<?php if(!empty($data[6])) {echo '<h5>GALLERY</h5><br>';} ?>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <?php
      $i = 0;

      foreach($data[6] as $image){
        $active = '';
        if($i == 0){
          $active = 'active';
        }
      
    ?>
    <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $active; ?>"></li>
    <?php $i++; } ?>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner" style="width: 100%; height: auto;">
    <?php
      $i = 0;

      foreach($data[6] as $img){
        $actives = '';
        if($i == 0){
          $actives = 'active';
        }
      
    ?>
    <div class="carousel-item <?= $actives; ?>">
      <img src="<?=BASE_URL . PUBLIC_DIR . '/images/gallery/' . $img['image']; ?>" alt="Gallery Image" style="width:640px; height:360px; ">
    </div>
    <?php $i++; } ?>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>