<?php
	include('dbDictTree.php');
	
	function getDefaultTee(){
	}
	
	function getLogin(){
		return "myuser001";
	}
	
	function createNode($name, $idref){
		$iduser = "myuser001";
		$seq = maxSeq($idref)[0]+100;
		/*
		ob_start();
		var_dump($seq);
		$result = ob_get_clean();
		return $result;
		*/
		$id = createTreenode($name, $idref, $seq, $iduser);
		return $id;
	}
	
	
	function buildTree($nodes){
		$html = '';
		$index = 1;			  		
		$node1 = null;			  		
		$node2 = null;		  		
		$node3 = null;
		foreach($nodes as $node){
			if($index==1) {
				$node1 = $node;
				$index++;
				continue;
			}
			if($index==2) {
				$node2 = $node;
				$level1 = $node1[7];
				$level2 = $node2[7];
				if($level1 == $level2) $html = $html.'<li><span id="'.$node1[0].'">'.$node1[2].'</span></li>'."\n";				  			
				if($level1 < $level2) $html = $html.'<li><i class="far fa-plus-square"></i><span id="'.$node1[0].'">'.$node1[2].'</span><ul class="collapsed">'."\n";
				$index++;
				continue;
			}
			$node3 = $node;
			
			$level1 = $node1[7];
			$level2 = $node2[7];
			$level3 = $node3[7];
			
			
			if($level2 == $level3) $html = $html.'<li><span id="'.$node2[0].'">'.$node2[2].'</span></li>'."\n";				  			
			if($level2 < $level3) $html = $html.'<li><i class="far fa-plus-square"></i><span id="'.$node2[0].'">'.$node2[2].'</span><ul class="collapsed">'."\n";
			if($level2 > $level3) {
				$html = $html.'<li><span id="'.$node2[0].'">'.$node2[2].'</span></li>'."\n";	
				$d = $level2 - $level3;
				for($looper = 0; $looper < $d; $looper++){
					$html = $html.'</ul></li>'."\n";
				}
			}
			
			$node1 = $node2; 	
			$node2 = $node3;		
			$index++;
		}		
		
		if($index==1) {
			$html = '<li><span id="'.$node1[0].'">'.$node1[2].'</span></li>'."\n";
		}else{
			$level1 = $node1[7];
			$level2 = $node2[7];
			if($level1 == $level2) $html = $html.'<li><span id="'.$node2[0].'">'.$node2[2].'</span></li>'."\n";				  			
			if($level1 > $level2) {
				$d = $level1 - $level2;
				for($looper = 0; $looper < $d; $looper++){
					$html = $html.'</ul></li>'."\n";
				}
				$html = $html.'<li><span id="'.$node2[0].'">'.$node2[2].'</span></li>'."\n";
			}
		}
		
		return $html;
	}
