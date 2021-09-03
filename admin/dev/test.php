<?php
session_start();

if (!$_SESSION['login'] || !$_SESSION['password'] || $_COOKIE['user'] != 'admin') {
    setcookie('user', null, -1, '/');
    session_destroy();
    header('Location: ../../login.php');
    die();
} else {
    require_once '../../header.php';
}
?>



  <div id="wrapper">
    <div id="canvas_container"></div>
    <div class="text">
        <p class="quoteText">Для смены фона <span style="color:#BFE2FF">кликните на него</span></p>
    </div>
    <img id="first" src="<?='\img\news\small\black_hole-sm.jpg'?>" style="display:none;" />
  </div>


<script src="<?='/js/sliders/threeJs/three.min.js'?>"></script>
<script src="<?='/js/sliders/threeJs/gsap.min.js'?>"></script>
<script src="<?='/js/sliders/threeJs/presents.js'?>"></script>



<?php
require_once '../../footer.php';
?>
