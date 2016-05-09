
// alert("hello");
function validate () {
	var valid=true;
	var abbreviation=document.getElementById("_abbreviation");
	var groupname=document.getElementById("_groupname");
	var begin_year=document.getElementById("_begin_year");
	var end_year=document.getElementById("_end_year");
	var begin_month=document.getElementById("_begin_month");
	var end_month=document.getElementById("_end_month");
	if(abbreviation.value.length < 1){
		abbreviation.className+=" invalid";
		valid=false;
	}else{
		abbreviation.className="form-control";
	}
	if(groupname.value.length == 0){
		groupname.className+=" invalid";
		valid=false;
	}else{
		groupname.className="form-control";
	}
	if(begin_year.value.length == 0){
		begin_year.className+=" invalid";
		valid=false;
	}else{
		begin_year.className="form-control";
	}
	if(end_year.value.length == 0){
		end_year.className+=" invalid";
		valid=false;
	}else{
		end_year.className="form-control";
	}
	if(begin_month.value.length == 0){
		begin_month.className+=" invalid";
		valid=false;
	}else{
		begin_month.className="form-control";
	}
	if(end_month.value.length == 0){
		end_month.className+=" invalid";
		valid=false;
	}else{
		end_month.className="form-control";
	}
	//if(!valid) alert("Вы не все данные внесли!");

	return valid;
}