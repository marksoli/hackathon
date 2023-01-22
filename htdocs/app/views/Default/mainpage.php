<html>

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/spendwiser.css" />
	<title>Main Page</title>
</head>

<body>
	
	<div class="container-fluid" style="padding:0;">
			<ul>
			<li><a href="/Default/index">Spendwiser</a></li>
			<li><a href="/Default/invest">Investing</a></li>
			<li><a href="/Default/index">Tips</a></li>
			<li><a href="/Login/Logout">Logout</a></li>
			</ul>
			<?php
			
				if(isset($model['error'])){
					echo "<div class='alert alert-danger'> $model[error] </div>";
				}
			
			$user = $model['User'];
			
			// $name = $user->first_name . " " .$user->last_name;
			// echo "Hello $name";
			if(!$user->complete){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form class='' action='/Default/complete' method='POST'>
				<div class='form-group'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label  style='font-size:2em;' for = 'age'  id = 'age'>What is your age?</label> <br>
				</div>
				<div class = 'd-flex justify-content-center'>				
				<input style = 'width: 30%;'class='form-control form-control-lg' name = 'age' type='number' min = '0' max='100' id = 'age'> <br>
				<button type='submit' name='action' value='submit' class='btn btn-black'>Next</button>
				</div>
				</form>";
			} 
			else if($user->complete == '1'){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label style='font-size:2em;' for = 'yearEarn'  id = 'yearEarn'>Yearly Earnings</label> <br>		
				</div>
				<div class = 'd-flex justify-content-center'>		
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'yearEarn' type='number' min = '0' id = 'yearEarn'> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			}

			else if($user->complete == '2'){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label style='font-size:2em;' for = 'monthExp'  id = 'monthExp'>Current Monthly expenditure on Subscriptions</label> <br>				
				</div>
				<div class = 'd-flex justify-content-center'>	
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'monthExp' type='number' min = '0'  id = 'monthExp'> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			}
			else if($user->complete == '3'){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label style='font-size:2em;' for = 'housing'  id = 'housing'>How much do you spend on housing, if any? </label> <br>				
				</div>
				<div class = 'd-flex justify-content-center'>	
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'housing' class='form-control form-control-lg' type='number' min = '0'  id = 'housing' required> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			}  
			else if($user->complete == '4'){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label style='font-size:2em;' for = 'food'  id = 'food'>How much do you spend on food? </label> <br>	
				</div>	
				<div class = 'd-flex justify-content-center'>		
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'food' class='form-control form-control-lg' type='number' min = '0'  id = 'food' required> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			}
			else if($user->complete == '5'){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label style='font-size:2em;' for = 'misc'  id = 'misc'>How much do you spend on miscellaneous? </label> <br>				
				</div>
				<div class = 'd-flex justify-content-center'>	
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'misc' class='form-control form-control-lg' 	 type='number' min = '0'  id = 'misc' required> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			
			}else { //complete
				echo  "<h1><center>Your Portfolio</center></h1>";
				echo "<canvas id='myChart' style='width:100%;max-width:600px'></canvas>";
				echo "<script>
					var xValues = ['Subscriptions', 'Housing', 'Food', 'Miscellaneous'];
					var yValues = [$user->monthExp, $user->housing, $user->food, $user->misc];
					var barColors = [
					'#b91d47',
					'#00aba9',
					'#2b5797',
					'#e8c3b9'
					];

					new Chart('myChart', {
					type: 'pie',
					data: {
						labels: xValues,
						datasets: [{
						backgroundColor: barColors,
						data: yValues
						}]
					},
					options: {
						title: {
						display: true,
						text: 'Monthly spending visualized',
						}
					}
					});
					</script>";
				$totalExpenseMonth = $user->monthExp + $user->housing + $user->food + $user->misc;
				$totalExpenseYear = ($totalExpenseMonth*12);
				$yearEarned = $user->yearEarn;
				$percentageSpent = ($totalExpenseYear) / ($yearEarned);
				$diff = $yearEarned - $totalExpenseYear;
				if($percentageSpent >= 0.70 && $diff <= 10000){
					// echo $percentageSpent . " " . $diff;
				}
				$percentage = round($percentageSpent * 100,2);
					echo "<div class='wrap-circles'>
					<div class='circle percent'  style='background-image: conic-gradient(#f01515 $percentage%, #08e65d 0);'>
					  <div class='inner'>$percentage%</div>
					</div>
					</div>";

				echo "Recommendations: We firstly ";

			}
			?>
	</div>
</body>

</html>
