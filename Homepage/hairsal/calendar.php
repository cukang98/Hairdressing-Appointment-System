<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!-- jQuery -->

<style type="text/css">
  button
  {
    margin: 4%;
  }
</style>

</head>
<body>

<div class="datepicker"></div>
<span class="table"></span> </div>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div id="calendar"></div>
    </div>

    <div class="col-md-6">
      <div id="event_box"></div>
      <div id="output"></div>
      <div id="example-popover-content"> </div>
      <div id="example-popover-title"> </div>
    </div>

  </div>
</div>

<p id="message"></p>

<script type="text/javascript">

$(document).ready(function()
{
    var selectedDate;
    var calendar = $("#calendar").datepicker({ 
      minDate: -0,
      maxDate: +14,

        onSelect: function(dateText)
        {                          
          var date = $("#calendar").datepicker('getDate');
          var format = $.datepicker.formatDate('dd MM yy (DD)',date);
          selectedDate = format;

          var html =
          '<form method="GET" action="text.php"><table><tr><th>Time</th></tr><tr><td><input type="hidden" name="date" value="'+ selectedDate +'"><button name="time" class="btn btn-success timeBtn" value="9.00 am - 10.00 am">9.00 am - 10.00 am</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="10.00 am - 11.00 am">10.00 am - 11.00 am</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="11.00 am - 12.00 pm">11.00 am - 12.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="1.00 pm - 2.00 pm">1.00 pm -2.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="2.00 pm - 3.00 pm">2.00 pm - 3.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="3.00 pm - 4.00 pm">3.00 pm - 4.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="4.00 pm - 5.00 pm">4.00 pm - 5.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="5.00 pm - 6.00 pm">5.00 pm - 6.00 pm</button></td></tr></table></form>';
          $('#example-popover-title').html('<br>'+html);

          // var html = 
          // '<table><tr><th>Time</th></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="9.00 am - 10.00 am">9.00 am - 10.00 am</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="10.00 am - 11.00 am">10.00 am - 11.00 am</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="11.00 am - 12.00 pm">11.00 am - 12.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="1.00 pm - 2.00 pm">1.00 pm -2.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="2.00 pm - 3.00 pm">2.00 pm - 3.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="3.00 pm - 4.00 pm">3.00 pm - 4.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="4.00 pm - 5.00 pm">4.00 pm - 5.00 pm</button></td></tr><tr><td><button name="time" class="btn btn-success timeBtn" value="5.00 pm - 6.00 pm">5.00 pm - 6.00 pm</button></td></tr></table>';
          // $('#example-popover-title').html('<br>'+html);
        }
    });

    // $('body').delegate(".timeBtn","click",function(e){
    //     console.log(e);
    //    var time = $(this).attr('value');

    //     $.ajax({
    //       url:"test.php",
    //       method:"POST",
    //       data: {
    //         time:e.currentTarget.value,
    //         date:selectedDate,
    //       },
    //       cache: false,
    //       success: function(html)
    //       {
    //         $('#message').html(html);
    //       }
    //     })
    // });

});

</script>
</body>
</html>