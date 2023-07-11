function todate()
{
	$('#chooseservice').fadeToggle();
	$('#choosedate').fadeToggle();
	$('#datetimeblock').fadeToggle(700);
	$('#step3title').toggle();
	$('#step2title').fadeToggle(700);
	$('#step3').removeClass('active');
		
}		
function confirmService(){
	$.ajax({
	type: 'get',
	url: 'checktimeslot.php',
	dataType: "JSON",
	data:{
		'date' : findGetParameter('date'),
		'hairdresserid' : findGetParameter('hairdresserid'),
	},
	success: function(response)
	{
		for(var i = 0; response.estimate.length>i ; i++)
		{
			
			var tm = parseInt(totalMinute);
			var estimate = parseInt(response.estimate[i]);
			var h = parseInt(response.starttime[i].substring(0,2))
			var m = parseInt(response.starttime[i].substring(2,4))
			while(tm >30)
			{
				
				if(m<30)
				{
					h-=1;
					m=parseInt(m);
					m+=30;
				}
				else{
					m=parseInt(m);
					m-=30;
				}
				tm-=30;
				if(h.toString().length==1)
					h="0"+h.toString();
				if(m.toString().length==1)
					m="0"+m.toString();
				var a=h.toString()+m.toString()+"";
				if($('#labelradio'+a).css('background-color')!= "rgb(255, 105, 130)")
				{
					$('#radio'+a).prop('disabled', true);
					$('#labelradio'+a).css('background-color',"#ffebb3");
					$('#labelradio'+a).attr('title',"Time Slot Clashed");
				}
				
				
			}
		}
	}
	})
	if(findGetParameter("serviceid")==null || findGetParameter("serviceid")=='')
	{
		Swal.fire({
          html: '<b>You must choose at least one service to proceed!</b>',
          type: 'warning'
		});
		return;
	}
	$('#step3title').toggle();
	$('#step4title').fadeToggle(700);
	$('#chooseservice').fadeToggle();
	$('#choosetimeslot').fadeToggle(700);
	$('#step4').addClass('active');
	var a = (getEstimatedendtimewithbreak(timeslots[timeslots.length-1], totalMinute));
	a = a.replace(/\D/g, '');
	var h = parseInt(a.substring(0,2))
	var m = parseInt(a.substring(2,4))
	if(h<12)
		h+=24;
	if(h.toString().length==1)
		h="0"+h.toString();
	if(m.toString().length==1)
		m="0"+m.toString();
	a=h.toString()+m.toString();
	//<!-- Diasabled exceed timeslot--!>
	
		while(a > 2030)
		{
			$('#radio'+timeslots[temp-1]).prop('disabled', true);
			$('#labelradio'+timeslots[temp-1]).css('background-color',"#bdbdbd");
			$('#labelradio'+timeslots[temp-1]).attr('title',"Exceed Operation Hours");
			
			
			temp--;
			// alert("m="+m+"   h="+h)
			if(m<30)
			{
				h-=1;
				m=parseInt(m);
				m+=30;
			}
			else{
				m=parseInt(m);
				m-=30;
			}
		// alert("zzz  m="+m+"   h="+h)
			if(h.toString().length==1)
				h="0"+h.toString();
			if(m.toString().length==1)
				m="0"+m.toString();
			a=h.toString()+m.toString()+"";
		}
	//<!-- Diasabled exceed timeslot--!>
	$.ajax({
	type: 'get',
	url: 'checktimeslot.php',
	dataType: "JSON",
	data:{
		'date' : findGetParameter('date'),
		'hairdresserid' : findGetParameter('hairdresserid'),
	},
	success : function (response) {
		for(var i = 0; response.estimate.length>i ; i++)
		{
			var estimate = parseInt(response.estimate[i]);
			var h = parseInt(response.starttime[i].substring(0,2))
			var m = parseInt(response.starttime[i].substring(2,4))
			
			while(estimate!=0)
			{
				if(h.toString().length==1)
					h="0"+h.toString();
				if(m.toString().length==1)
					m="0"+m.toString();
				var a=h.toString()+m.toString()+"";
				if(estimate >30)
				{
					$('#radio'+a).prop('disabled', true);
					$('#labelradio'+a).css('background-color',"#ff6982");
					$('#labelradio'+a).attr('title',"Time Slot Booked");
					estimate -= 30;
					if(m<30)
					{
						
						m=parseInt(m);
						m+=30;
					}
					else{
						h+=1;
						m=parseInt(m);
						m-=30;
					}
				}
				else{
					$('#radio'+a).prop('disabled', true);
					$('#labelradio'+a).css('background-color',"#ff6982");
					$('#labelradio'+a).attr('title',"Time Slot Booked");
					estimate -= estimate;
				}
				
				
			}
		}
		}
	})
}
function toservice() {
	$('#chooseservice').fadeToggle(700);
	$('#choosetimeslot').fadeToggle();
	$('#step4').removeClass('active');
	$('#step4title').toggle();
	$('#step3title').fadeToggle(700);
	$('.infoblock-selectedtime').toggle();
	if($('#endtimeblock').css('display')=='block')
	{
		$('#endtimeblock').toggle();
		for(var i=0;i<timeslots.length;i++)
		{
			$('#radio'+timeslots[i]).removeAttr('checked');
		}
	}
	for(var i=0;i<timeslots.length;i++)
	{
		if($('#labelradio'+timeslots[i]).css('background-color') != "rgb(255, 105, 130)")
		{
			$('#radio'+timeslots[i]).prop('disabled', false);
			$('#labelradio'+timeslots[i]).css('background-color',"white");
			$('#labelradio'+timeslots[i]).attr('title',"");
		}
	}
	temp = timeslots.length;
}

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};
function getEstimatedendtime(startTime,duration)
{
	var halflength = Math.floor(startTime.length / 2);
	var startHour = startTime.slice(0,halflength);
	var startMinute = startTime.slice(halflength,startTime.length);
	var endHour = parseInt(startHour);
	var endMinute =parseInt(startMinute + duration);
	while(endMinute >=60)
	{
		endMinute -=60;
		endHour +=1;
	}
	if(endHour>"23")
	{
		if(endHour =="24")
			endHour = "00".toString();
		else
			endHour -= 24;
	
	}
	if(endMinute.toString().length ==1)
		endMinute = "0"+endMinute.toString();
	if(endHour.toString().length ==1)
		endHour =   "0" + endHour.toString();
	
	return  endHour.toString() + endMinute.toString();
}
function getEstimatedendtimewithbreak(startTime,duration)
{
	var halflength = Math.floor(startTime.length / 2);
	var startHour = startTime.slice(0,halflength);
	var startMinute = startTime.slice(halflength,startTime.length);
	var endHour = parseInt(startHour);
	var endMinute =parseInt(startMinute)+ parseInt(duration);
	while(endMinute >=60)
	{
		endMinute -=60;
		endHour +=1;
	}
	if(endHour>"23")
	{
		if(endHour =="24")
			endHour = "00".toString();
		else
			endHour -= 24;
	
	}
	if(endMinute.toString().length ==1)
		endMinute = "0"+endMinute.toString();
	if(endHour.toString().length ==1)
		endHour =   "0" + endHour.toString();
	
	return  endHour.toString() +":"+ endMinute.toString();
}
function tConv24(time24) {
  var ts = time24;
  var H = +ts.substr(0, 2);
  var h = (H % 12) || 12;
  h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
  var ampm = H < 12 ? " AM" : " PM";
  ts = h + ts.substr(2, 3) + ampm;
  return ts;
};
function confirmAppointment()
{
	$('#step6').addClass('active');
	$('#step5title').toggle();
	$('#step6title').fadeToggle(500);
	$('#confirmation').fadeToggle();
	$('#appointmentConfirmed').fadeToggle();
	var hairdresserid = findGetParameter("hairdresserid");
	var date = findGetParameter("date");

	var newurl;
	var endtime = (getEstimatedendtimewithbreak(timeslotform.tsradio.value, totalMinute));
	endtime = endtime.replace(/\D/g, '');
    link = window.location.href;
	var url = location.protocol + '//' + location.host + location.pathname;
    window.location = url + '?hairdresserid=' + hairdresserid +"&date="+date+"&serviceid="+serviceid+"&fee="+fee+"&duration="+totalMinute+"&ts="+timeslotform.tsradio.value+"&endtime="+endtime+"&submit=true";
}
function totimeslot(){
	$('#step5').removeClass('active');
	$('#step5title').toggle();
	$('#step4title').fadeToggle(500);
	$('#confirmation').toggle();
	$('#choosetimeslot').fadeToggle(500);
	$('#infoblock').fadeToggle(500);
}

function replaceUrlParam(url, paramName, paramValue)
{
    if (paramValue == null) {
        paramValue = '';
    }
    var pattern = new RegExp('\\b('+paramName+'=).*?(&|#|$)');
    if (url.search(pattern)>=0) {
        return url.replace(pattern,'$1' + paramValue + '$2');
    }
    url = url.replace(/[?#]$/,'');
    return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
}