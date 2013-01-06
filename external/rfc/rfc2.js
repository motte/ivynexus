/* Reveal-Fade-Concentrate Window  - opacity: 0 backdrop
   Michael Otte
   15/2/2012
*/

/* This keeps track of whether the RFS window is on or off
   Start off for now */   
var revealToggle = 0;

function reveal() {
	if(revealToggle==0){
		$("#backdrop").css({
			"opacity": "0"
		});
		$("#backdrop").fadeIn("fast");
		$("#rfcWindow").fadeIn("fast");
		revealToggle = 1;
	}
}

function hide() {
	if(revealToggle==1){
		$("#backdrop").fadeOut("fast");
		$("#rfcWindow").fadeOut("fast");
		revealToggle = 0;
	}
}

//centering popup
function centerWindow() {
	var windowWidth = window.innerWidth;
	var windowHeight = window.innerHeight;
	var popupHeight = $("#rfcWindow").height();
	var popupWidth = $("#rfcWindow").width();

	$("#rfcWindow").css({
		"position": "absolute",
		"top": "15%",
		"left": "15%",
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