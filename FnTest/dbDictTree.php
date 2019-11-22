<?php
	include_once("dbConfig.php"); 
	include_once("dbUUID.php");
		
	function createTreenode($name, $idparent, $seq, $iduser){
		var_dump($name, $idparent, $seq, $iduser);
		$sql = "INSERT INTO dict_tree (id, idparent, name, seq, iduser) VALUES (?, ?, ?, ?, ?)";
		$stmt = DBConfig::$conn->prepare($sql);
		$id = UUID::v4();
		$stmt->bind_param('sssds', $id, $idparent, $name, $seq, $iduser);
		if($stmt->execute()) return $id;
		return false;
	}
	
	function updateTreenode($id, $name, $idparent, $seq, $iduser){
		$sql = "UPDATE dict_tree SET name=?, idparent=?, seq=?, iduser=? WHERE id=?";
		$stmt = DBConfig::$conn->prepare($sql);
		$stmt->bind_param('ssdss', $name, $idparent, $seq, $iduser, $id);
		return $stmt->execute();
	}	
	
	function findTreenode($id){
		$stmt = DBConfig::$conn->prepare('SELECT * FROM dict_tree where id=? LIMIT 1');	
		$stmt->bind_param('s', $id);	
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows === 0) return false;
		return $result->fetch_row();
	}
	
	function subTreenodes($iduser, $idparent){
		$stmt = DBConfig::$conn->prepare('SELECT * FROM dict_tree where iduser=? and idparent=?');	
		$stmt->bind_param('ss', $id);	
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows === 0) return false;
		return $result->fetch_assoc();
	}
	
	function allSubTreenodes($iduser, $idparent){
		$stmt = DBConfig::$conn->prepare('SELECT * FROM dict_tree where iduser=? and idparent=?');	
		$result = allSubTreenodesHelper1($iduser, $idparent, $stmt);
		return $result;
	}
	
	function allSubTreenodesHelper1($iduser, $idparent, $stmt, $level){
		$rnodes = array();
		$nodes = allSubTreenodesHelper0($iduser, $idparent, $stmt, $level);
		if(!$nodes) return $rnodes;
		$level = $level + 1;
		foreach ($nodes as $node) {
			array_push($rnodes, $node);
			$idnode = $node[0];
			$tmpnodes = allSubTreenodesHelper1($iduser, $idnode, $stmt, $level);
    	$rnodes = array_merge($rnodes, $tmpnodes);
		}
		return $rnodes;
	}
	
	function allSubTreenodesHelper0($iduser, $idparent, $stmt, $level){
		$stmt->bind_param('dss', $level, $iduser, $idparent);	
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows === 0) return false;
		$nodes = $result->fetch_all();
		$result->free();
		return $nodes;
	}
	
	function testDB($iduser, $idparent){		
		$stmt = DBConfig::$conn->prepare('SELECT *, ? FROM dict_tree where iduser=? and idparent=? order by seq');	
		$result = allSubTreenodesHelper1($iduser, $idparent, $stmt, 0);
		return $result;
	}
		
	
	function deleteTreenode($id){
		$sql = "DELETE FROM dict_tree WHERE id=?";
		$stmt = DBConfig::$conn->prepare($sql);
		$stmt->bind_param('s', $id);
		return $stmt->execute();
	}
	
	function maxSeq($idparent){		
		$stmt = DBConfig::$conn->prepare('SELECT max(seq) FROM dict_tree where idparent = ?');	
		$stmt->bind_param('s', $idparent);	
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows === 0) return false;		
		return $result->fetch_row();
	}
	
	

	
