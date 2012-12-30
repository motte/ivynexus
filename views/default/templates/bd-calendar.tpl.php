<script type="text/javascript">
	// <![CDATA[	
	$(document).ready(function(){	
 
		// click to submit an event
		$('#CreateEvent').click(function(){
 
			var a = $("#EventInput").val();
			if(a != "What are you planning?")
			{
				$.post("event.php?val=1&"+$("#EventForm").serialize(), {
 
				}, function(response){
					$('#ShowEvents').prepend($(response).fadeIn('slow'));
					clearForm();
				});
			}
			else
			{
				alert("Enter event name.");
				$("#EventInput").focus();
			}
		});	
 
		// delete event
		$('a.delete').livequery("click", function(e){
			if(confirm('Are you sure you want to delete?')==false)
 
			return false;
 
			e.preventDefault();
			var parent  = $(this).parent();
			var id =  $(this).attr('id').replace('record-','');	
 
			$.ajax({
				type: 'get',
				url: 'delete.php?id='+ id,
				data: '',
				beforeSend: function(){
				},
				success: function(){
					parent.fadeOut(200,function(){
						parent.remove();
					});
				}
			});
		});	
 
		// show form when input get focus
		$('#EventInput').focus(function(){
			$('#EventBox').fadeIn();
			$('a.cancel').fadeIn();
		});	
 
		// hide for when click on cancel
		$('a.cancel').click(function(){
			$('#EventBox').fadeOut();
			$('a.cancel').hide();
		});	
 
		// watermark input fields
		jQuery(function($){
 
		   $("#EventInput").Watermark("What are you planning?");
		   $("#Where").Watermark("Where?");
		   $("#WhoInvited").Watermark("Who's Invited?");
		});
		jQuery(function($){
 
		    $("#EventInput").Watermark("watermark","#369");
			$("#Where").Watermark("watermark","#369");
			$("#WhoInvited").Watermark("watermark","#369");
 
		});	
		function UseData(){
		   $.Watermark.HideAll();
		   $.Watermark.ShowAll();
		}
 
	});	
 
	// show jquery calendar
	$(function() {
		$("#datepicker").datepicker();
	});
 
	function clearForm()
	{
		$('#EventInput').val("What are you planning?");
		$('#datepicker').val("Today");
		$('#WhoInvited').val("Who's Invited?");
		$('#Where').val("Where?");
 
		$('#EventBox').hide();
		$('a.cancel').hide();
	}
 
	// ]]>
</script>
<center>
<div id="main">
	<div id="rightside">
	</div>
	
	<div id="content" class="engraved">
		
		<h2>{month_name} {the_year}</h2>
		<p>
			<a href="calendar/?&amp;month={pm}&amp;year={py}">Previous</a> &bullet; <a href="calendar/?&amp;month={nm}&amp;year={ny}">Next</a>
		</p>
	
	<table id="">
		<tr>
			<th class="weekend" width="150px;">{cal_0_day_0}</th> 
			<th class="" width="150px;">{cal_0_day_1}</th> 
			<th class="" width="150px;">{cal_0_day_2}</th> 
			<th class="" width="150px;">{cal_0_day_3}</th> 
			<th class="" width="150px;">{cal_0_day_4}</th> 
			<th class="" width="150px;">{cal_0_day_5}</th> 
			<th class="weekend" width="150px;">{cal_0_day_6}</th>
		</tr>
		<tr> 
			<td class="weekend {cal_0_dates_style_0}">{cal_0_dates_0} {cal_0_dates_data_0}</td> 
			<td class="{cal_0_dates_style_1}">{cal_0_dates_1} {cal_0_dates_data_1}</td> 
			<td class="{cal_0_dates_style_2}">{cal_0_dates_2} {cal_0_dates_data_2}</td> 
			<td class="{cal_0_dates_style_3}">{cal_0_dates_3} {cal_0_dates_data_3}</td> 
			<td class="{cal_0_dates_style_4}">{cal_0_dates_4} {cal_0_dates_data_4}</td> 
			<td class="{cal_0_dates_style_5}">{cal_0_dates_5} {cal_0_dates_data_5}</td> 
			<td class="weekend {cal_0_dates_style_6}">{cal_0_dates_6} {cal_0_dates_data_6}</td> 
		</tr> 
		<tr> 
			<td class="weekend {cal_0_dates_style_7}">{cal_0_dates_7} {cal_0_dates_data_7}</td> 
			<td class="{cal_0_dates_style_8}">{cal_0_dates_8} {cal_0_dates_data_8}</td> 
			<td class="{cal_0_dates_style_9}">{cal_0_dates_9} {cal_0_dates_data_9}</td> 
			<td class="{cal_0_dates_style_10}">{cal_0_dates_10} {cal_0_dates_data_10}</td> 
			<td class="{cal_0_dates_style_11}">{cal_0_dates_11} {cal_0_dates_data_11}</td> 
			<td class="{cal_0_dates_style_12}">{cal_0_dates_12} {cal_0_dates_data_12}</td> 
			<td class="weekend {cal_0_dates_style_13}">{cal_0_dates_13} {cal_0_dates_data_13}</td> 
		</tr> 
		<tr> 
			<td class="weekend {cal_0_dates_style_14}">{cal_0_dates_14} {cal_0_dates_data_14}</td> 
			<td class="{cal_0_dates_style_15}">{cal_0_dates_15} {cal_0_dates_data_15}</td> 
			<td class="{cal_0_dates_style_16}">{cal_0_dates_16} {cal_0_dates_data_16}</td> 
			<td class="{cal_0_dates_style_17}">{cal_0_dates_17} {cal_0_dates_data_17}</td> 
			<td class="{cal_0_dates_style_18}">{cal_0_dates_18} {cal_0_dates_data_18}</td> 
			<td class="{cal_0_dates_style_18}">{cal_0_dates_19} {cal_0_dates_data_19}</td> 
			<td class="weekend {cal_0_dates_style_20}">{cal_0_dates_20} {cal_0_dates_data_20}</td> 
		</tr> 
		<tr> 
			<td class="weekend {cal_0_dates_style_21}">{cal_0_dates_21} {cal_0_dates_data_21}</td> 
			<td class="{cal_0_dates_style_22}">{cal_0_dates_22} {cal_0_dates_data_22}</td> 
			<td class="{cal_0_dates_style_23}">{cal_0_dates_23} {cal_0_dates_data_23}</td> 
			<td class="{cal_0_dates_style_24}">{cal_0_dates_24} {cal_0_dates_data_24}</td> 
			<td class="{cal_0_dates_style_25}">{cal_0_dates_25} {cal_0_dates_data_25}</td> 
			<td class="{cal_0_dates_style_26}">{cal_0_dates_26} {cal_0_dates_data_26}</td> 
			<td class="weekend {cal_0_dates_style_27}">{cal_0_dates_27} {cal_0_dates_data_27}</td> 
		</tr> 
		<tr> 
			<td class="weekend {cal_0_dates_style_28}">{cal_0_dates_28} {cal_0_dates_data_28}</td> 
			<td class="{cal_0_dates_style_29}">{cal_0_dates_29} {cal_0_dates_data_29}</td> 
			<td class="{cal_0_dates_style_30}">{cal_0_dates_30} {cal_0_dates_data_30}</td> 
			<td class="{cal_0_dates_style_31}">{cal_0_dates_31} {cal_0_dates_data_31}</td> 
			<td class="{cal_0_dates_style_32}">{cal_0_dates_32} {cal_0_dates_data_32}</td> 
			<td class="{cal_0_dates_style_33}">{cal_0_dates_33} {cal_0_dates_data_33}</td> 
			<td class="weekend {cal_0_dates_style_34}">{cal_0_dates_34} {cal_0_dates_data_34}</td> 
		</tr> 
		<tr> 
			<td class="weekend {cal_0_dates_style_35}">{cal_0_dates_35} {cal_0_dates_data_35}</td> 
			<td class="{cal_0_dates_style_36}">{cal_0_dates_36} {cal_0_dates_data_36}</td> 
			<td class="{cal_0_dates_style_37}">{cal_0_dates_37} {cal_0_dates_data_37}</td> 
			<td class="{cal_0_dates_style_38}">{cal_0_dates_38} {cal_0_dates_data_38}</td> 
			<td class="{cal_0_dates_style_39}">{cal_0_dates_39} {cal_0_dates_data_39}</td> 
			<td class="{cal_0_dates_style_40}">{cal_0_dates_40} {cal_0_dates_data_40}</td> 
			<td class="weekend {cal_0_dates_style_41}">{cal_0_dates_41} {cal_0_dates_data_41}</td> 
		</tr>
	</table>
	</div>
</div>
</center>