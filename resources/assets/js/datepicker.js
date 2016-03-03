  $(function() {
    $( "#checkIn" ).datepicker({
      changeMonth: false,
      numberOfMonths: 1,
      dateFormat: 'yy-mm-dd',
      minDate: 0,
      showAnim: 'slideDown',
      onClose: function( selectedDate ) {
        $("#checkOut").datepicker( "option", "minDate", selectedDate);
      }
    });

    $("#checkOut").datepicker({
      changeMonth: false,
      numberOfMonths: 1,
      dateFormat: 'yy-mm-dd',
      showAnim: 'slideDown',
      onClose: function( selectedDate ) {
        $("#checkIn").datepicker( "option", "maxDate", selectedDate );
      }
    });
  });