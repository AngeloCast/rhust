<?php if(!empty($data[1])) {echo '<br><h3 style="font-family: arial narrow;">Read Health Articles </h3><br>';} ?>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <?php
      $i = 0;

      foreach($data[1] as $image){
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

      foreach($data[1] as $img){
        $actives = '';
        if($i == 0){
          $actives = 'active';
        }
      
    ?>
    <div class="carousel-item <?= $actives; ?>">
      
        <a href="<?=site_url('home/view_post/'.$img['id']);?>">
        <img src="<?=BASE_URL . PUBLIC_DIR . '/images/' . $img['photo']; ?>" alt="Gallery Image" width="1100" height="500">
        </a>
        <div class="carousel-caption">
          <h3><?=$img['title'];?></h3>
          <p><?='Published: ' . date('F d Y', strtotime($img['date']));?></p>
        </div>
      
      
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
<br>