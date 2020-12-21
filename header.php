<!DOCTYPE html>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<script>
function whenclick() { //whenever the user will click a button he will get this message (just the logout button working).

	alert("כפתור התנתקות הוא הכפתור היחיד שפעיל כרגע בסרגל זה,עמכם הסליחה.");

}
</script>
</head>

<h3 id="mydetails">Noam Gamzo - 205971401 </h3>
<table id="header" align="center">
	<tr>
		<td>Shopping4U</td>
	</tr>
</table>
<table id="options" align="center">
	<tr>
		<td style="width: 20%"></td>
		<td class="actions" onclick="whenclick()" style="width: 15%">אזור אישי</td>
		<td class="actions" onclick="whenclick()" style="width: 15%">קצת עלינו</td>
		<td class="actions" onclick="whenclick()" style="width: 15%">איך משתמשים 
		באתר?</td>
		<td class="actions" onclick="whenclick()" style="width: 15%">צור קשר</td>
		<td class="actions" onclick="location.href='index.php'" style="width: 20%">
		התנתקות מהמשתמש </td>
	</tr>
</table>

</html>
