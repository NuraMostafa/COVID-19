<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>COVID</title>
	<link rel="icon" href="img/favicon.png">

	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">

	<link rel="stylesheet" href="css/themify-icons.css">

	<link rel="stylesheet" href="css/flaticon.css">

	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/nice-select.css">

	<link rel="stylesheet" href="css/slick.css">

	<link rel="stylesheet" href="css/style.css">
</head>
<style >
    td{
      color: black;
    }
	tr{
      color: black;
    }
  </style>
<body>
	<br/><br/>
	<?php include("header.php"); ?>
	<section class="about_us padding_top">
	
			
	
<div class="container">
<div class="row justify-content-between align-items-center">
<div class="col-md-6 col-lg-5">
<div class="row align-items-center regervation_content">
<div class="col-lg-7">
<div class="regervation_part_iner">
<form><br/><br/>
<h1>Results</h1>
<br/><br/>
<div class="form-row">
							
<form class="form-group col-md-6">
</div>
<table>
<tr>
                    <thead>
                       <td>ID</td>
                       <td>Email</td> 
                       <td>Gender</td> 
                        <td>Status</td> 

                    </thead>
<!-- <h4>ID:</h4> <br><br>


<h4>Email:</h4> <br><br>


<h4>:</h4> <br><br>


<h4>:</h4>

<br><br> -->
<?php
        $sql = "SELECT * FROM `results`";
        $result = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($rows = mysqli_fetch_array($result)) {
                ?>
                    <td><?php echo $rows[0]; ?></td>
                    <td><?php echo $rows[1]; ?></td>
                    <td><?php echo $rows[2]; ?></td>
					<td><?php echo $rows[3]; ?></td>
                    
                </tr>
                <?php
            }
            ?>

            <?php

        } else {

            echo "No data to view";

        }

        ?>
		</tbody>
    </table>
	<br><br>
	</div>
<div>
              <div class="regerv_btn">

        <button type="submit" name="print" class="btn_2" onclick="window.print()"> Print Result</button>

        </div>
		</div>
		<div>
        <br><br>
 
        <div class="regerv_btn">
        <a href="test.php" class="btn_2">Add New Test</a>
        </div>
		</div>
							

        </form>

		<br/><br/>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<?php include("footer.php"); ?>
</body>
</html>

						
