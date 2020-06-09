<!DOCTYPE html>
<html>
<head>
	<title>Send Mail</title>
</head>
<body>
	<form method="post" action="v1/sendmailwithtemplate.php">
	    <h1>Micro Service Email</h1>
		<input type="text" name="recipient" placeholder="enter recipient"/>
		<br />
		<br />
		<input type="text" name="sender" placeholder="enter sender"/>
		<br />
		<br />
		<input type="text" name="subject" placeholder="enter subject"/>
		<br />
		<br />
		<input type="text" name="htmlbody" placeholder="enter body"/>
		<br />
		<br />
		<input type="text" name="cc" placeholder="enter cc"/>
		<br />
		<br />
		<input type="text" name="bcc" placeholder="enter bcc"/>
		<br />
		<br />
		<input type="submit" value="Submit">
	</form>
</body>
</html>