<!DOCTYPE html>
	<html lang="en">

	<title></title>

	<head>

	<style>
			#container{
				border:1px solid green;
				padding:30px;
			}
	</style>
	</head>

	<body>
				<div id="container">
						<form action="index.php" method="POST">
							email:<input type="email" name="sender" /><br />
							password:<input type="password" name="senderpasswd"/><br />
							TO: <input type="email" name="emailto"/><br />
							SUBJECT: <input type="text" name="subject" /><br />
							MESSAGET<textarea name="msg"></textarea><br />
							<input type="submit" value="send"/>

						</form>
				</div>
	</body>
	</html>