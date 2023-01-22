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
			<li><a href="/Login/Logout">Logout</a></li>
			</ul>
			<?php
			$user = $model['User'];
			
			$name = $user->first_name . " " .$user->last_name;
			echo "Hello $name";

                
			if(!$user->completeInv){ //0
				echo  "<h1><center>Investment Questionnaire</center></h1>";
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
                <h2>What is your goal?</h2>
				<label for = 'long'>Short term growth
				<input name = 'goal' type='radio' id = 'short' value='short'> </label> 
                <br>
                <label for = 'long'>long term growth
				<input name = 'goal' type='radio' id = 'long' value='long'> </label> 
                <br>
                <label for = 'retire'>save for retirement
				<input name = 'goal' type='radio' id = 'retire' value='retire'> </label> 
                <br>
                <label for = 'house'>buy a house
				<input name = 'goal' type='radio' id = 'house' value='house'> </label> 
                <br>
				<input type='submit' value='submit'>
				</form>";
			} 
			else if($user->completeInv == '1'){ //period
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
                <h2>When would you like to reach your goal?</h2>
				<label for = '5'>within 5 years
				<input name = 'period' type='radio' id = '5' value='5'> </label> 
                <br>
                <label for = '10'>within 10 years
				<input name = 'period' type='radio' id = '10' value='10'> </label> 
                <br>
                <label for = '15'>within 15 years
				<input name = 'period' type='radio' id = '15' value='15'> </label> 
                <br>
                <label for = '20+'>after 20+ years
				<input name = 'period' type='radio' id = '20+' value='20+'> </label> 
                <br>
				<input type='submit' value='submit'>
				</form>";
			}

			else if($user->completeInv == '2'){ //types
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
                <h2>Select all that you are currently invested in:</h2>
				<label for = 'stock'>Individual stocks
				<input name = 'type1' type='radio' id = 'stock' value='stock'> </label> 
                <br>
                <label for = 'crypto'>crypto
				<input name = 'type2' type='radio' id = 'crypto' value='crypto'> </label> 
                <br>
                <label for = 'bonds'>bonds
				<input name = 'type3' type='radio' id = 'bonds' value='bonds'> </label> 
                <br>
                <label for = 'restate'>real estate
				<input name = 'type4' type='radio' id = 'restate' value='restate'> </label> 
                <br>
                <label for = 'etf'>ETFs / Index Funds
				<input name = 'type5' type='radio' id = 'etf' value='etf'> </label> 
                <br>
                <label for = 'none'>none of the above
				<input name = 'type6' type='radio' id = 'none' value='none'> </label> 
                <br>
				<input type='submit' value='submit'>
				</form>";
			}
			else if($user->completeInv == '3'){//invested
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
                <h2>How much money do you currently have invested?</h2>
				<label for = '010'>0-10,000
				<input name = 'invested' type='radio' id = '010' value='010'> </label> 
                <br>
                <label for = '1030'>10,000 - 30,000
				<input name = 'invested' type='radio' id = '1030' value='1030'> </label> 
                <br>
                <label for = '3050'>30,000 - 50,000
				<input name = 'invested' type='radio' id = '3050' value='3050'> </label> 
                <br>
                <label for = '50100'>50,000 - 100,000
				<input name = 'invested' type='radio' id = '50100' value='50100'> </label> 
                <br>
                <label for = '100'>100,000+
				<input name = 'invested' type='radio' id = '100' value='100'> </label> 
                <br>
				<input type='submit' value='submit'>
				</form>";
			}else { //complete

				echo  "<h1><center>Completed Investment Analysis</center></h1>";
			}
			?>
			<?php

			?>
	</div>
</body>

</html>