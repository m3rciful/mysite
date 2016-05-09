
// alert("hello");
function validate () {
	var valid=true;
	var addtitle=document.getElementById("addtitle");
	var addauthor=document.getElementById("addauthor");
	var addcontent=document.getElementById("addcontent");
	if(addtitle.value.length < 1){ 
		addtitle.className+=" invalid";
		valid=false;
	}else{
		addtitle.className="form-control";
	}
	if(addauthor.value.length == 0){
		addauthor.className+=" invalid";
		valid=false;
	}else{
		addauthor.className="form-control";
	}
	if(addcontent.value.length == 0){
		addcontent.className+=" invalid";
		valid=false;
	}else{
		addcontent.className="form-control";
	}
	//if(!valid) alert("Вы не все данные внесли!");
	
	return valid; 
}