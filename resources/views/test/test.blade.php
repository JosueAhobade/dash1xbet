<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test file</title>
</head>
<body>
<form action="send-message" method="post">
	@csrf
	<div class="form-control">
		<input type="text" name="phone" placeholder="Phone number">
	</div>
	<button type="submit">Envoyer</button>
</form>
</body>
</html>