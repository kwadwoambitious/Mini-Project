<?php
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>
<?php 
  $title = "Resources";
  include('includes/home-header.php');
?>

<div class="res-container">
   <h1>HTML</h1>
   <hr>
   <div class="contents">
    <div>
        <iframe width="600" height="315" src="https://www.youtube.com/embed/kUMe1FH4CHE?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="600" height="315" src="https://www.youtube.com/embed/qz0aGYrrlhU?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="600" height="315" src="https://www.youtube.com/embed/OUjU--gVylE?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="600" height="315" src="https://www.youtube.com/embed/HD13eq_Pmp8?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <!-- <div>
        <iframe width="600" height="315" src="https://www.youtube.com/embed/UB1O30fR-EE?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="600" height="315" src="https://www.youtube.com/embed/mJgBOIoGihA?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div> -->
   </div>

   <h1>CSS</h1>
   <hr>
   <div class="contents">
    <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/wRNinF7YQqQ?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/1Rs2ND1ryYc?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/yfoY53QXEnI?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/K1naz9wBwKU?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <!-- <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ieTHC78giGQ?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/jx5jmI0UlXU?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div> -->
   </div>
</div>
<?php
   include('script.php');
?>