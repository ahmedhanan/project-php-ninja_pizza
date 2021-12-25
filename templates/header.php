<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
        body {
            min-height: 100vh;
        }
        .brand {
            background-color: #cbb09c;
        }
        .brand-text {
            color: #cbb09c !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .pizza {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>
	<title>Pizza by Ninja</title>
</head>

<body class="grey lighten-4">
	<nav class="white z-depth-0">
		<div class="container">
			<a class="brand-logo brand-text" href="index.php">Ninja Pizza</a>
			<ul id="nav-mobile" class="right hide-on-small-and-down">
				<li>
					<a class="btn brand z-depth-0" href="add.php">Add a pizza</a>
				</li>
			</ul>
		</div>
	</nav>