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
				<input style = 'width: 30%;'class='form-control form-control-lg' name = 'age' type='number' min = '0' max='100' id = 'age' required> <br>
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
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'yearEarn' type='number' min = '0' id = 'yearEarn' required> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			}

			else if($user->complete == '2'){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label style='font-size:2em;' for = 'monthExp'  id = 'monthExp'>Monthly subscriptions cons</label> <br>				
				</div>
				<div class = 'd-flex justify-content-center'>	
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'monthExp' type='number' min = '0'  id = 'monthExp' required> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			}
			else if($user->complete == '3'){
				// echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<div class = 'd-flex justify-content-center'>
				<label style='font-size:2em;' for = 'housing'  id = 'housing'>Monthly cost of housing</label> <br>				
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
				<label style='font-size:2em;' for = 'food'  id = 'food'>Monthly food costs</label> <br>	
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
				<label style='font-size:2em;' for = 'misc'  id = 'misc'>Monthly miscellaneous costs</label> <br>				
				</div>
				<div class = 'd-flex justify-content-center'>	
				<input style = 'width: 30%;' class='form-control form-control-lg' name = 'misc' class='form-control form-control-lg'  type='number' min = '0'  id = 'misc' required> <br>
				<input type='submit' value='Next' class='btn btn-black'>
				</div>
				</form>";
			
			}else { //complete
				echo  "<h1><center>Your Portfolio</center></h1>";
				echo "<h4 style='position:fixed; right:16%'>Percentage of yearly income spent</h4>";
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

				echo "With the data you have provided us, it appears that you are spending about $percentage% of your yearly income, this leaves you with $$diff.</br>";

				$foodAvg = 200;
				if($user->food > $foodAvg){
					$foodSaved = $user->food - $foodAvg;
					$totalExpenseYearLessFood = ($totalExpenseMonth*12) - ($foodSaved * 12);
					$percentageSpentLessFood = ($totalExpenseYearLessFood) / ($yearEarned);
					$diffLessFood = $yearEarned - $totalExpenseYearLessFood;
					$percentageLessFood = round($percentageSpentLessFood * 100,2);
					echo "If you cut down on food costs to that of the average, you would instead be spending about <b>$percentageLessFood%</b> of your yearly income, leaving you with <b>$$diffLessFood.</b></br>";
				}
				$totalExpenseMonthNoMisc = $user->monthExp + $user->housing + $user->food;
				$totalExpenseYearNoMisc = ($totalExpenseMonthNoMisc*12);
				$percentageSpentNoMisc = ($totalExpenseYearNoMisc) / ($yearEarned);
				$diffNoMisc = $yearEarned - $totalExpenseYearNoMisc;
				$percentageNoMisc = round($percentageSpentNoMisc * 100,2);
				echo "If you cut down on miscellaneous costs, you would instead be spending about <b>$percentageNoMisc%</b> of your yearly income, leaving you with <b>$$diffNoMisc.</b></br>";
				
				$totalExpenseMonthNoSub = $user->housing + $user->food + $user->misc;
				$totalExpenseYearNoSub = ($totalExpenseMonthNoSub*12);
				$percentageSpentNoSub = ($totalExpenseYearNoSub) / ($yearEarned);
				$diffNoSub = $yearEarned - $totalExpenseYearNoSub;
				$percentageNoSub = round($percentageSpentNoSub * 100,2);

				echo "If you cut down on subscription costs, you would instead be spending about <b>$percentageNoSub%</b> of your yearly income, leaving you with <b>$$diffNoSub.</b></br>";
				echo "For more information on investing, visit <a href='/Default/Tips'>here</a>, or to find our recommended investment strategy visit <a href='/Default/Invest'>here</a>.";
			}
			?>
	</div>
</body>

</html>
