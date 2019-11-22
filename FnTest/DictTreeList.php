<?php
	include('dbDictTree.php');
	
	function getLvledTreeNodes($iduser, $idparent){		
		$stmt = DBConfig::$conn->prepare('SELECT *, ? FROM dict_tree where iduser=? and idparent=? order by seq');	
		$result = allSubTreenodesHelper1($iduser, $idparent, $stmt, 0);
		return $result;
	}
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
  		$idparent = UUID::nil;
  		$iduser = "myuser001";			  		
  		$result = getLvledTreeNodes($iduser, $idparent);
  		
  		 		
  		$html = '<table>';
  		
  		foreach($result as $node){
  			$html = $html.'<tr>';
  			$html = $html.'<td>'.$node[7].'</td>';
  			$html = $html.'<td>'.$node[0].'</td>';
  			$html = $html.'<td>'.$node[1].'</td>';
  			$html = $html.'<td><a href="DictTreeShow.php?id='.$node[0].'">'.$node[2].'</a></td>';
  			$html = $html.'<td>'.$node[3].'</td>';
  			$html = $html.'<td>'.$node[4].'</td>';
  			$html = $html.'<td>'.$node[5].'</td>';
  			$html = $html.'<td>'.$node[6].'</td>';
  			$html = $html.'</tr>';
  		}
  		
  		$html = $html.'</table>';
  		
  		echo $html;
		?>
	</body>
</html>
