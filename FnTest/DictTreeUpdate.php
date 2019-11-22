<?php
	include('dbDictTree.php');
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$iduser = "myuser001";
	
	$node = findTreenode($id);
	updateTreenode($id, $name, $node[1], $node[3], $iduser);
	
	//redirect to list
