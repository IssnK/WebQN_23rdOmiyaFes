function show_textarea(textId,isChecked) {
	var target = document.getElementById(textId);
	if (isChecked) {
		target.style.display = "inline";
	} else{
		target.style.display = "none";
	}
}

function checkForm() {
	var target = document.getElementsByTagName('select');

	for (var i = target.length - 1; i >= 0; i--) {
		if (target[i].value==null | target[i].value=="") {
			alert("未回答の項目があります。");
			target[i].focus();
			return false;
		}
	}

	if (document.getElementsByName('ID')[0].value <4000) {
		var classnames = ['gender','kouhou[]'];
	} else {
		var classnames = ['gender','kouhou[]','rainen[]'];
	}
	for (var i = 0; i < classnames.length; i++) {
		//console.log(classnames[i]);
		target = document.getElementsByName(classnames[i]);
		//console.log(target);
		if (!mycheck(target)) {
			alert("未回答の項目があります。");
			target[0].focus();
	 		return false;
	 	}
	}

	return true;
}

function mycheck(target) {
	for (var i = target.length - 1; i >= 0; i--) {
		if (target[i].checked == true){
			return true;
		}
	}
	return false;
}
