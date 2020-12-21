<?php
	session_start();
?>
<!DOCTYPE>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<title>iFrame1</title>
<script>
function callproc2b()	{
	parent.document.getElementById('iframe2').src = "showreportsactive.php";
}
</script>
</head>

<body>

<div align="center">
	<table style="width: 100%">
		<tr>
			<td style="height: 230px"></td>
		</tr>
		<tr>
			<td class="bottuns_dat1" onclick="callproc2b()" style="height: 80px">
			לחץ כאן על מנת לראות את דוח הרכישות שלך:</td>
		</tr>
	</table>
</div>

</body>

</html>
