<?php
	$title = 'User Cart';
	ob_start();

?>




<?php
  $content = ob_get_clean();
  include './views/pages/user/layout.php';
?>