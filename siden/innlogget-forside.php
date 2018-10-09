<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
	<style>

		body {
			margin: 0;
			padding: 0;
			background-color: #ddd;
		}

		.footer {
			height: 250px;
			background-color: darkgrey;
		}


		/* CSS for flex-box (kolonnene paa siden) */
		.c3-flexbox > div {
			width: 300px;
			min-height: 600px;

			padding: 40px;
			margin: 30px;


			background-color: white;
			font-size: 14px;
		    box-shadow: 5px 10px 18px #c0c0c0;
	
		}

		.c3-flexbox {
			/*margin: 0 10% 0 10%;*/
			/*background-color: grey;*/

			display: flex;
			/*flex-wrap: wrap;*/
			justify-content: center;

			margin-bottom: 50px;
		}

	</style>
</head>

<body>
    <?php
    include_once('header-innlogget.php')
    ?>

	<div class=c3-flexbox>
		<div>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			</p>
			

		</div>
		<div>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
		<div>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
	</div>

	<!-- placeholder -->
	<div class="footer"></div>

</body>

</html>
