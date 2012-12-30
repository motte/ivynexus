<link rel="stylesheet" href="external/css/coverflow.css" type="text/css" />
<script type="text/javascript" src="external/cf/jquery-1.js"></script>
<script type="text/javascript" src="external/cf/ui.core.js"></script>
<script type="text/javascript" src="external/cf/ui.js"></script>
<script type="text/javascript" src="external/cf/effects.js"></script>
<script type="text/javascript" src="external/cf/ui.coverflow.js"></script>
<script type="text/javascript" src="external/cf/modernizr-1.7.min.js"></script>	

<script type="text/javascript">
	$(document).ready(function() {
		$("div.hproducts").coverflow();
		var refreshId = setInterval(function(){
        $('#chilirefresh').load('{siteurl}/relationships/all/{ID} #chilirefresh');
    }, 10000);
	});		
</script>
<center>
<div id="content">
	<h1>{connecting_name}'s Reaches</h1>
	<div style="width:300px; height:100%; white-space: normal;">

        <!-- START all -->
        <center>
        <span>&nbsp&nbsp<a href="profile/view/{ID}"><img style="height: 135px; margin-top: -5px; padding-right: 8px;" src="uploads/profile/{photo}" /><br /><strong>{users_name}</strong></a>
        <p><strong>&nbsp&nbsp{school}</strong></p>
        <p><strong>&nbsp&nbsp{internship}</strong></p></span>
        </center>
        <!-- END all -->

	</table>

	</div>
</div>
</center>