<?php
	include('dbDictTree.php');
	
	$id = $_REQUEST['id'];
	
	$node = findTreenode($id);
?>
<html>
	 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="FnTest.css" >  
    <title>My Vocabulary</title>
  </head>
	<body>
		<?php 	
  		 		
  		$html = '<table>';
  		$html = $html.'<tr><td>Id</td><td>'.$node[0].'</td></tr>';
  		$html = $html.'<tr><td>Parent</td><td>'.$node[1].'</td></tr>';
  		$html = $html.'<tr><td>Node</td><td><input type="text" id="node" name="node" required value="'.$node[2].'"></td></tr>';
  		$html = $html.'<tr><td>seq</td><td>'.$node[3].'</td></tr>';
  		$html = $html.'<tr><td>user</td><td>'.$node[4].'</td></tr>';
  		$html = $html.'<tr><td>created</td><td>'.$node[5].'</td></tr>';
  		$html = $html.'<tr><td>updated</td><td>'.$node[6].'</td></tr>';  		
  		$html = $html.'</table>';
  		
  		echo $html;
		?>
		<button type="button" class="btn btn-primary" onclick="btnUpdate()">Update</button>
		<button type="button" class="btn btn-primary" onclick="btnDelete()">Delete</button>
		
			<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script  src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="dictTreeShow.js"></script>
	</body>
</html>
