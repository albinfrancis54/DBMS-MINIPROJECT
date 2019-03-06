<?php 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(isset($_SESSION['departure_date'])){
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Find train</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

	</head>
<body style="background-color: lightblue;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Ticketing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">
      	<a href="#">Reservation
      	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
      	</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-backward"></span> Back To Home</a></li>
    </ul>
  </div>
</nav>


<div class="container-fluid">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">STEPS FOR BOOKING</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">1. JOURNEY
								</h3>
							</div>
							<div class="panel-body">
								SCHEDULE OF TRAVEL
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">2. FIND TRAIN</h3>
							</div>
							<div class="panel-body">
								Seat Class
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">3. PASSENGER INFO</h3>
							</div>
							<div class="panel-body">
								PASSENGER DETAILS
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">4. PAYMENT INFO</h3>
							</div>
							<div class="panel-body">
								TOTAL PAYMENT
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>

    
<div class="container-fluid">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
			 <h2>
			 	<center>TRAIN</center>
			 </h2>
				<div class="container-fluid">
					<form class="form-horizontal" role="form" id="form-trn">
					  <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
							    <tr>
							        <th> <span class="glyphicon glyphicon-record" aria-hidden="true"></span> 
							        Train Name
							        </th>
							        <th>
							        	<center>
							        		Number Of Stations
							        	</center>
						        	</th>
							        <th>
							        	<center>
							        	Train Number
							        	</center>
						        	</th>
							    </tr>
							</thead>
						    <tbody>
						   		<?php require_once('data/get_all_train.php'); ?>
						   		<tr>
						   			<td>
						   				<input value="<?= $getSit['trn_id']; ?>" type="radio" name="trn">
						   				<?= $getSit['trn_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getSit['trn_stns'] - $totalSit['sit']; ?>
						   			</td>
						   			<td align="center"><?= $getSit['trn_num']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getEcoA['trn_id']; ?>" type="radio" name="trn">
						   				<?= $getEcoA['trn_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getEcoA['trn_stns'] - $totalEcoA['ecoA']; ?>
						   			</td>
						   			<td align="center"><?= $getEcoA['trn_num']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getEcoB['trn_id']; ?>" type="radio" name="trn">
						   				<?= $getEcoB['trn_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getEcoB['trn_stns'] - $totalEcoB['ecoB']; ?>
						   			</td>
						   			<td align="center"><?= $getEcoB['trn_num']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getTour['trn_id']; ?>" type="radio" name="trn">
						   				<?= $getTour['trn_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getTour['trn_stns'] - $totalTour['ecoT']; ?>
						   			</td>
						   			<td align="center"><?= $getTour['trn_num']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getCab['trn_id']; ?>" type="radio" name="trn">
						   				<?= $getCab['trn_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getCab['trn_stns'] - $totalCab['ecoC']; ?>
						   			</td>
						   			<td align="center"><?= $getCab['trn_num']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getDel['trn_id']; ?>" type="radio" name="trn">
						   				<?= $getDel['trn_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getDel['trn_stns'] - $totalDel['ecoD']; ?>
						   			</td>
						   			<td align="center"><?= $getDel['trn_num']; ?></td>
						   		</tr>
						    </tbody>
					    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
                        
<div class="container-fluid">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
			 <h2>
			 	<center>SEAT CLASS</center>
			 </h2>
				<div class="container-fluid">
					<form class="form-horizontal" role="form" id="form-acc">
					  <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
							    <tr>
							        <th> <span class="glyphicon glyphicon-record" aria-hidden="true"></span> 
							        All Classes
							        </th>
							        <th>
							        	<center>
							        		Seat Availability
							        	</center>
						        	</th>
							        <th>
							        	<center>
							        		Fare
							        	</center>
						        	</th>
							    </tr>
							</thead>
						    <tbody>
						   		<?php require_once('data/get_all_accomodations.php'); ?>
						   		<tr>
						   			<td>
						   				<input value="<?= $getSit['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getSit['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getSit['acc_slot'] - $totalSit['sit']; ?>
						   			</td>
						   			<td align="center"><?= $getSit['acc_price']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getEcoA['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getEcoA['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getEcoA['acc_slot'] - $totalEcoA['ecoA']; ?>
						   			</td>
						   			<td align="center"><?= $getEcoA['acc_price']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getEcoB['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getEcoB['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getEcoB['acc_slot'] - $totalEcoB['ecoB']; ?>
						   			</td>
						   			<td align="center"><?= $getEcoB['acc_price']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getTour['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getTour['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getTour['acc_slot'] - $totalTour['ecoT']; ?>
						   			</td>
						   			<td align="center"><?= $getTour['acc_price']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getCab['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getCab['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getCab['acc_slot'] - $totalCab['ecoC']; ?>
						   			</td>
						   			<td align="center"><?= $getCab['acc_price']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getDel['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getDel['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getDel['acc_slot'] - $totalDel['ecoD']; ?>
						   			</td>
						   			<td align="center"><?= $getDel['acc_price']; ?></td>
						   		</tr>
						    </tbody>
					    </table>
				      <div class="form-group">
					    <label for="">Total # of Passenger:</label>
					    <input type="number" min="1" class="form-control" name="totalPass" plactreholder="Total # of Passenger" autocomplete="off">
					  </div>
					  <button type="submit" class="btn btn-success">Book Now
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
                
<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$(document).on('submit', '#form-acc','#form-trn', function(event) {
		event.preventDefault();
		/* Act on the event */
		var acc = $('input[name="acc"]:checked').val();
        var trn = $('input[name="trn"]:checked').val();
		var totalPass = $('input[name="totalPass"]').val();
        
        if(trn == null){
            alert('Please select Train')
        }else{
            
        if(acc == null){
			alert('Please Select Seat!');
		}else{
			// console.log(acc);
			if(totalPass.length == 0){
				alert('Please Enter Number of Passenger!');
			}else{
				$.ajax({
						url: 'data/session_accomodation.php',
						type: 'post',
						dataType: 'json',
						data: {
                            tr :trn,
							acc : acc,
							tp : totalPass
						},
						success: function (data) {
							console.log(data.slot);
							// 	window.location = "passenger.php";
							if(data.slot >= 0){
								window.location = "passenger.php";
							}else{
								alert('No Seats are available!');
							}
						},
						error: function(){
							alert('404 Not found or slow in loading');
						}
					});
			}//end totalPass
		}//end acc == null
        }//end trn == null
	});
</script>
</body>
</html>


<?php
}else{
	echo '<strong>';
	echo 'Page Not Exist';
	echo '</strong>';
}//end if else isset

 ?>