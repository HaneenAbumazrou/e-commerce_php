<?php
	$title = 'Not Found Page';
	ob_start();
?>


<div>
  <img src="/public/user/assets/images/404.png" alt="404" class="img-fluid">
</div>



<?php
  $content = ob_get_clean();
  include './views/pages/user/layout.php';
?>