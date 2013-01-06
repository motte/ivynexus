<script language="javascript" type="text/javascript" src="external/cf/contentflow.js" load="slideshow"></script>
<script language="JavaScript" type="text/javascript" src="external/cf/ContentFlowAddOn_slideshow.js"></script>
<script>
	function onSchool(school) {
		if(school == 'yale') {$('#ct').animate({'opacity':'1'}),100}
		else if(school == 'dartmouth') {$('#nh').animate({'opacity':'1'}),100}
		else if(school == 'upenn') {$('#pa').animate({'opacity':'1'}),100}
		else if(school == 'princeton') {$('#nj').animate({'opacity':'1'}),100}
		else if(school == 'cornell') {$('#ny').animate({'opacity':'1'}),100}
		else if(school == 'columbia') {$('#ny').animate({'opacity':'1'}),100}
		else if(school == 'harvard') {$('#ma').animate({'opacity':'1'}),100}
		else if(school == 'brown') {$('#ri').animate({'opacity':'1'}),100}
		
		else if(school == 'yaleout') {$('#ct').animate({'opacity':'0'}),100}
		else if(school == 'dartmouthout') {$('#nh').animate({'opacity':'0'}),100}
		else if(school == 'upennout') {$('#pa').animate({'opacity':'0'}),100}
		else if(school == 'princetonout') {$('#nj').animate({'opacity':'0'}),100}
		else if(school == 'cornellout') {$('#ny').animate({'opacity':'0'}),100}
		else if(school == 'columbiaout') {$('#ny').animate({'opacity':'0'}),100}
		else if(school == 'harvardout') {$('#ma').animate({'opacity':'0'}),100}
		else if(school == 'brownout') {$('#ri').animate({'opacity':'0'}),100}
	}
</script>


<body>
<center>
<div id="main">
	<div style="margin-top: 40px;margin-bottom: 100px;">
		<span align="center" id="geomap"></span>
		<span align="center" id="ny"></span>
		<span align="center" id="ct"></span>
		<span align="center" id="nh"></span>
		<span align="center" id="pa"></span>
		<span align="center" id="ri"></span>
		<span align="center" id="ma"></span>
		<span align="center" id="nj"></span>
			<table align="center" valign="top">
				<tr align="center">
					<td width="50%"><a href="ivies/Yale" onmouseover="onSchool('yale')" onmouseout="onSchool('yaleout')"><span id="yale"></span></a></td><td width="50%"><a href="ivies/Dartmouth" onmouseover="onSchool('dartmouth')" onmouseout="onSchool('dartmouthout')"><span id="dartmouth"></span></a></td>
				</tr>	
				<tr align="center">
					<td width="50%"><a href="ivies/Upenn" onmouseover="onSchool('upenn')" onmouseout="onSchool('upennout')"><span id="upenn"></span></a></td><td width="50%"><a href="ivies/Cornell" onmouseover="onSchool('cornell')" onmouseout="onSchool('cornellout')"><span id="cornell"></span></a></td>
				</tr>
				<tr align="center">
					<td width="50%"><a href="ivies/Princeton" onmouseover="onSchool('princeton')" onmouseout="onSchool('princetonout')"><span id="princeton"></span></a></td><td width="50%"><a href="ivies/Columbia" onmouseover="onSchool('columbia')" onmouseout="onSchool('columbiaout')"><span id="columbia"></span></a></td>
				</tr>
				<tr align="center">
					<td width="50%"><a href="ivies/Harvard" onmouseover="onSchool('harvard')" onmouseout="onSchool('harvardout')"><span id="harvard"></span></a></td><td width="50%"><a href="ivies/Brown" onmouseover="onSchool('brown')" onmouseout="onSchool('brownout')"><span id="brown"></span></a></td>
				</tr>
			</table>
		
	</div>
	<div style="width: 70%; border-top: 1px solid #eee; margin-bottom: 12px;"></div>
<div class="ContentFlow" style="margin-top: '150px;">
            <div class="loadIndicator"><div class="indicator"></div></div>
            <div class="flow">
                <img href="ivies/Yale" class="item" src="external/schools/yale.svg.png" title="Yale University"/>
                <img href="ivies/Brown" class="item" src="external/schools/brown.svg.png" title="Brown University"/>
                <img href="ivies/Columbia" class="item" src="external/schools/columbia.svg.png" title="Columbia University"/>
                <img href="ivies/Cornell" class="item" src="external/schools/cornell.svg.png" title="Cornell University"/>
                <img href="ivies/Dartmouth" class="item" src="external/schools/dartmouth.svg.png" title="Dartmouth College"/>
                <img href="ivies/Harvard" class="item" src="external/schools/harvard.svg.png" title="Harvard University"/>
                <img href="ivies/MIT" class="item" src="external/schools/mit.svg.png" title="MIT"/>
                <img href="ivies/Princeton" class="item" src="external/schools/princeton.svg.png" title="Princeton University"/>
                <img href="ivies/Stanford" class="item" src="external/schools/stanford.svg.png" title="Stanford University"/>
                <img href="ivies/Penn" class="item" src="external/schools/upenn.svg.png" title="University of Pennsylvania"/>
            </div>
            <div class="globalCaption"></div>

</div>

	<div style="width: 70%; border-top: 1px solid #eee; margin-bottom: 12px;"></div>

<div class="helvfourteen">
	&nbsp &bull; &nbsp<a href="ivies/Harvard" id="helvfourteen">Harvard University</a>&nbsp &bull;&nbsp
	<a href="ivies/Yale" id="helvfourteen">Yale University</a>&nbsp &bull;&nbsp
	<a href="ivies/Princeton" id="helvfourteen">Princeton University</a>&nbsp &bull;&nbsp
	<a href="ivies/Columbia" id="helvfourteen">Columbia University</a>&nbsp &bull;&nbsp
	<a href="ivies/Stanford" id="helvfourteen">Stanford University</a>&nbsp &bull;
	<div style="margin-bottom:8px;"></div>
	&nbsp &bull; &nbsp<a href="ivies/Cornell" id="helvfourteen">Cornell University</a>&nbsp &bull;&nbsp
	<a href="ivies/Dartmouth" id="helvfourteen">Dartmouth College</a>&nbsp &bull;&nbsp
	<a href="ivies/Penn" id="helvfourteen">University of Pennsylvania</a>&nbsp &bull;&nbsp
	<a href="ivies/MIT" id="helvfourteen">MIT</a>&nbsp &bull;&nbsp
	<a href="ivies/Brown" id="helvfourteen">Brown University</a>&nbsp &bull; &nbsp
</div><br />


</div>
</center>
</body>