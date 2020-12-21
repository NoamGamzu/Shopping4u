<?php
	// All rights reserved to Gideon Koch 2020 
	session_start();
	// chat.php?t1=1&t2=1
	if (isset($_REQUEST['t1'])) $t1 = $_REQUEST['t1']; 		// my id
	if (isset($_REQUEST['t2']))	$t2 = $_REQUEST['t2']; 		// your id

// $t1 = first caller
// $t2 = second caller
?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="chat.ico">

<title>GK Chat</title>
<style>
* {
	 font-family:"Calibri Light";
	 font-size:18px;
}
</style>
<script>
// add a talk
t1 = '<?php echo $t1 ?>';
t2 = '<?php echo $t2 ?>';
last_chat_id = 0;	// the last chat id
call_counter = 0;	// call counter
go_check = 1;		// 1 - continue check 0 - stop


// Show the line in my window
function show_chat(str)
{
	var objDiv = document.getElementById("chat_talk");
	objDiv.innerHTML += str;
	objDiv.scrollTop = objDiv.scrollHeight;	// Show
}

// AJAX call to add the text
function add_talk(talk) 
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		last_chat_id = this.responseText;
    }
  };
  xhttp.open("GET", "chat_add_line.php?t1="+t1+"&t2="+t2+"&talk="+talk, true);
  xhttp.send();
}
// localhost:8080/chat/chat_add_line.php?t1=1&t2=2&talk=new%20string
// localhost:8080/chat/chat_get_line.php?t1=1&t2=2&last_chat_id=

// send the line to the server and show it
function send_talk()
{
	send_str = document.getElementById("Text1").value;

	// Replace " with ' so it will path to the AJAX
	send_str = send_str.replace(/"/g, "'");	
		
	add_talk(send_str);			// save to DB
	show_chat("אני: "+send_str+"<br>");		// show in my
	
	document.getElementById("Text1").value = "";
	document.getElementById("Text1").focus();
}

// Get the last items in the chat
function get_talk()
{
	var ta = [];
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	rec_str = this.responseText;
    	if (rec_str != "") {
    		ta = rec_str.split("~~");			// 	text ~~ last_chat_id
			last_chat_id = parseInt(ta[1]);    	// 	Save the last chat id
			show_chat(ta[0]);
		}
		if (go_check) {
			call_counter += 1; 
			document.title = call_counter; 
			setTimeout(get_talk, 5000); 	// show counter
		} else {
			document.title='GK-Chat'; 	// pause
		}			
    }
  };
  xhttp.open("GET", "chat_get_line.php?t1="+t1+"&t2="+t2+"&last_chat_id="+last_chat_id, true);
  xhttp.send();
}

// clear database from this conversation
// If you want to keep it do it befor this function
function end_talk()
{
	go_check=0;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		window.close();	// close the window
    }
  };
  xhttp.open("GET", "chat_end.php?t1="+t1+"&t2="+t2, true);	// Clean the table from this talk
  xhttp.send();
}

// Detect enter in the input text
function key_up(event)
{
	if (event.keyCode == 13) send_talk()
}
</script>

</head>
<body>
<div align="center" dir="rtl">
	<div style="width:300px; height:450px; border:1px #999966 solid; box-shadow: 2px 2px 12px #666;">
		<div id="chat_talk" dir="rtl" style="height:300px; overflow-y:scroll; padding:10px; text-align:right"></div>
		<br>
		<input id="Text1" type="text" dir="rtl" onkeyup="key_up(event)">
		<input name="Button1" type="button" value="שלח" onclick="send_talk()" title="Send line.">
		<br><br>
		<input name="Button1" type="button" value="סיום" style="width:90%" onclick="end_talk()" title="Close and delete the conversation data.">
	</div>
</div>


<script>
get_talk();	// Start talking
</script>
</body>

</html>
