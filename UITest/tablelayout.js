$(document).ready(function(){ 
	modalboxJsHook();	
	$("#btnShow").on("click", showModalbox);						
});

funtion formatedForm(tbldesc, comps){
	var html = "<table>";
	var indexComps = 0;
	var row = tbldesc.length;
	var col = tbldesc[0].length;	
	for(int looper1 = 0; looper1 < row; looper1++){
		html += "<tr>";		
		for(int looper2 = 0; looper2 < col; looper2++){
			if(tbldesc[looper1][looper2]==0) continue;
			
		}
		html += "</tr>";
	}
	html += "</table>";
}


function simpleInput(){	
	dragElement(document.getElementById("windiv"));
	$("#winclose").on("click", closeModalbox);
}

function tbldesc(){
	var rows [];
	var row = [];
	var cmp = "Node Name";
	var col = {cols:1, ctype:"lbl", comp:cmp};
	row.push(col);
	cmp = {name:"name", attrs:""};
	col = {cols:3, ctype:"txt", comp:cmp};
	row.push(col);
	rows.push(row);
	
	row = [];
	cmp = "Node Name";
	col = {cols:1, ctype:"lbl", comp:cmp};
	row.push(col);
	cmp = {name:"name", attrs:""};
	col = {cols:3, ctype:"txt", comp:cmp};
	row.push(col);
	rows.push(row);
	
	
	var table = {cols:4,  };
	return table;
}

//{name, attrs}
function txtInput(prex, c){
	return "<input type='text' id='"+prex+"-"+c.name+"' name='"+c.name+"' "+c.attrs+">";
}

//{name, attrs, default, options[]}
//option{val, lbl}
function selInput(prex, c){		
	var html = "<select id='"+prex+"-"+c.name+"' name='"+c.name+"' "+c.attr+">";
	for (looper=0; looper<c.options.length;looper++){
		var option;
		if(option.val==c.default) {
			html += "<option value='"+option.val+"' selected>"+option.lbl+"</option>";
		}else{
			html += "<option value='"+option.val+"' selected>"+option.lbl+"</option>";
		}
	}
	return html += "</select>";	
}

function btn(prex, c){
	return "<button type='button' id='"+prex+"-"+c.name+"' name='"+c.name+"' "+c.attrs+">"+c.text+"</button>";
}

