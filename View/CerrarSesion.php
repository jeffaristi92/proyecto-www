<?php
	session_start();
	unset($_SESSION['']);
	session_destroy();
?>
<script type"text/javascript" language"javascript">
	alert('Usted ha cerrado sesión');
	location.href="../index2.php";
</script>
