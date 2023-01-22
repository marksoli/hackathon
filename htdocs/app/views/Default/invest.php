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
			
			// $name = $user->first_name . " " .$user->last_name;
			// echo "Hello $name";

                
			if(!$user->completeInv){ //0
				// echo  "<h1><center>Investment Questionnaire</center></h1>";
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
				<div class = 'd-flex justify-content-center'>
                <h2>What is your goal?</h2>
				</div>
				<span class='rounded border'>
				<div class = 'd-flex justify-content-center'>
				<label for = 'long' style='font-size:2em;'>Short term growth
				<input name = 'goal' type='radio' id = 'short' value='short'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'long' style='font-size:2em;'>long term growth
				<input name = 'goal' type='radio' id = 'long' value='long'> </label>
				</div> 
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'retire' style='font-size:2em;'>save for retirement
				<input name = 'goal' type='radio' id = 'retire' value='retire'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'house' style='font-size:2em;'>buy a house
				<input name = 'goal' type='radio' id = 'house' value='house'> </label> 
				</div>
                <br>
				</span>
				<div class = 'd-flex justify-content-center'>
				<input type='submit' value='Next'>
				</div>
				</form>";
			} 
			else if($user->completeInv == '1'){ //period
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
                <h2>When would you like to reach your goal?</h2>
				<label for = '5' style='font-size:2em;'>within 5 years
				<input name = 'period' type='radio' id = '5' value='5'> </label> 
                <br>
                <label for = '10' style='font-size:2em;'>within 10 years
				<input name = 'period' type='radio' id = '10' value='10'> </label> 
                <br>
                <label for = '15' style='font-size:2em;'>within 15 years
				<input name = 'period' type='radio' id = '15' value='15'> </label> 
                <br>
                <label for = '20+' style='font-size:2em;'>after 20+ years
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

				echo  "<h1 style = 'text-decoration:underline' id = 'investmentLevel'><center>Low-Risk Investment</center></h1><br>
				<h3 id = 'InvestmentDesc'><center>Low-risk investments are those that have a lower chance of losing value and tend to provide more stable and consistent returns. These types of investments typically include bonds, Certificates of Deposit (CDs) and Treasury Inflation-Protected Securities (TIPS). </center></h3> <br>
				
	
				<div class='container'>
					<div class='row'>
						<div class='col' id='investment1'>
							<h4> Bonds: Bonds are debt securities issued by companies or government entities. They provide a fixed stream of income in the form of interest payments and are generally considered less risky than stocks. </h4>
						</div>
						<div class='col' id='investment2'>
							<h4> Certificates of Deposit (CDs): CDs are bank-issued deposit accounts that offer a fixed rate of return for a specified period. They are considered low-risk because the return is guaranteed by the bank and the deposits are insured by the FDIC. </h4>
						</div>
						<div class='col' id='investment3'>
							<h4 > Treasury Inflation-Protected Securities (TIPS): These are US government bonds that are indexed to inflation, protecting the purchasing power of the investor. </h4>
						</div>
					</div>
				</div>";
			}
			?>
			<?php

			?>
	</div>
</body>

</html>
