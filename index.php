<?php 
	include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Adrien's Chat App</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
	
	<link rel="stylesheet" type="text/css" href="css/app.css" />
	
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 display">
				<h1 class="text-center">Adrien's Chat App</h1>
				<div class="message">
					
				</div>
				<form action="" method="post" id="form">
					<?php if(isset($_SESSION["username"])): ?>
					<p><?php echo $_SESSION["username"]; ?><p>
					<?php else: ?>	
					<p>Username:</p>
					<input type="text" name="username" class="form-control">
					<?php endif; ?>
					<p>Message:</p>
					<textarea id="box" name="message" class="form-control"></textarea>

					<input type="submit" value="Send" name="send" class="btn btn-primary">
				</form>
			</div>

		</div>
	</div>

	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>

	<script>
		$(document).ready(function(){

			function scroll() {
				$('.message').animate({
					scrollTop: $('.message')[0].scrollHeight
				},1000);
			}

			setInterval(function(){
				$('.message').load('load.php');



			}, 2000);

			$('#form').on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					url: 'add.php',
					method: 'POST',
					data: $('#form').serialize(),
					success: function(e) {
						$('.message').load('load.php');
						$('#form')[0].reset();
						scroll();
					}
				});
			});
		});

		$('#box').keypress(function(e){
			if (e.which == 13) {
				$.ajax({
					url: 'add.php',
					method: 'POST',
					data: $('#form').serialize(),
					success: function(e) {
						$('.message').load('load.php');
						$('#form')[0].reset();
						scroll();
					}

				});
			};
		});

	</script>
</body>
</html>