$(document).ready(function(){ 
	treeJsHook();
});

function treeJsHook(){	
	$(".tree i").on("click", clickNodeIcon);
	$(".tree span").on("click", clickNodeSpan);
}

function clickNodeIcon() {
	$(this).siblings('ul').toggleClass("collapsed");
	$(this).toggleClass("fa-minus-square");
	$(this).toggleClass("fa-plus-square");
};

function clickNodeSpan() {	
	var tree = $(".tree")[0];
	var idsel = $(this).attr("id");
	var idlast = $.data(tree, "id");
	
	//remove code used in production.
	console.log($("#"+$.data(tree, "id"))[0]);
	console.log('clicked: '+idsel);
	console.log('saved: '+idlast);
	
	if(idlast != idsel) {
		$("#"+idlast).toggleClass("selected");
	}
	$(this).toggleClass("selected");
	if(idlast != idsel){
		$.data(tree, "id" , idsel);
	}else{		
		$.data(tree, "id" , null);
	}
	
	
}

