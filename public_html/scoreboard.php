<!--
Design credits to http://www.lingulo.com
!-->
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>2D Racing Scoreboard</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans|Baumans' rel='stylesheet' type='text/css'>
        		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/vendor/modernizr.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
        
        <!-- include extern jQuery file but fall back to local file if extern one fails to load !-->
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/vendor\/1.7.2.jquery.min.js"><\/script>')</script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
        <script src="js/vendor/prefixfree.min.js"></script>
        <script src="js/vendor/jquery.slides.min.js"></script>
        <script src="js/script.js"></script>
		<script>
			function playAgain() {
				 window.location.href = "http://www.wiu.edu/users/sm101?data=2";
			}
		</script>
	</head>

	<body>
        <header>
              <div class="toggleMobile">
                <span class="menu1"></span>
                <span class="menu2"></span>
                <span class="menu3"></span>
            </div>
           <div id="mobileMenu">
                <ul>
                    <li><a onclick="playAgain()" style="cursor:pointer">Play Again</a></li>
                   <!-- <li><a href="javascript:void(0)">Porfolio</a></li>
                    <li><a href="javascript:void(0)">About</a></li> -->
                </ul>
            </div>            
            <h1 style="cursor:pointer" onclick="playAgain()">2D Racing Game</h1>
            <p style="cursor:pointer" onclick="playAgain()">A Game implemented using BabylonJS</p>           
            
            <nav>
            	<h2 class="hidden">Our navigation</h2>
                <ul>
                    <li><a onclick="playAgain()" style="cursor:pointer">Play Again</a></li>
                   <!-- <li><a href="javascript:void(0)">Porfolio</a></li>
                    <li><a href="javascript:void(0)">About</a></li>
                    <li><a href="javascript:void(0)">Contact</a></li>  -->
                </ul>
            </nav> 
        </header>

					<?php
					 /*if(is_writable('data.txt')){
 					   echo "file is writable<br>";
					}*/
					$stringToAppend = $_GET['data'];
					if($stringToAppend != ""){
						$names = explode(":", $stringToAppend)[0] . "\n";
						$dataToWrite = explode(":", $stringToAppend)[1] . " " . explode(":", $stringToAppend)[2] . "\n";
						$fullData = explode(":", $stringToAppend)[0] . " ".explode(":", $stringToAppend)[1] . " " . explode(":", $stringToAppend)[2] . " " . explode(":", $stringToAppend)[3] . "\n";
						file_put_contents('data/fulldata.txt', $fullData, FILE_APPEND);
						file_put_contents('data/testdata.txt', $dataToWrite, FILE_APPEND);
						file_put_contents('data/testscores.txt', $names, FILE_APPEND);
					}
					?>

				



<div class="component">
				
				<table>
					<thead>
						<tr>
							<th>Rank</th>
							<th>Name</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>

						<!-- <tr>
						<td class="user-phone">Rank</td>
						<td class="user-name">Name</td>
						<td class="user-phone">Time</td> -->
						<?php
						$allValues = array();
					        $counter = 0;
						$handle = @fopen("data/testscores.txt", "r");
						if ($handle) {
							while (($buffer = fgets($handle, 4096)) !== false) {

								 $time = explode(",", $buffer)[0];
								 $name = explode("," ,$buffer)[1] . "\n";
								 $data = array();
								 $data['time'] = $time;
								 $data['name'] = $name;
								 array_push($allValues, $data); 
								 $counter++;
							}
							if (!feof($handle)) {
								echo "Error: unexpected fgets() fail\n";
							}
							fclose($handle);
						}
						$time = array();
						foreach ($allValues as $key => $row){
							$time[$key] = $row['time'];
						}
						array_multisort($time, SORT_ASC, $allValues);
						$rank = 1;
						$temp = 0;
						foreach ($allValues as $subarray){
							if($temp == 0){
								$temp = $subarray['time'];
							}
							else{
								if($temp != $subarray['time']){
									$rank++;
									$temp = $subarray['time'];
								}
							}
							echo   "<tr>";
							echo	  " <td>".$rank."</td>";
							echo	   "<td>".$subarray['name']."</td>";
							echo	   "<td>".$subarray['time']." Seconds </td>";
							echo	"</tr>";
						}
						?>
						</tr>
					</tbody>
				</table>
				
		</div><!-- /container -->
       
        
       
        <footer style="background:none">
        	<h2 class="hidden">Our footer</h2>
            <section id="copyright">
            	<h3 class="hidden">Copyright notice</h3>
                <div class="wrapper">
                    <!-- &copy; Copyright 2014 by <a href="http://www.example.com">Example</a>. All Rights Reserved.  -->
                </div>
            </section>
           </footer>
	</body>
</html>
