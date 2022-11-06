<html>

<head>
	<script type="text/javascript" src="card.js"></script>
	<style>
		.d1 {
			padding: 15px;
			margin: 12px;
			background-color: powderblue;
			border: 1px solid rgb(230, 230, 230);
			cursor: pointer;
			line-height: 25px;
			width: 200px;
			color: #CE38D7;
			background-color: white;
			margin-top: -10px;
			margin-left: 300px;
			opacity: 0.9;
		}

		img {
			width: 16px;
			height: 15px;
		}

		.d2 {
			padding: 15px;
			background-color: powderblue;
			border: 1px solid rgb(230, 230, 230);
			cursor: pointer;
			line-height: 25px;
			width: 200px;
			margin-left: 800;
			margin-right: auto;
			opacity: 0.9;
			margin-top: -500px;
			color: #CE38D7;
			background-color: white;
		}

		body {
			background-color: powderblue;
			margin: 0;
		}

		#c1 {
			font-size: 18px;
			font-family: helvetica;
			background-color: #e3f2fd;
			margin-top: -20;
			width: 100%;
			height: 13%;
			font-size: 50px;
			color: 0F387D;
		}

		#card {
			width: 100%;
			height: 80px;
		}
	</style>

<body>
	<br>
	<div id="c1">
		<center><b>Choose a payment mode: </b></center>
	</div>
	<br>
	<br>
	<div class="d1">
		<div class="i1">
			<form action="pay_amount.php" name="form1"><input type=radio name="r1" required>Credit Card
		</div>
		<img id="card" src="images/credit.jpg">
		<p class="p1">
			Card Number *:<br><input type="text" name="cardNumber" id="cardNum" value="" onblur="validate()" required>
			<br><br>
			CardHolder Name *:<br><input type="text" name="name" id="name" value="" onblur="validate()"
				required><br><br>
			Expiry Date *<br>
			<select name="select">
				<option value="-1" id="exp" required>select
				<option>2020
				<option>2021
				<option>2022
				<option>2023
				<option>2024
				<option>2025
				<option>2026
				<option>2027
				<option>2028
				<option>2029
				<option>2030
			</select><br><br>
			CVV *:<br><input type="text" name="cvv" id="cvv" required><br><br>
			<button onclick="return(validate());"> Make Payment</button>
		</p>
		</form>
	</div>

	<div class="d2">
		<form action="pay_amount.php" name="form1">
			<div class="i2"><input type=radio name="r1" required>Debit Card
			</div></br>
			<img id="card" src="images/cards.jpg">
			<p class="p2">
				Select Bank *<br>
				<select name="select">
					<option value="-1" required>select
					<option>VISA
					<option>Master
					<option>American Express
					<option>Discover
					<option>Diners
				</select><br><br>
				Card Number *:<br><input type="text" name="cardNumber" id="cardNum" value="" onblur="validate()"
					required /><br><br>
				CardHolder Name *:<br><input type="text" name="name" id="name" value="" onblur="validate()"
					required><br><br>
				Expiry Date *<br>
				<select name="select">
					<option value="-1" id="exp" required>select
					<option>2020
					<option>2021
					<option>2022
					<option>2023
					<option>2024
					<option>2025
					<option>2026
					<option>2027
					<option>2028
					<option>2029
					<option>2030
				</select><br><br>
				CVV *:<br><input type="text" name="cvv" id="cvv" required><br><br>
				<button onclick="return(validate());"> Make Payment</button>
			</p>
			<br />
		</form>
	</div>
</body>

</html>