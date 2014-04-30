<?php
	header('Content-Type: text/html; charset=UTF-8');//para que aparezan las tildes
	session_start();
	unset($_SESSION['']);
	session_destroy();
?>
<script type"text/javascript" language"javascript">
	alert('Usted ha cerrado sesión');
	location.href="../index.php";
</script>
