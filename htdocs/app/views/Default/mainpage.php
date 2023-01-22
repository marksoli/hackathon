<html>

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/peepit.css" />
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<title>Main Page</title>
</head>

<body>
	<div class="container">
			<ul>
			<li><a href="/Default/index">Spendwiser</a></li>
			<li><a href="/Login/Logout">Logout</a></li>
			</ul>
			<?php
			$user = $model['User'];
			// echo $user->complete;
			$name = $user->first_name . " " .$user->last_name;
			echo "Hello $name";
			if(!$user->complete){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />

				<label for = 'age'  id = 'age'>What is your age?</label> <br>				
				<input name = 'age' type='number' min = '0' max='100' id = 'age'> <br>



				<input type='submit' value='submit'>
				</form>";
			} 
			else if($user->complete == '1'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />

				<label for = 'yearEarn'  id = 'yearEarn'>Yearly Earnings</label> <br>				
				<input name = 'yearEarn' type='number' min = '0' id = 'yearEarn'> <br>
				<input type='submit' value='submit'>
				</form>";
			}

			else if($user->complete == '2'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />

				<label for = 'monthExp'  id = 'monthExp'>Current Monthly expenditure on Subscriptions</label> <br>				
				<input name = 'monthExp' type='number' min = '0'  id = 'monthExp'> <br>
				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->complete == '3'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'housing'  id = 'housing'>How much do you spend on housing, if any? </label> <br>				
				<input name = 'housing' type='number' min = '0'  id = 'housing'> <br>
				<input type='submit' value='submit'>
				</form>";
			}  
			else if($user->complete == '4'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'food'  id = 'food'>How much do you spend on food? </label> <br>				
				<input name = 'food' type='number' min = '0'  id = 'food'> <br>
				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->complete == '5'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />
				<label for = 'misc'  id = 'misc'>How much do you spend on miscellaneous? </label> <br>				
				<input name = 'misc' type='number' min = '0'  id = 'misc'> <br>
				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->complete == '6'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />

				<label for = 'saving'  id = 'saving'>How much are you saving, if any? </label> <br>				
				<input name = 'saving' type='number' min = '0'  id = 'saving'> <br>


				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->complete == '7'){
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />

				<label for = 'invest'  id = 'invest'>How much are you investing, if any? </label> <br>				
				<input name = 'invest' type='number' min = '0'  id = 'invest'> <br>


				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->complete == '8'){ 
				echo  "<h1><center>First Visit Questionnaire</center></h1>";
				echo "<form action='/Default/complete' method='POST'>
				<input type='text' style='display:none;' name='complete' id='complete' />

				<label for = 'debt'  id = 'debt'>What is your current debt? </label> <br>				
				<input name = 'debt' type='number' min = '0'  id = 'debt'> <br>


				<input type='submit' value='submit'>
				</form>";
			}else { //complete
				echo  "<h1><center>Completed Questionnaire</center></h1>";
				echo "<canvas id='myChart' style='width:100%;max-width:600px'></canvas>";
				echo "<script>
					var xValues = ['Subscriptions', 'Housing', 'Food', 'Miscellaneous', 'Savings', 'Investments'];
					var yValues = [$user->monthExp, $user->housing, $user->food, $user->misc, $user->saving, $user->invest];
					var barColors = [
					'#b91d47',
					'#00aba9',
					'#2b5797',
					'#e8c3b9',
					'#276a97',
					'#1e7145'
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
