function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + num + '.' + cents);
}
$(function(){		
		$('.wb-submit').click(function() {
		  var required;
		  var type;
		  var title;
		  var value;
		  var dataString = '';
		  var countError = 0;
		  var errorString = '<div class="alert alert-warning"><ol>';
		  var fromEmail;
		  var siteId = '38';
		  var submittedFormId = $("#submitted-form-id").val();
		  var thisForm = $(this);
 		  var timestamp = new Date().getTime();
		  var remoteIp = $('#wb-remote-ip').val();
		  var token = $('#wb-form-token').val();
		  var httpReferer = $('#http-referer').val();		  
		  var parent = '';
		  var dataLength = 0;
		 $(".contact-form").find(".seeker").each(function(i) {
				parent = $(this).closest('span');				
				type = $(this).next().attr("type");
				title = $(this).next().attr("title");
				value = $(this).next().val();
				required = ($(this).hasClass('required')) ? 1 : 0;
				if(!value) value = '';
                    dataLength += parseInt(value.length);
				if(required && value.length==0) {
					countError++;
					errorString +='<li>'+title+' is required</li>';
				} else {
					if(value.length) {
					  if(type == 'email' || title.match(/email/i)) {
						fromEmail = value; 
						if(value.search(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/i)){
                        countError++;
						errorString +='<li>Invalid Email Address</li>';
						}
					  } else if((type == 'tel' || title.match(/phone/i) || title.match(/tel/))
					   && value.search(/^\+?(\d[\d\-\+\(\) ]{5,}\d$)/)) {
						countError++;
						errorString +='<li>Invalid Phone Number</li>';
					  }
					} 
				}
				if(title!='undefined') {
					if(value == 'undefined') value = '';
					dataString += title+': '+value+'\n <br/><br/>';
				}
		 });
		 
				if(countError) {
					errorString +='</ol></div>';
					
				    $("#response").html(errorString);
				} else if(dataLength<20) {
					$("#response").html('<div class="alert alert-warning"><p>Insufficient data!</p></div>');
					
				} else {
				$('#response').html("Sending...")
				$(thisForm).attr('disabled',true);
				$.ajax({
 				 type: "POST",
  				url: "../../../../submit.php",
  				data: "siteId="+siteId+"&fromEmail="+fromEmail+"&submittedFormId="+submittedFormId+
				"&dataString="+escape(dataString)+"&timestamp="+timestamp+"&remoteIp="+remoteIp+
				"&httpReferer="+httpReferer+"&newVersion=1&odPath=../../wingubox.com/html",
  				success: function(response){				  
				  var msg = response.split('[--]');
				  if(msg[0] == 1) {	
	 				$('#response').html('Verifying...');
					if(document.URL.indexOf('#') === -1)
					var path = document.URL.split("?");
					else
					var path = document.URL.split("#");
	 				var url = path[0]+"?wbFormToken="+msg[1]+'#response';
				  	self.location.href = url;
				  } else {
				  	$(thisForm).attr('disabled',false);
				  	$('#response').html(msg[1]);
				  }
				  				
				}  
				});				
					
				}								   
		});
	// resize images
	$(".wb-fit-image").each(function(i) {
		var bgSpread = ($(this).hasClass('wb-bg-contain'))? 'contain':'cover';
		var style = $(this).attr('data-style');	
		var img = $(this).attr('src');
		if(typeof style !== 'undefined') {
		   $(this).wrap('<div style="'+style+'"></div>');			
		}	else {
		$(this).wrap('<div></div>');
		var height = $(this).height();
		$(this).closest('div').css('height',height);
		var width = $(this).width();			
		$(this).closest('div').css('width',width);
		}
		var imgClasses = $(this).attr('class');
		if(imgClasses.length)
		$(this).closest('div').addClass(imgClasses);
		$(this).closest('div').css('background','url('+img+') no-repeat');
		$(this).closest('div').css('background-size',bgSpread);
		$(this).closest('div').css('background-position','center');
		$(this).addClass('hidden');	
	});
		//EqualHeight Function	
	var highestBox = 0;
	$('.equal-block').each(function() {
		if ($(this).height() > highestBox) {
			highestBox = $(this).height();
		}
	});
	$('.equal-block').height(highestBox);	
	//=====	
var highestBox_1 = 0;
	$('.row .equal-box').each(function() {
		if ($(this).height() > highestBox_1) {
			highestBox_1 = $(this).height();
		}
	});
	$('.equal-box ').height(highestBox_1);
		
	});
