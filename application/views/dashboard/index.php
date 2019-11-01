

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="col-md-12">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
      <li data-target="#myCarousel" data-slide-to="8"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo base_url()?>/uploads/1.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

       <div class="item">
        <img src="<?php echo base_url()?>/uploads/2.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

      <div class="item">
        <img src="<?php echo base_url()?>/uploads/3.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

      <div class="item">
        <img src="<?php echo base_url()?>/uploads/4.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

      <div class="item">
        <img src="<?php echo base_url()?>/uploads/5.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

       <div class="item">
        <img src="<?php echo base_url()?>/uploads/6.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

    <div class="item">
        <img src="<?php echo base_url()?>/uploads/7.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

            <div class="item">
        <img src="<?php echo base_url()?>/uploads/8.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

      <div class="item">
        <img src="<?php echo base_url()?>/uploads/9.jpg" alt="" style="height:800px; display: block;margin-left: auto;margin-right: auto;">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>

