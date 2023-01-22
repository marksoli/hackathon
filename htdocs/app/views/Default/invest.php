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
			<li><a href="/Default/tips">Tips</a></li>
			<li><a href="/Login/Logout">Logout</a></li>
			</ul>
			<?php
			$user = $model['User'];
                
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
				<input style='transform: scale(2);' name = 'goal' type='radio' id = 'short' value='short'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'long' style='font-size:2em;'>Long term growth
				<input style='transform: scale(2);' name = 'goal' type='radio' id = 'long' value='long'> </label>
				</div> 
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'retire' style='font-size:2em;'>Save for retirement
				<input style='transform: scale(2);' name = 'goal' type='radio' id = 'retire' value='retire'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'house' style='font-size:2em;'>Buy a house
				<input style='transform: scale(2);' name = 'goal' type='radio' id = 'house' value='house'> </label> 
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
				<div class = 'd-flex justify-content-center'>
                <h2>When would you like to reach your goal?</h2>
				</div>
				<div class = 'd-flex justify-content-center'>
				<label for = '5' style='font-size:2em;'>Within 5 years
				<input style='transform: scale(2);' name = 'period' type='radio' id = '5' value='5'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = '10' style='font-size:2em;'>Within 10 years
				<input style='transform: scale(2);' name = 'period' type='radio' id = '10' value='10'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = '15' style='font-size:2em;'>Within 15 years
				<input style='transform: scale(2);' name = 'period' type='radio' id = '15' value='15'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = '20+' style='font-size:2em;'>After 20+ years
				<input style='transform: scale(2);' name = 'period' type='radio' id = '20+' value='20+'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
				<input type='submit' value='Next' required>
				</div>
				</form>";
			}

			else if($user->completeInv == '2'){ //types
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
				<div class = 'd-flex justify-content-center'>
                <h2>Select all that you are currently invested in:</h2>
				</div>
				<div class = 'd-flex justify-content-center'>
				<label for = 'stock'>Individual stocks
				<input style='transform: scale(2);' name = 'type1' type='radio' id = 'stock' value='stock'> </label> 
				<div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'crypto'>Crypto
				<input style='transform: scale(2);' name = 'type2' type='radio' id = 'crypto' value='crypto'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'bonds'>Bonds
				<input style='transform: scale(2);' name = 'type3' type='radio' id = 'bonds' value='bonds'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'restate'>Real estate
				<input style='transform: scale(2);' name = 'type4' type='radio' id = 'restate' value='restate'> </label>
				</div> 
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'etf'>ETFs / Index funds
				<input style='transform: scale(2);' name = 'type5' type='radio' id = 'etf' value='etf'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = 'none'>None of the above
				<input style='transform: scale(2);' name = 'type6' type='radio' id = 'none' value='none'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
				<input type='submit' value='Next' required>
				</div>
				</form>";
			}
			else if($user->completeInv == '3'){//invested
				echo "<form class='' action='/Default/completeInv' method='POST'>
				<input type='text' style='display:none;' name='completeInv' id='completeInv' />
				<div class = 'd-flex justify-content-center'>
                <h2>How much money do you currently have invested?</h2>
				</div>
				<div class = 'd-flex justify-content-center'>
				<label for = '010'>$0 - $10,000
				<input style='transform: scale(2);' name = 'invested' type='radio' id = '010' value='010'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = '1030'>$10,000 - $30,000
				<input style='transform: scale(2);' name = 'invested' type='radio' id = '1030' value='1030'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = '3050'>$30,000 - $50,000
				<input style='transform: scale(2);' name = 'invested' type='radio' id = '3050' value='3050'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = '50100'>$50,000 - $100,000
				<input style='transform: scale(2);' name = 'invested' type='radio' id = '50100' value='50100'> </label> 
				</div>
                <br>
				<div class = 'd-flex justify-content-center'>
                <label for = '100'>$100,000+
				<input style='transform: scale(2);' name = 'invested' type='radio' id = '100' value='100'> </label>
				</div> 
                <br>
				<div class = 'd-flex justify-content-center'>
				<input type='submit' value='submit'>
				</div>
				</form>";
			}else { //complete
				$risk=rand(0,2);
				switch($risk){
					case 0: 
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
						break;
					case 1: 
						echo  "<h1 style = 'text-decoration:underline' id = 'investmentLevel'><center>Moderate-Risk Investment</center></h1><br>
						<h3 id = 'InvestmentDesc'><center>Moderate-risk investments are those that have a higher chance of losing value than low-risk investments, but also have a higher potential for returns. These types of investments typically include balanced funds, Real Estate Investment Trusts (REITs), and some types of mutual funds.</center></h3> <br>
						<div class='container'>
							<div class='row'>
								<div class='col' id='investment1'>
									<h4> Balanced Funds: A balanced fund is a type of mutual fund that invests in both stocks and bonds, aiming to provide a balance of growth and income.</h4>
								</div>
								<div class='col' id='investment2'>
									<h4> Real Estate Investment Trusts (REITs): REITs are companies that own and operate income-producing real estate properties, such as shopping centers and apartment buildings. They are considered moderate-risk investments because they are affected by changes in the real estate market.</h4>
								</div>
							</div>
						</div>";
						break;
					case 2:
						echo  "<h1 style = 'text-decoration:underline' id = 'investmentLevel'><center>High-Risk Investment</center></h1><br>
						<h3 id = 'InvestmentDesc'><center>High-risk investments are those that have a higher chance of losing value than moderate-risk investments and a higher potential for returns. These types of investments typically include individual stocks, cryptocurrency, and start-ups.</center></h3> <br>
						<div class='container'>
							<div class='row'>
								<div class='col' id='investment1'>
									<h4>Individual Stocks: Investing in individual stocks can provide the potential for high returns, but also carries a high level of risk.</h4>
								</div>
								<div class='col' id='investment2'>
									<h4>Cryptocurrency: Investing in digital currencies like Bitcoin, Ethereum, and Litecoin has the potential for high returns but also comes with high volatility and risk. </h4>
								</div>
								<div class='col' id='investment3'>
									<h4 > Start-ups: Investing in a start-up can provide the opportunity for high returns but also carries a high level of risk. </h4>
								</div>
							</div>
						</div>";
						break;
				}
				
			}
			?>
			<?php

			?>
	</div>
</body>

</html>
