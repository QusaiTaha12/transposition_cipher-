<?php
/*
	programmer by :Qusai Taha
	Date : 2/5/2019
	Description: these page that implement the transposition cipher
*/
	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$key=explode(",",$_POST['key']);// take key
		$key=array_flip($key);//flip between key and index of the key
		$col=count($key);// length of the key and number of column
		//session_start();
		$plaintext="welcom to transposition cipher";//plaintext wanted to cipher
		//$_SESSION['ptrans']=$plaintext;
		//$_SESSION['ktrans']=$_POST['key'];

		$alphnum=0;// store number of letter in plain text

		for($i=0;$i<strlen($plaintext);$i++)// count number of letter in plain text without spaces
		{
			if($plaintext[$i]!=" ")
			$alphnum++;
		}

		$row=ceil( $alphnum/$col);// store number of colunm of matrix 
		$matrix=array();// matrix of transposition 

		for($i=0;$i<$col;$i++)// make a matrix with appropriate number of columns and rows
		{
			$matrix[$i+1]=array();
			for($j=0;$j<$row;$j++)
			{
				$matrix[$i+1][]=0;
			}
		}

		$c=0;// use to access to the letter on the plain text
		for($j=0;$j<$row;$j++)// fill the matrix using plaintext
		{
			for($i=1;$i<=$col;$i++)
			{
				if($c<strlen($plaintext))
				{
					if($plaintext[$c]!=" ")
					{
						$matrix[$i][$j]=$plaintext[$c];
						//echo $plaintext[$c];
					}else
					$i--;
				}else{
					$matrix[$i][$j]='x';
				}
				$c++;
				}
		}
		//print_r($matrix);
		$cipher="";// store cipher text 
		$res=array();// store matrix  based on the order of the key

		foreach ($key as $k=> $v) // fill array res ....
		{
			$res[]=$matrix[$k];
		}

		for($i=0;$i<$col;$i++)// loop on the res and store the cipher text in the cipher
		{
			for($j=0;$j<$row;$j++)
			{
				$cipher.=$res[$i][$j];
			}
				
		}
		//$_SESSION['trans']=$cipher;
		echo "<div id='id01' class='w3-modal' style='display:block;'>";
				echo "<div class='w3-modal-content' style='width:30%;background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff);'>";
			 		echo"<div class='w3-container'>";
			 		echo"<span onclick=document.getElementById('id01').style.display='none' style='color: #990000;' class='w3-button w3-display-topright w3-red'>";
			      			echo"&times;";
			      	echo"</span>";
			      		echo"<b><center><p style=' margin-top: 7%;'class='w3-green'>";
	                	echo"cipher text";
	             		echo"</p></center></b><br>";
				      	echo"<b><center><p style=' margin-top: 7%;'class='w3-green'>";
	                	echo$cipher;
	             		echo"</p></center></b><br>";
	             		echo"<center>
                			<button type='button'class='w3-button w3-btn w3-red' style='border-radius:10%; margin-top:1%; margin-bottom:5%;' class='w3-button'onclick=document.getElementById('id01').style.display='none' > ok </button>
                		</center>";
			    	echo"</div>";
			  	echo"</div>";
			echo"</div>";
		//echo $cipher;
	}
		

	
?>
<!DOCTYPE html> 

<html>

	<head>

		<title></title>

		<link rel="stylesheet" type="text/css" href="w3.css">

	</head>

	<body  style="background-image:linear-gradient(50deg,#5c8a8a,#85adad,#a3c2c2);">

		<h1 style="background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); text-align: center;">
			transposition cipher

		</h1>
		<form action=""  method="post">
		
		<div style=" background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); margin-left: 35%;  margin-top:4%; width: 35%; height: 40%; font-size: 130%; padding: 2%; border-radius: 10%;">

			<center>

				<b>

					<p >
						please enter a key for the  transposition
						<br>
						*** key please sparated each number by ,
						ex=> 1,2,3,4
					</p>

				</b>

			</center>

			<input class="w3-input  w3-animate-input w3-border w3-hover-gray" type="text" name="key" required placeholder="key please sparated each number by ,">

		</div>

		<center>

			<div style="margin-top: 4%;background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); width: 20%; height: 10%;font-size: 150%; border-radius: 10%;">

				<input class="w3-btn w3-button" type="submit" name="submit" value="continue">

			</div>

		</center>

	</form>
	</body>
	<footer style="margin-top: 4%; margin-bottom: 5%; background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); width: 100%;">

		<center>

			Copyright &copy; 2019 - Qusai && Ahmad ....

		</center>

	</footer>
</html>
