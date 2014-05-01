<?php
	session_start();
	unset($_SESSION['']);
	session_destroy();
?>
<script type="text/javascript" language="javascript">
	location.href="../index.php";
</script>
