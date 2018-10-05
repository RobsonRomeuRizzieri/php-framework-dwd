<?php
session_start();
$str_portal_url = $_SESSION["portal_url"];
session_unset();
?>
  <script>
		window.location = '../<?php echo $str_portal_url ?>';
	</script>
