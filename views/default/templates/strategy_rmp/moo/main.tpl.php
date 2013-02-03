<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
 
<script type='text/javascript'>//<![CDATA[ 
	
function scaleit(a) {
	var b = (a-1)*450;
	/*if(b < 0) {
		b = (a-1)*(450);
	}*/
	var c = 3000+b;
	$('#rsr').css({'-webkit-transform':'scale('+a+')', '-moz-transform':'scale('+a+')', '-transform':'scale('+a+')', '-o-transform':'scale('+a+')', 'margin-top':b+'px'});
//, 'margin-top':b+'px'
	$('.zoomlevel').css({'background': '#eee', 'padding-left': '0px', 'padding-right': '0px'});
	var idIt = a*10;
	idIt = 'zoom'+idIt;
	var specific = "#"+idIt+".zoomlevel";
	$(specific).css({'background': '#ccc', 'padding-left': '2px', 'padding-right': '3px'});
}

function plusit() {
	var value = $('#rsr').css('-webkit-transform');

	value = value.substr(7, 3).replace(/,/g, '');
	value = parseFloat(value)+0.1;
	if(value > 1.8) {
		end();
	}
	
	var topvalue = (value-1)*450;
	/*if(topvalue < 0) {
		topvalue = (value-1)*(450);
	}*/
	
	var valueb = $('#rsr').css('-moz-transform');
	$('#rsr').css({'transform':'scale('+value+')', '-webkit-transform':'scale('+value+')', '-o-transform':'scale('+value+')', '-moz-transform':'scale('+value+')', 'margin-top':topvalue+'px'});
//, 'margin-top':b+'px'
	$('.zoomlevel').css({'background': '#eee', 'padding-left': '0px', 'padding-right': '0px'});
	var idIt = Math.round(value*10);
	idIt = 'zoom'+idIt;
	var specific = "#"+idIt+".zoomlevel";
	$(specific).css({'background': '#ccc', 'padding-left': '2px', 'padding-right': '3px'});
}

function minusit() {
	var value = $('#rsr').css('-webkit-transform');

	value = value.substr(7, 3).replace(/,/g, '');
	value = parseFloat(value)-0.1;
	if(value < .8) {
		end();
	}
	
	var topvalue = (value-1)*450;
	/*if(topvalue < 0) {
		topvalue = (value-1)*(450);
	}*/
	
	var valueb = $('#rsr').css('-moz-transform');
	$('#rsr').css({'transform':'scale('+value+')', '-webkit-transform':'scale('+value+')', '-moz-transform':'scale('+valueb+')', '-o-transform':'scale('+value+')', 'margin-top':topvalue+'px'});
//, 'margin-top':b+'px'
	$('.zoomlevel').css({'background': '#eee', 'padding-left': '0px', 'padding-right': '0px'});
	var idIt = Math.round(value*10);
	idIt = 'zoom'+idIt;
	var specific = "#"+idIt+".zoomlevel";
	$(specific).css({'background': '#ccc', 'padding-left': '2px', 'padding-right': '3px'});
}
function deploy(a) {
	//alert(a);
}
	
//function hoverinfo(a) {
	//alert(a);
//	return;
//}

function passCommand(x) {
		switch(x){
			case '1':
				placeCommand();
				break;	
			case '2':
				markTurn('2');
				//var attackreturn = markTurn('2');
				//if(attackreturn == 'true'){
					$('#attackcommand').animate({'opacity':'0'}, 500);
					setTimeout(
						function(){
							$('#attackcommand').css({'display':'none'});
							$('#fortifycommand').css({'display':'block'});
							$('#fortifycommand').animate({'opacity':'1'}, 500);
						},500
					)
				//}
				break;
			case '3':
				markTurn('3');
				
				//var fortifyreturn = markTurn('3');
				//if(fortifyreturn == 'true'){
					$('#fortifycommand').animate({'opacity':'0'}, 500);
					setTimeout(
						function(){
							$('#fortifycommand').css({'display':'none'});
							$('#donecommand').css({'display':'block'});
							$('#donecommand').animate({'opacity':'1'}, 500);
						},500
					)
				//}
				break;
		}
}

function placeCommand() {
	var a = $('#newtroops').text();
	var b = document.getElementById('placetroops').value;
	var c = a-b;
	var d = '{pID}';
	var e = $('#placestate :selected').val();
	var f = '{srmp_turn_number}';
	
	if(b=='0' || b=='') {
		return;
	}
	if(c < 0) {
		document.getElementById('alertplace').innerHTML='You only have '+a+' troops';
		$('#alertplace').animate({'opacity':'1'});
		return c;
	}
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		
			placeCheck(xmlhttp.responseText);
		}
	}
	
	xmlhttp.open("GET","controllers/srmp/turn/placecontroller.php?a="+a+"&b="+b+"&d="+d+"&e="+e+"&f="+f,true);
	xmlhttp.send();
}

function placeCheck(placereturn){

	if(placereturn == 0){
		$('#placecommand').animate({'opacity':'0'}, 500);
		setTimeout(
			function(){
				$('#placecommand').css({'display':'none'});
				$('#attackcommand').css({'display':'block'});
				$('#attackcommand').animate({'opacity':'1'}, 500);
			},500
		)
	}
	else if(placereturn > 0) {
		$('#newtroops').css({'color':'#329950','opacity':'0'});		
		document.getElementById('newtroops').innerHTML = placereturn;
		$('#newtroops').animate({'opacity':'1'},100);
		setTimeout(function(){$('#newtroops').animate({'color':'#ccc'},800);},100)
		
	}
}

function attackCommand() {
	var a = '{pID}';
	var b = $('#attackstateone :selected').val();
	var c = $('#attackstatetwo :selected').val();
	var d = $('#attackingtroops').val();
	var e = '{srmp_turn_number}';
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			switch(xmlhttp.responseText){
				case 'true':
					document.getElementById('alertattack').innerHTML='Attack order delivered';
					break;
				case 'false':
					//document.getElementById('alertattack').innerHTML='Attack order intercepted';
					break;
			}
		}
	}
	xmlhttp.open("GET","controllers/srmp/turn/attackcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e,true);
	xmlhttp.send();
}

function fortifyCommand() {
	var a = '{pID}';
	var b = $('#fortifystateone :selected').val();
	var c = $('#fortifystatetwo :selected').val();
	var d = $('#fortifyingtroops').val();
	var e = '{srmp_turn_number}';
	if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {
			// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				switch(xmlhttp.responseText){
					case 'true':
					document.getElementById('alertfortify').innerHTML='Fortify order delivered';
					break;
				case 'false':
					//document.getElementById('alertfortify').innerHTML='Attack order intercepted';
					break;
		  }
		}
		xmlhttp.open("GET","controllers/srmp/turn/fortifycontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e,true);
		xmlhttp.send();
}
}

function markTurn(b) {
	var a = "{pID}";
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			return xmlhttp.responseText;
				
		}
	}
	xmlhttp.open("GET","controllers/srmp/turn/markturncontroller.php?a="+a+"&b="+b,true);
	xmlhttp.send();
}

function setAttackOptions() {
	
}

function setFortifyOptions() {
	
}

function teamCommunicate() {
		event.preventDefault();
		var a = '{pID}';
		var e = '{firstname}';
		e = e.charAt(0);
		var f = '{lastname}';
		f = f.charAt(0);
		var b = e+f;
		var c = $('#posttoteam').val();
		$('#posttoteam').val('');
		var d = '{p_school}';
		$('<img id="remove" src="views/default/images/tiny_loader.gif" style="vertical-align:middle; padding-left:3px;" />').insertBefore('#chatAdded');
		var returnit = "<div>&nbsp<strong>"+b+"</strong>&nbsp&nbsp&nbsp"+c+"</div><hr style='border: none; background: #ccc; height:1px;' />";
		if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else {
				// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {	
						
						$(returnit).insertBefore('#chatAdded');		
						$('img').remove('#remove');
				}
			}

			xmlhttp.open("GET","controllers/srmp/turn/teampostcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d,true);
			xmlhttp.send();

	}


$(document).ready(function(){

	//Tooltips
    $(".partialstates").hover(function(){
    	var specific = this.id;
    	
        tip = $('#'+specific+'.tip');
        tip.show(); //Show tooltip
        
    }, function() {
        tip.hide(); //Hide tooltip
    }).mousemove(function(e) {
        //Change these numbers to move the tooltip offset
        var mousex = e.pageX + 20; //Get X coodrinates
        var mousey = e.pageY + 20; //Get Y coordinates. 
        var tipWidth = tip.width(); //Find width of tooltip
        var tipHeight = tip.height(); //Find height of tooltip
        
        //Distance of element from the right edge of viewport
        var tipVisX = $(window).width() - (mousex + tipWidth);
        //Distance of element from the bottom of viewport
        var tipVisY = $(window).height() - (mousey + tipHeight);
        if (tipVisX < 20) { //If tooltip exceeds the X coordinate of viewport
            mousex = e.pageX - tipWidth - 20;
        } if (tipVisY < 20) { //If tooltip exceeds the Y coordinate of viewport
            mousey = e.pageY - tipHeight - 20;
        }
        //Absolute position the tooltip according to mouse position
        tip.css({  top: mousey, left: mousex });
    });

	//$(".partialstates").tip();
    $('#rsr').draggable({scroll: false});
    $('#rsr').on("dragstop", function( event, ui ) {});
	$('#rsr').animate({'opacity':'1'},1000);	

	$("#attackstateone").change(function() {
        var val = $(this).val();
        val = val.substr(-4);
        val = val.replace(" ", "");
        if (val == "ct1") {
            $("#attackstatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct4'>({state_count4}) Yale State Four</option><option value='ny11'>({state_count11}) Columbia State Eleven</option>");
        }
        else if (val == "ct2") {
            $("#attackstatetwo").html("<option value='ct1'>({state_count1}) Yale State One</option><option value='ct3'>({state_count3}) Yale State Three</option><option value='ct4'>({state_count4}) Yale State Four</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct6'>({state_count6}) Yale State Six</option>");
        }
        else if (val == "ct3") {
            $("#attackstatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct6'>({state_count6}) Yale State Six</option><option value='ct7'>({state_count7}) Yale State Seven</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ct4") {
            $("#attackstatetwo").html("<option value='ct1'>({state_count1}) Yale State One</option><option value='ct2'>({state_count2}) Yale State Two</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct8'>({state_count8}) Yale State Eight</option><option value='nj3'>({state_count31}) Princeton State Three</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "ct5") {
            $("#attackstatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct4'>({state_count4}) Yale State Four</option><option value='ct6'>({state_count6}) Yale State Six</option><option value='ct7'>({state_count7}) Yale State Seven</option>");
        }
        else if (val == "ct6") {
            $("#attackstatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct3'>({state_count3}) Yale State Three</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct7'>({state_count7}) Yale State Seven</option>");
        }
        else if (val == "ct7") {
            $("#attackstatetwo").html("<option value='ct3'>({state_count3}) Yale State Three</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct6'>({state_count6}) Yale State Six</option>");
        }
        else if (val == "ct8") {
            $("#attackstatetwo").html("<option value='ct4'>({state_count4}) Yale State Four</option><option value='ri5'>({state_count64}) Brown State Five</option>");
        }
        else if (val == "ma1") {
            $("#attackstatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ma2") {
            $("#attackstatetwo").html("<option value='ma1'>({state_count9}) Harvard State One</option><option value='ma3'>({state_count11}) Harvard State Three</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ma3") {
            $("#attackstatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma6'>({state_count14}) Harvard State Six</option>");
        }
        else if (val == "ma4") {
            $("#attackstatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma3'>({state_count11}) Harvard State Three</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ma6'>({state_count14}) Harvard State Six</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ma5") {
            $("#attackstatetwo").html("<option value='ma1'>({state_count9}) Harvard State One</option><option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ma6") {
            $("#attackstatetwo").html("<option value='ma3'>({state_count11}) Harvard State Three</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma7'>({state_count15}) Harvard State Seven</option><option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma10'>({state_count18}) Harvard State Ten</option>");
        }
        else if (val == "ma7") {
            $("#attackstatetwo").html("<option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ma6'>({state_count15}) Harvard State Six</option><option value='ma10'>({state_count18}) Harvard State Ten</option>");
        }
        else if (val == "ma8") {
            $("#attackstatetwo").html("<option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma12'>({state_count20}) Harvard State Twelve</option>");
        }
        else if (val == "ma9") {
            $("#attackstatetwo").html("<option value='ma6'>({state_count14}) Harvard State Six</option><option value='ma8'>({state_count16}) Harvard State Eight</option><option value='ma10'>({state_count18}) Harvard State Ten</option><option value='ma12'>({state_count20}) Harvard State Twelve</option>");
        }
        else if (val == "ma10") {
            $("#attackstatetwo").html("<option value='ma6'>({state_count14}) Harvard State Six</option><option value='ma7'>({state_count15}) Harvard State Seven</option><option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma11'>({state_count19}) Harvard State Eleven</option><option value='ma12'>({state_count20}) Harvard State Twelve</option>");
        }
        else if (val == "ma11") {
            $("#attackstatetwo").html("<option value='ma10'>({state_count18}) Harvard State Ten</option><option value='ma12'>({state_count20}) Harvard State Twelve</option><option value='ma13'>({state_count21}) Harvard State Thirteen</option>");
        }
        else if (val == "ma12") {
            $("#attackstatetwo").html("<option value='ma8'>({state_count16}) Harvard State Eight</option><option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma10'>({state_count18}) Harvard State Ten</option><option value='ma11'>({state_count19}) Harvard State Eleven</option><option value='ma13'>({state_count21}) Harvard State Thirteen</option>");
        }
        else if (val == "ma13") {
            $("#attackstatetwo").html("<option value='ma11'>({state_count19}) Harvard State Eleven</option><option value='ma12'>({state_count20}) Harvard State Twelve</option><option value='ri2'>({state_count61}) Brown State Two</option>");
        }
        else if (val == "nh1") {
            $("#attackstatetwo").html("<option value='nh2'>({state_count23}) Dartmouth State Two</option><option value='nh3'>({state_count24}) Dartmouth State Three</option><option value='ny7'>({state_count45}) Cornell State Seven</option>");
        }
        else if (val == "nh2") {
            $("#attackstatetwo").html("<option value='nh1'>({state_count22}) Dartmouth State Two</option><option value='nh3'>({state_count24}) Dartmouth State Three</option><option value='nh4'>({state_count25}) Dartmouth State Four</option>");
        }
        else if (val == "nh3") {
            $("#attackstatetwo").html("<option value='nh1'>({state_count22}) Dartmouth State One</option><option value='nh2'>({state_count23}) Dartmouth State Two</option><option value='nh4'>({state_count25}) Dartmouth State Four</option>");
        }
        else if (val == "nh4") {
            $("#attackstatetwo").html("<option value='nh2'>({state_count23}) Dartmouth State Two</option><option value='nh3'>({state_count24}) Dartmouth State Three</option><option value='nh5'>({state_count26}) Dartmouth State Five</option><option value='nh6'>({state_count27}) Dartmouth State Six</option>");
        }
        else if (val == "nh5") {
            $("#attackstatetwo").html("<option value='nh4'>({state_count25}) Dartmouth State Four</option><option value='nh6'>({state_count27}) Dartmouth State Six</option><option value='nh7'>({state_count28}) Dartmouth State Seven</option>");
        }
        else if (val == "nh6") {
            $("#attackstatetwo").html("<option value='ma6'>({state_count14}) Harvard State Six</option><option value='nh4'>({state_count25}) Dartmouth State Four</option><option value='nh5'>({state_count26}) Dartmouth State Five</option><option value='nh7'>({state_count28}) Dartmouth State Seven</option>");
        }
        else if (val == "nh7") {
            $("#attackstatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='nh5'>({state_count26}) Dartmouth State Five</option><option value='nh6'>({state_count27}) Dartmouth State Six</option>");
        }
        else if (val == "nj1") {
            $("#attackstatetwo").html("<option value='nj2'>({state_count30}) Princeton State Two</option><option value='nj3'>({state_count31}) Princeton State Three</option><option value='nj4'>({state_count32}) Princeton State Four</option><option value='pa6'>({state_count55}) UPenn State Six</option>");
        }
        else if (val == "nj2") {
            $("#attackstatetwo").html("<option value='nj1'>({state_count29}) Princeton State One</option><option value='nj3'>({state_count31}) Princeton State Three</option><option value='nj4'>({state_count32}) Princeton State Four</option><option value='nj5'>({state_count33}) Princeton State Five</option>");
        }
        else if (val == "nj3") {
            $("#attackstatetwo").html("<option value='ct4'>({state_count4}) Yale State Four</option><option value='nj1'>({state_count29}) Princeton State One</option><option value='nj2'>({state_count30}) Princeton State Two</option>");
        }
        else if (val == "nj4") {
            $("#attackstatetwo").html("<option value='nj1'>({state_count29}) Princeton State One</option><option value='nj2'>({state_count30}) Princeton State Two</option><option value='nj5'>({state_count33}) Princeton State Five</option><option value='nj7'>({state_count35}) Princeton State Seven</option>");
        }
        else if (val == "nj5") {
            $("#attackstatetwo").html("<option value='nj2'>({state_count30}) Princeton State Two</option><option value='nj4'>({state_count32}) Princeton State Four</option><option value='nj6'>({state_count34}) Princeton State Six</option><option value='nj7'>({state_count35}) Princeton State Seven</option>");
        }
        else if (val == "nj6") {
            $("#attackstatetwo").html("<option value='nj5'>({state_count33}) Princeton State Five</option><option value='nj7'>({state_count35}) Princeton State Seven</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "nj7") {
            $("#attackstatetwo").html("<option value='nj4'>({state_count32}) Princeton State Four</option><option value='nj5'>({state_count33}) Princeton State Five</option><option value='nj6'>({state_count34}) Princeton State Six</option><option value='nj8'>({state_count36}) Princeton State Eight</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "nj8") {
            $("#attackstatetwo").html("<option value='nj7'>({state_count35}) Princeton State Seven</option><option value='nj9'>({state_count37}) Princeton State Nine</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "nj9") {
            $("#attackstatetwo").html("<option value='nj8'>({state_count36}) Princeton State Eight</option><option value='nj10'>({state_count38}) Princeton State Ten</option><option value='pa9'>({state_count58}) UPenn State Nine</option>");
        }
        else if (val == "nj10") {
            $("#attackstatetwo").html("<option value='ct4'>({state_count4}) Yale State Four</option><option value='nj6'>({state_count34}) Princeton State Six</option><option value='nj7'>({state_count35}) Princeton State Seven</option><option value='nj8'>({state_count36}) Princeton State Eight</option><option value='nj9'>({state_count37}) Princeton State Nine</option>");
        }
        else if (val == "ny1") {
            $("#attackstatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option>");
        }
        else if (val == "ny2") {
            $("#attackstatetwo").html("<option value='ny1'>({state_count39}) Cornell State One</option><option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny6'>({state_count44}) Columbia State Six</option><option value='pa2'>({state_count51}) UPenn State Two</option>");
        }
        else if (val == "ny3") {
            $("#attackstatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny7'>({state_count45}) Cornell State Seven</option><option value='ny8'>({state_count46}) Cornell State Eight</option>");
        }
        else if (val == "ny4") {
            $("#attackstatetwo").html("<option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny8'>({state_count46}) Cornell State Eight</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ny5") {
            $("#attackstatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny6'>({state_count44}) Columbia State Six</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ny6") {
            $("#attackstatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny10'>({state_count48}) Columbia State Ten</option><option value='ny11'>({state_count49}) Columbia State Eleven</option>");
        }
        else if (val == "ny7") {
            $("#attackstatetwo").html("<option value='ny1'>({state_count39}) Cornell State One</option><option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny8'>({state_count46}) Cornell State Eight</option>");
        }
        else if (val == "ny8") {
            $("#attackstatetwo").html("<option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny7'>({state_count45}) Cornell State Seven</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ny9") {
            $("#attackstatetwo").html("<option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny8'>({state_count46}) Cornell State Eight</option><option value='ny10'>({state_count48}) Columbia State Ten</option>");
        }
        else if (val == "ny10") {
            $("#attackstatetwo").html("<option value='ny6'>({state_count44}) Columbia State Six</option><option value='ny10'>({state_count48}) Columbia State Ten</option><option value='ny11'>({state_count49}) Columbia State Eleven</option>");
        }
        else if (val == "ny11") {
            $("#attackstatetwo").html("<option value='ct1'>({state_count1}) Yale State One</option><option value='ny6'>({state_count44}) Columbia State Six</option><option value='ny10'>({state_count48}) Columbia State Ten</option><option value='pa3'>({state_count52}) UPenn State Three</option>");
        }
        else if (val == "pa1") {
            $("#attackstatetwo").html("<option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa4'>({state_count53}) UPenn State Four</option><option value='pa5'>({state_count54}) UPenn State Five</option>");
        }
        else if (val == "pa2") {
            $("#attackstatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='pa1'>({state_count50}) UPenn State One</option><option value='pa3'>({state_count52}) UPenn State Three</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa6'>({state_count55}) UPenn State Six</option>");
        }
        else if (val == "pa3") {
            $("#attackstatetwo").html("<option value='ny11'>({state_count49}) Columbia State Eleven</option><option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa6'>({state_count55}) UPenn State Six</option>");
        }
        else if (val == "pa4") {
            $("#attackstatetwo").html("<option value='pa1'>({state_count50}) UPenn State One</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa7'>({state_count56}) UPenn State Seven</option>");
        }
        else if (val == "pa5") {
            $("#attackstatetwo").html("<option value='pa1'>({state_count50}) UPenn State One</option><option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa4'>({state_count53}) UPenn State Four</option><option value='pa6'>({state_count55}) UPenn State Six</option><option value='pa7'>({state_count56}) UPenn State Seven</option><option value='pa8'>({state_count57}) UPenn State Eight</option>");
        }
        else if (val == "pa6") {
            $("#attackstatetwo").html("<option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa3'>({state_count52}) UPenn State Three</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa10'>({state_count59}) UPenn State Ten</option>");
        }
        else if (val == "pa7") {
            $("#attackstatetwo").html("<option value='pa4'>({state_count53}) UPenn State Four</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa9'>({state_count58}) UPenn State Nine</option>");
        }
        else if (val == "pa8") {
            $("#attackstatetwo").html("<option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa6'>({state_count55}) UPenn State Six</option><option value='pa7'>({state_count56}) UPenn State Seven</option><option value='pa9'>({state_count58}) UPenn State Nine</option><option value='pa10'>({state_count59}) UPenn State Ten</option>");
        }
        else if (val == "pa9") {
            $("#attackstatetwo").html("<option value='pa7'>({state_count56}) UPenn State Seven</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa10'>({state_count59}) UPenn State Ten</option>");
        }
        else if (val == "pa10") {
            $("#attackstatetwo").html("<option value='pa6'>({state_count55}) UPenn State Six</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa9'>({state_count58}) UPenn State Nine</option>");
        }
        else if (val == "ri1") {
            $("#attackstatetwo").html("<option value='ri2'>({state_count61}) Brown State Two</option><option value='ri3'>({state_count62}) Brown State Three</option><option value='ri4'>({state_count63}) Brown State Four</option>");
        }
        else if (val == "ri2") {
            $("#attackstatetwo").html("<option value='ma13'>({state_count21}) Harvard State Thirteen</option><option value='ri1'>({state_count60}) Brown State One</option><option value='ri4'>({state_count63}) Brown State Four</option>");
        }
        else if (val == "ri3") {
            $("#attackstatetwo").html("<option value='ri1'>({state_count60}) Brown State One</option><option value='ri4'>({state_count63}) Brown State Four</option><option value='nh5'>({state_count64}) Brown State Five</option>");
        }
        else if (val == "ri4") {
            $("#attackstatetwo").html("<option value='ri1'>({state_count60}) Brown State One</option><option value='ri2'>({state_count61}) Brown State Two</option><option value='ri3'>({state_count62}) Brown State Three</option>");
        }
        else if (val == "ri5") {
            $("#attackstatetwo").html("<option value='ct8'>({state_count8}) Yale State Eight</option><option value='ri3'>({state_count62}) Brown State Three</option>");
        }
    });
    
    $("#fortifystateone").change(function() {
        var val = $(this).val();
        val = val.substr(-4);
        val = val.replace(" ", "");
        if (val == "ct1") {
            $("#fortifystatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct4'>({state_count4}) Yale State Four</option><option value='ny11'>({state_count11}) Columbia State Eleven</option>");
        }
        else if (val == "ct2") {
            $("#fortifystatetwo").html("<option value='ct1'>({state_count1}) Yale State One</option><option value='ct3'>({state_count3}) Yale State Three</option><option value='ct4'>({state_count4}) Yale State Four</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct6'>({state_count6}) Yale State Six</option>");
        }
        else if (val == "ct3") {
            $("#fortifystatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct6'>({state_count6}) Yale State Six</option><option value='ct7'>({state_count7}) Yale State Seven</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ct4") {
            $("#fortifystatetwo").html("<option value='ct1'>({state_count1}) Yale State One</option><option value='ct2'>({state_count2}) Yale State Two</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct8'>({state_count8}) Yale State Eight</option><option value='nj3'>({state_count31}) Princeton State Three</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "ct5") {
            $("#fortifystatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct4'>({state_count4}) Yale State Four</option><option value='ct6'>({state_count6}) Yale State Six</option><option value='ct7'>({state_count7}) Yale State Seven</option>");
        }
        else if (val == "ct6") {
            $("#fortifystatetwo").html("<option value='ct2'>({state_count2}) Yale State Two</option><option value='ct3'>({state_count3}) Yale State Three</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct7'>({state_count7}) Yale State Seven</option>");
        }
        else if (val == "ct7") {
            $("#fortifystatetwo").html("<option value='ct3'>({state_count3}) Yale State Three</option><option value='ct5'>({state_count5}) Yale State Five</option><option value='ct6'>({state_count6}) Yale State Six</option>");
        }
        else if (val == "ct8") {
            $("#fortifystatetwo").html("<option value='ct4'>({state_count4}) Yale State Four</option><option value='ri5'>({state_count64}) Brown State Five</option>");
        }
        else if (val == "ma1") {
            $("#fortifystatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ma2") {
            $("#fortifystatetwo").html("<option value='ma1'>({state_count9}) Harvard State One</option><option value='ma3'>({state_count11}) Harvard State Three</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ma3") {
            $("#fortifystatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma6'>({state_count14}) Harvard State Six</option>");
        }
        else if (val == "ma4") {
            $("#fortifystatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma3'>({state_count11}) Harvard State Three</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ma6'>({state_count14}) Harvard State Six</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ma5") {
            $("#fortifystatetwo").html("<option value='ma1'>({state_count9}) Harvard State One</option><option value='ma2'>({state_count10}) Harvard State Two</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma7'>({state_count15}) Harvard State Seven</option>");
        }
        else if (val == "ma6") {
            $("#fortifystatetwo").html("<option value='ma3'>({state_count11}) Harvard State Three</option><option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma7'>({state_count15}) Harvard State Seven</option><option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma10'>({state_count18}) Harvard State Ten</option>");
        }
        else if (val == "ma7") {
            $("#fortifystatetwo").html("<option value='ma4'>({state_count12}) Harvard State Four</option><option value='ma5'>({state_count13}) Harvard State Five</option><option value='ma6'>({state_count15}) Harvard State Six</option><option value='ma10'>({state_count18}) Harvard State Ten</option>");
        }
        else if (val == "ma8") {
            $("#fortifystatetwo").html("<option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma12'>({state_count20}) Harvard State Twelve</option>");
        }
        else if (val == "ma9") {
            $("#fortifystatetwo").html("<option value='ma6'>({state_count14}) Harvard State Six</option><option value='ma8'>({state_count16}) Harvard State Eight</option><option value='ma10'>({state_count18}) Harvard State Ten</option><option value='ma12'>({state_count20}) Harvard State Twelve</option>");
        }
        else if (val == "ma10") {
            $("#fortifystatetwo").html("<option value='ma6'>({state_count14}) Harvard State Six</option><option value='ma7'>({state_count15}) Harvard State Seven</option><option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma11'>({state_count19}) Harvard State Eleven</option><option value='ma12'>({state_count20}) Harvard State Twelve</option>");
        }
        else if (val == "ma11") {
            $("#fortifystatetwo").html("<option value='ma10'>({state_count18}) Harvard State Ten</option><option value='ma12'>({state_count20}) Harvard State Twelve</option><option value='ma13'>({state_count21}) Harvard State Thirteen</option>");
        }
        else if (val == "ma12") {
            $("#fortifystatetwo").html("<option value='ma8'>({state_count16}) Harvard State Eight</option><option value='ma9'>({state_count17}) Harvard State Nine</option><option value='ma10'>({state_count18}) Harvard State Ten</option><option value='ma11'>({state_count19}) Harvard State Eleven</option><option value='ma13'>({state_count21}) Harvard State Thirteen</option>");
        }
        else if (val == "ma13") {
            $("#fortifystatetwo").html("<option value='ma11'>({state_count19}) Harvard State Eleven</option><option value='ma12'>({state_count20}) Harvard State Twelve</option><option value='ri2'>({state_count61}) Brown State Two</option>");
        }
        else if (val == "nh1") {
            $("#fortifystatetwo").html("<option value='nh2'>({state_count23}) Dartmouth State Two</option><option value='nh3'>({state_count24}) Dartmouth State Three</option><option value='ny7'>({state_count45}) Cornell State Seven</option>");
        }
        else if (val == "nh2") {
            $("#fortifystatetwo").html("<option value='nh1'>({state_count22}) Dartmouth State Two</option><option value='nh3'>({state_count24}) Dartmouth State Three</option><option value='nh4'>({state_count25}) Dartmouth State Four</option>");
        }
        else if (val == "nh3") {
            $("#fortifystatetwo").html("<option value='nh1'>({state_count22}) Dartmouth State One</option><option value='nh2'>({state_count23}) Dartmouth State Two</option><option value='nh4'>({state_count25}) Dartmouth State Four</option>");
        }
        else if (val == "nh4") {
            $("#fortifystatetwo").html("<option value='nh2'>({state_count23}) Dartmouth State Two</option><option value='nh3'>({state_count24}) Dartmouth State Three</option><option value='nh5'>({state_count26}) Dartmouth State Five</option><option value='nh6'>({state_count27}) Dartmouth State Six</option>");
        }
        else if (val == "nh5") {
            $("#fortifystatetwo").html("<option value='nh4'>({state_count25}) Dartmouth State Four</option><option value='nh6'>({state_count27}) Dartmouth State Six</option><option value='nh7'>({state_count28}) Dartmouth State Seven</option>");
        }
        else if (val == "nh6") {
            $("#fortifystatetwo").html("<option value='ma6'>({state_count14}) Harvard State Six</option><option value='nh4'>({state_count25}) Dartmouth State Four</option><option value='nh5'>({state_count26}) Dartmouth State Five</option><option value='nh7'>({state_count28}) Dartmouth State Seven</option>");
        }
        else if (val == "nh7") {
            $("#fortifystatetwo").html("<option value='ma2'>({state_count10}) Harvard State Two</option><option value='nh5'>({state_count26}) Dartmouth State Five</option><option value='nh6'>({state_count27}) Dartmouth State Six</option>");
        }
        else if (val == "nj1") {
            $("#fortifystatetwo").html("<option value='nj2'>({state_count30}) Princeton State Two</option><option value='nj3'>({state_count31}) Princeton State Three</option><option value='nj4'>({state_count32}) Princeton State Four</option><option value='pa6'>({state_count55}) UPenn State Six</option>");
        }
        else if (val == "nj2") {
            $("#fortifystatetwo").html("<option value='nj1'>({state_count29}) Princeton State One</option><option value='nj3'>({state_count31}) Princeton State Three</option><option value='nj4'>({state_count32}) Princeton State Four</option><option value='nj5'>({state_count33}) Princeton State Five</option>");
        }
        else if (val == "nj3") {
            $("#fortifystatetwo").html("<option value='ct4'>({state_count4}) Yale State Four</option><option value='nj1'>({state_count29}) Princeton State One</option><option value='nj2'>({state_count30}) Princeton State Two</option>");
        }
        else if (val == "nj4") {
            $("#fortifystatetwo").html("<option value='nj1'>({state_count29}) Princeton State One</option><option value='nj2'>({state_count30}) Princeton State Two</option><option value='nj5'>({state_count33}) Princeton State Five</option><option value='nj7'>({state_count35}) Princeton State Seven</option>");
        }
        else if (val == "nj5") {
            $("#fortifystatetwo").html("<option value='nj2'>({state_count30}) Princeton State Two</option><option value='nj4'>({state_count32}) Princeton State Four</option><option value='nj6'>({state_count34}) Princeton State Six</option><option value='nj7'>({state_count35}) Princeton State Seven</option>");
        }
        else if (val == "nj6") {
            $("#fortifystatetwo").html("<option value='nj5'>({state_count33}) Princeton State Five</option><option value='nj7'>({state_count35}) Princeton State Seven</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "nj7") {
            $("#fortifystatetwo").html("<option value='nj4'>({state_count32}) Princeton State Four</option><option value='nj5'>({state_count33}) Princeton State Five</option><option value='nj6'>({state_count34}) Princeton State Six</option><option value='nj8'>({state_count36}) Princeton State Eight</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "nj8") {
            $("#fortifystatetwo").html("<option value='nj7'>({state_count35}) Princeton State Seven</option><option value='nj9'>({state_count37}) Princeton State Nine</option><option value='nj10'>({state_count38}) Princeton State Ten</option>");
        }
        else if (val == "nj9") {
            $("#fortifystatetwo").html("<option value='nj8'>({state_count36}) Princeton State Eight</option><option value='nj10'>({state_count38}) Princeton State Ten</option><option value='pa9'>({state_count58}) UPenn State Nine</option>");
        }
        else if (val == "nj10") {
            $("#fortifystatetwo").html("<option value='ct4'>({state_count4}) Yale State Four</option><option value='nj6'>({state_count34}) Princeton State Six</option><option value='nj7'>({state_count35}) Princeton State Seven</option><option value='nj8'>({state_count36}) Princeton State Eight</option><option value='nj9'>({state_count37}) Princeton State Nine</option>");
        }
        else if (val == "ny1") {
            $("#fortifystatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option>");
        }
        else if (val == "ny2") {
            $("#fortifystatetwo").html("<option value='ny1'>({state_count39}) Cornell State One</option><option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny6'>({state_count44}) Columbia State Six</option><option value='pa2'>({state_count51}) UPenn State Two</option>");
        }
        else if (val == "ny3") {
            $("#fortifystatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny7'>({state_count45}) Cornell State Seven</option><option value='ny8'>({state_count46}) Cornell State Eight</option>");
        }
        else if (val == "ny4") {
            $("#fortifystatetwo").html("<option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny8'>({state_count46}) Cornell State Eight</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ny5") {
            $("#fortifystatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny6'>({state_count44}) Columbia State Six</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ny6") {
            $("#fortifystatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny10'>({state_count48}) Columbia State Ten</option><option value='ny11'>({state_count49}) Columbia State Eleven</option>");
        }
        else if (val == "ny7") {
            $("#fortifystatetwo").html("<option value='ny1'>({state_count39}) Cornell State One</option><option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny8'>({state_count46}) Cornell State Eight</option>");
        }
        else if (val == "ny8") {
            $("#fortifystatetwo").html("<option value='ny3'>({state_count41}) Cornell State Three</option><option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny7'>({state_count45}) Cornell State Seven</option><option value='ny9'>({state_count47}) Columbia State Nine</option>");
        }
        else if (val == "ny9") {
            $("#fortifystatetwo").html("<option value='ny4'>({state_count42}) Cornell State Four</option><option value='ny5'>({state_count43}) Columbia State Five</option><option value='ny8'>({state_count46}) Cornell State Eight</option><option value='ny10'>({state_count48}) Columbia State Ten</option>");
        }
        else if (val == "ny10") {
            $("#fortifystatetwo").html("<option value='ny6'>({state_count44}) Columbia State Six</option><option value='ny10'>({state_count48}) Columbia State Ten</option><option value='ny11'>({state_count49}) Columbia State Eleven</option>");
        }
        else if (val == "ny11") {
            $("#fortifystatetwo").html("<option value='ct1'>({state_count1}) Yale State One</option><option value='ny6'>({state_count44}) Columbia State Six</option><option value='ny10'>({state_count48}) Columbia State Ten</option><option value='pa3'>({state_count52}) UPenn State Three</option>");
        }
        else if (val == "pa1") {
            $("#fortifystatetwo").html("<option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa4'>({state_count53}) UPenn State Four</option><option value='pa5'>({state_count54}) UPenn State Five</option>");
        }
        else if (val == "pa2") {
            $("#fortifystatetwo").html("<option value='ny2'>({state_count40}) Cornell State Two</option><option value='pa1'>({state_count50}) UPenn State One</option><option value='pa3'>({state_count52}) UPenn State Three</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa6'>({state_count55}) UPenn State Six</option>");
        }
        else if (val == "pa3") {
            $("#fortifystatetwo").html("<option value='ny11'>({state_count49}) Columbia State Eleven</option><option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa6'>({state_count55}) UPenn State Six</option>");
        }
        else if (val == "pa4") {
            $("#fortifystatetwo").html("<option value='pa1'>({state_count50}) UPenn State One</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa7'>({state_count56}) UPenn State Seven</option>");
        }
        else if (val == "pa5") {
            $("#fortifystatetwo").html("<option value='pa1'>({state_count50}) UPenn State One</option><option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa4'>({state_count53}) UPenn State Four</option><option value='pa6'>({state_count55}) UPenn State Six</option><option value='pa7'>({state_count56}) UPenn State Seven</option><option value='pa8'>({state_count57}) UPenn State Eight</option>");
        }
        else if (val == "pa6") {
            $("#fortifystatetwo").html("<option value='pa2'>({state_count51}) UPenn State Two</option><option value='pa3'>({state_count52}) UPenn State Three</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa10'>({state_count59}) UPenn State Ten</option>");
        }
        else if (val == "pa7") {
            $("#fortifystatetwo").html("<option value='pa4'>({state_count53}) UPenn State Four</option><option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa9'>({state_count58}) UPenn State Nine</option>");
        }
        else if (val == "pa8") {
            $("#fortifystatetwo").html("<option value='pa5'>({state_count54}) UPenn State Five</option><option value='pa6'>({state_count55}) UPenn State Six</option><option value='pa7'>({state_count56}) UPenn State Seven</option><option value='pa9'>({state_count58}) UPenn State Nine</option><option value='pa10'>({state_count59}) UPenn State Ten</option>");
        }
        else if (val == "pa9") {
            $("#fortifystatetwo").html("<option value='pa7'>({state_count56}) UPenn State Seven</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa10'>({state_count59}) UPenn State Ten</option>");
        }
        else if (val == "pa10") {
            $("#fortifystatetwo").html("<option value='pa6'>({state_count55}) UPenn State Six</option><option value='pa8'>({state_count57}) UPenn State Eight</option><option value='pa9'>({state_count58}) UPenn State Nine</option>");
        }
        else if (val == "ri1") {
            $("#fortifystatetwo").html("<option value='ri2'>({state_count61}) Brown State Two</option><option value='ri3'>({state_count62}) Brown State Three</option><option value='ri4'>({state_count63}) Brown State Four</option>");
        }
        else if (val == "ri2") {
            $("#fortifystatetwo").html("<option value='ma13'>({state_count21}) Harvard State Thirteen</option><option value='ri1'>({state_count60}) Brown State One</option><option value='ri4'>({state_count63}) Brown State Four</option>");
        }
        else if (val == "ri3") {
            $("#fortifystatetwo").html("<option value='ri1'>({state_count60}) Brown State One</option><option value='ri4'>({state_count63}) Brown State Four</option><option value='nh5'>({state_count64}) Brown State Five</option>");
        }
        else if (val == "ri4") {
            $("#fortifystatetwo").html("<option value='ri1'>({state_count60}) Brown State One</option><option value='ri2'>({state_count61}) Brown State Two</option><option value='ri3'>({state_count62}) Brown State Three</option>");
        }
        else if (val == "ri5") {
            $("#fortifystatetwo").html("<option value='ct8'>({state_count8}) Yale State Eight</option><option value='ri3'>({state_count62}) Brown State Three</option>");
        }
    });
  
    

});


</script>


</head>
<body>
<center>
	<div id="main" style="opacity: .7; padding: 10px; width:93%; margin-bottom: 0; color: #888; border: 1px #d3d3d3 solid;">
		<table width="100%">
			<tr align="center" style="font-weight: bold;">
				<td width="33%">Troop Placements/States</td>
				<td width="33%">Attacks</td>
				<td width="33%">Fortifies</td>
			</tr>
			<tr align="center">
				<td width="33%">
					{total_troop_placements}
				</td>
				<td width="33%">
					{total_attacks}
				</td>
				<td width="33%">
					{total_fortifies}
				</td>
			</tr>
			<tr align="center">
				<td width="33%">
					{troop_placements}
				</td>
				<td width="33%">
					{attacks}
				</td>
				<td width="33%">
					{fortifies}
				</td>
			</tr>
		</table>
		
		
	</div>
</center>
</body>


</html>