$(function() {
    $('#wb-tracking-results').hide();
  $('#wb-tracking-code-refresh').click(function() {
      $('#wb-track-your-order').show();
      $('#wb-tracking-results').hide();
  })		
  $('#wb-submit-tracking-code').click(function() {
       $('#wb-tracking-results').show();
        $('#wb-tracking-results button').hide();
       $('#wb-track-your-order').hide();
      $('#wb-tracking-results .wb-response').html('<p class="alert alert-info">Searching...</p>');
      var siteId = '38';
      var trackingCode = escape($('#wb-tracking-code').val());
      var jsonString = '{"siteId":"'+siteId+'","trackingCode":"'+trackingCode+'","odPath":"../../wingubox.com/html","action":"tracking code"}';
      $.ajax({
        type: "POST",
  		url: "submit.php",
        dataType: "JSON",
  		data: {json: jsonString},
  		success: function(data) {
            var historyString = '';
            var history = '';
            var username = '';
            var status;
            
            $('#wb-tracking-results button').show();
		    if(data.data.length) {
                historyString = '<table><thead><th>Date/Time</th><th>Status</th><th></th></tr></thead><tbody>';
                for(var i = 0; i < data.data.length; i++) {
                    history = data.data[i];
                    console.log(history);
                                        status = (history.Status == 'Printed') ? 'Preparation for shipping': status = history.Status;                    
                                    historyString += '<tr><td>'+history.Date+'</td><td>'+status+'</td><td>'+username+'</td></tr>';
                }
                historyString += '</tbody></table>';
                
            } else
                historyString = '<p class="alert alert-warning">'+data.msg+'</p>';
            $('#wb-tracking-results .wb-response').html('<h4>'+data.title+'</h4>'+historyString);
		}  
		});	
  });
});
