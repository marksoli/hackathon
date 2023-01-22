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
			<li><a href="/Default/invest">Invest</a></li>
			<li><a href="/Login/Logout">Logout</a></li>
			</ul>
			<?php
			
				if(isset($model['error'])){
					echo "<div class='alert alert-danger'> $model[error] </div>";
				}
			
			$user = $model['User'];
			
			$name = $user->first_name . " " .$user->last_name;
			echo "Hello $name";
			if(!$user->complete){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form class='' action='/Default/complete' method='POST'>
				<div class='form-group'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'age'  id = 'age'>What is your age?</label> <br>				
				<input name = 'age' class='form-control' type='number' min = '0' max='100' id = 'age' required> <br>
				<input type='submit' value='Next Question'>
				</div>
				</form>";
			} 
			else if($user->complete == '1'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'yearEarn'  id = 'yearEarn'>Yearly Earnings</label> <br>				
				<input name = 'yearEarn' class='form-control form-control-lg' type='number' min = '0' id = 'yearEarn' required> <br>
				<input type='submit' value='submit'>
				</form>";
			}

			else if($user->complete == '2'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'monthExp'  id = 'monthExp'>Current Monthly expenditure on Subscriptions</label> <br>				
				<input name = 'monthExp' class='form-control form-control-lg' type='number' min = '0'  id = 'monthExp' required> <br>
				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->complete == '3'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'housing'  id = 'housing'>How much do you spend on housing, if any? </label> <br>				
				<input name = 'housing' class='form-control form-control-lg' type='number' min = '0'  id = 'housing' required> <br>
				<input type='submit' value='submit'>
				</form>";
			}  
			else if($user->complete == '4'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'food'  id = 'food'>How much do you spend on food? </label> <br>				
				<input name = 'food' class='form-control form-control-lg' type='number' min = '0'  id = 'food' required> <br>
				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->complete == '5'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'misc'  id = 'misc'>How much do you spend on miscellaneous? </label> <br>				
				<input name = 'misc' class='form-control form-control-lg' 	 type='number' min = '0'  id = 'misc' required> <br>
				<input type='submit' value='submit'>
				</form>";
			// }
			// else if($user->complete == '6'){
			// 	echo  "<h1><center>First Visit Questionnaire</center></h1>";
			// 	echo "<form action='/Default/complete' method='POST'>
			// 	<input type='text' style='display:none;' name='complete' id='complete' />

			// 	<label for = 'saving'  id = 'saving'>How much are you saving, if any? </label> <br>				
			// 	<input name = 'saving' type='number' min = '0'  id = 'saving' required> <br>


			// 	<input type='submit' value='submit'>
			// 	</form>";
			// }
			// else if($user->complete == '7'){
			// 	echo  "<h1><center>First Visit Questionnaire</center></h1>";
			// 	echo "<form action='/Default/complete' method='POST'>
			// 	<input type='text' style='display:none;' name='complete' id='complete' />

			// 	<label for = 'invest'  id = 'invest'>How much are you investing, if any? </label> <br>				
			// 	<input name = 'invest' type='number' min = '0'  id = 'invest' required> <br>


			// 	<input type='submit' value='submit'>
			// 	</form>";
			// }
			// else if($user->complete == '6'){ 
			// 	echo  "<h1><center>First Visit Questionnaire</center></h1>";
			// 	echo "<form action='/Default/complete' method='POST'>
			// 	<input type='text' style='display:none;' name='complete' id='complete' />

			// 	<label for = 'debt'  id = 'debt'>What is your current debt? </label> <br>				
			// 	<input name = 'debt' type='number' min = '0'  id = 'debt' required> <br>


			// 	<input type='submit' value='submit'>
			// 	</form>";
			}else { //complete
				echo  "<h1><center>Completed Questionnaire</center></h1>";
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
						text: 'Monthly spending visualized'
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
					echo $percentageSpent . " " . $diff;
				}
				echo $totalExpenseYear . " ";
				echo $percentageSpent . " you have $" . $diff . " unspent over the span of a year" ;
				
				
			}
			?>
			<?php
				// $subforums = $model['subforums'];
				// foreach($subforums as $s)

				// {
				// 	$subforumCreator = $this->model('Subforums')->find($s->subforum_id);

				// 	$subforumFollows = $model['subFollowers']->getSubFollower($_SESSION['user_id'], $s->subforum_id);

				// 	echo "<tr>";
				// 	echo "<td class = 'ha'><b>$s->subforum_name</td>";
				// 	echo "<td >$s->subforum_desc</td>";
				// 	echo "<td >".$s->username."</td>";
				// 	echo "<td ><a href= '/Subforum/displaySubforums/$s->subforum_id'>View this subforum</a></td>";
				// 	if($subforumFollows != null)
				// 	{
				// 		echo "<td ><a href= '/Follower/removeASubFollower/$s->subforum_id'>Unfollow</a></td>";
				// 	}
				// 	else
				// 	{
				// 		echo "<td ><a href= '/Follower/addASubFollower/$s->subforum_id'>Follow this subforum</a></td>";
				// 	}
				// 	echo "</tr>";

				// }
				// echo "</table>";
				// echo"</div>";
			?>
	</div>
</body>

</html>
