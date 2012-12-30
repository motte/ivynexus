/* Reveal-Fade-Concentrate Window 
   Michael Otte
   15/2/2012
*/

/* This keeps track of whether the RFS window is on or off
   Start off for now */   
var revealToggle = 0;

function reveal() {
	if(revealToggle==0){
		$("#backdrop").css({
			"opacity": "0.7"
		});
		$("#backdrop").fadeIn("slow");
		$("#rfcWindow").fadeIn("slow");
		revealToggle = 1;
	}
}

function hide() {
	if(revealToggle==1){
		$("#backdrop").fadeOut("slow");
		$("#rfcWindow").fadeOut("slow");
		revealToggle = 0;
	}
}

//centering popup
function centerWindow() {
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $("#rfcWindow").height();
	var popupWidth = $("#rfcWindow").width();

	$("#rfcWindow").css({
		"position": "absolute",
		"top": "-10%",
		"left": "-30%",
		/*"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2,*/
	});
	//only need force for IE6
	$("#backdrop").css({
		"height": windowHeight
	});
	
}


$(document).ready(function() {

	$("#rfcbutton").click(function() {
		//centering with css
		centerWindow();
		reveal();
	});
				
	$("#rfcWindowX").click(function() {
		hide();
	});

	$("#backdrop").click(function() {
		hide();
	});

	$(document).keypress(function(e) {
		if(e.keyCode==27 && revealToggle==1) {
			hide();
		}
	});

});