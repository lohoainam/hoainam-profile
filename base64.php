<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<?php $encode=$_POST['encode']; ?>
<?php $decode=$_POST['decode']; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<style>
	textarea{width: 50%;}
	input{width: 50%;}
</style>

</head>
<body>

<h1>Encode</h1>

<form action="/base64.php" method="POST">
	<input type="text" name="encode" value="<?php echo htmlspecialchars($encode); ?>" autocomplete="off">
</form>

<br>

<textarea rows="10">
<?php echo base64_encode($encode); ?>
</textarea>

<h1>Decode</h1>

<form action="/base64.php" method="POST">
	<input type="text" name="decode" value="<?php echo htmlspecialchars($decode); ?>" autocomplete="off">
</form>

<br>

<textarea rows="10">
<?php echo htmlspecialchars(base64_decode($decode)); ?>
</textarea>

<!-- Thanks :) -->

</body>
</html>