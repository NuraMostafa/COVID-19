<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <style>
        body {
            text-align: center;
            align: center;

        }

        .x {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .sub {
            width: 350px;
            background-color: blue;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .sub:hover {
            background-color: #45a049;
        }

        .form {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>


</head>
<body>
<div class="container">
    <h1>Edit Admin</h1>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
		  
			  Email: <input type="text" name="email" class="x" onkeyup="filter(this)" id="email"><br>
            <br>
   Username: <input type="text" name="username" class="x" onkeyup="filter(this)" id="username"><br>
             Password: <input type="password" class="x" name="password" onkeyup="filter(this)"
                                  id="password"><br> <br>
								
            <br>
 
            

          
            <input type="submit" value="Edit" name="submit" class="sub" class="btn btn-info">
        </form>
    </div>
</div>
</body>
