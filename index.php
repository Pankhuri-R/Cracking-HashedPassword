<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Crack</title>
</head>
<body>
	<header>
		<h1>Let's Crack the code</h1>
		<p>This application takes an MD5 hash
     of four numbers and attempts to hash all  combinations
     to determine the original four numbers.</p>
	</header>

	<pre>
Debug Output:
	
	<?php
	$default="Not found";
if(isset($_GET['md5'])){
	$time_pre=microtime(true);

	$code=$_GET['md5'];

	$num="0123456789";
	$show=15;

	for($i=0;$i<strlen($num);$i++){
		$n1=$num[$i];


		for ($j=0; $j <strlen($num); $j++) { 
			$n2=$num[$j];


			for ($k=0; $k <strlen($num) ; $k++) { 
				$n3=$num[$k];


				for ($l=0; $l <strlen($num) ; $l++) { 
					$n4=$num[$l];


					$try=$n1.$n2.$n3.$n4;

					$check=hash('md5',$try);
						if($check==$code){
							$default=$try;
							break;
						}

					if ($show>0) {
						print "$check $try\n";
                        $show = $show - 1;
						}
					}
				}
			}
		}
		$time_post = microtime(true);
        print "\nElapsed time: ";
        print $time_post-$time_pre;
        print "\n";
	}

	?>
</pre>

	<p>Original Text: <?= htmlentities($default); ?></p>
    <form method="_GET">
       <input type="text" name="md5" size="60" />
       <input type="submit" value="Crack MD5"/>
    </form>

</body>
</html>