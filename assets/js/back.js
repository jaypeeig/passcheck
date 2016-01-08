
$(document).ready(function(){

$('#bclear').click(function(){
	$('#passkey').val('');
});

$('#bsave').click(function(){
	event.preventDefault();
	var passwd = $('#passkey').val();

	if (passwd == "") {
		var mess = "<p class='text-center text-danger'><span class='glyphicon glyphicon-remove'></span>  Please input a password</p>";
		$('#message').html(mess);
		console.log(passwd);
	}else{
		$('#message').html('');
			$.ajax({
                type: "POST",
                url:"http://localhost/passcheck/main/validate",
                data: {password: passwd, type: 'saving'},
                success:function(result){
                   
                   switch(result) {
					    case 'code-d':
					        alert('Duplicate Entry');
					        break;
					    case 'code-w':
					         alert('Password is weak');
					        break;
					    case 'code-a':
					    	alert('Password is acceptable');
					    	break;
					    case 'code-s':
					    	$('#report').modal('show');
					    	$.ajax({
				                type: "POST",
				                url:"http://localhost/passcheck/main/graph",
				                data: {password: passwd},
				                success:function(result){
				                	$('#mod-content').html('');
				                    $('#mod-content').html(result);
				                }, 
				                error: function(data){
				                	
				                }
				            });
					    	$('#passkey').val('');
					    	$('#how').html('');
							$('#progress').html('');
					    	break;
					    case 'code-g':
					    	$('#report').modal('show');
					    	$.ajax({
				                type: "POST",
				                url:"http://localhost/passcheck/main/graph",
				                data: {password: passwd},
				                success:function(result){
				                	$('#mod-content').html('');
				                    $('#mod-content').html(result);
				                }, 
				                error: function(data){
				                	
				                }
				            });
					    	$('#passkey').val('');
					    	$('#how').html('');
							$('#progress').html('');
					    	break;
					    default:
					        
					}
					                
                }, 
                error: function(data){
                	var mess = "<p class='text-center text-danger'>Error in ajax request.</p>";
					$('#message').html(mess);
                }
            });
	};

});

$("#passkey").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});


$('#passkey').keyup(function(){
	var passwd = $('#passkey').val();

	if (passwd == "") {
		$('#message').html('');
		$('#how').html('');
		$('#progress').html('');
	}else{
			
			var delayTimer;
			clearTimeout(delayTimer);
		    delayTimer = setTimeout(function() {
		        $.ajax({
                type: "POST",
                url:"http://localhost/passcheck/main/show_messages",
                data: {password: passwd},
                success:function(result){
                	$('#message').html('');
                    $('#message').html("<ul style='list-style: none;'>" + result + "</ul>");
                }, 
                error: function(data){
                	
                }
            });
		        $.ajax({
		        	type: "POST",
	                url:"http://localhost/passcheck/main/validate",
	                data: {password: passwd, type: 'validation'},
	                success:function(result){
	                	$('#how').html('');
	                    $('#how').html('Password strength: ' + result);

	                     switch(result) {
						    case 'good':
						     	$('#progress').html("<div class='progress'><div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: 80%'><span class='sr-only'>20% Complete (warning)</span></div></div>");
						        break;
						    case 'weak':
						    	$('#progress').html("<div class='progress'><div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: 25%'><span class='sr-only'>20% Complete (danger)</span></div></div>");
						    	break;
						    case 'acceptable':
						    	$('#progress').html("<div class='progress'><div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: 48%'><span class='sr-only'>20% Complete (warning)</span></div></div>");
						    	break;
						    case 'strong':
								$('#progress').html("<div class='progress'><div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: 100%'><span class='sr-only'>20% Complete (warning)</span></div></div>");
						    	break;
						    default:
						        $('#progress').html('');
						}
	                }, 
	                error: function(data){
	                	
	                }
		        });

		         $.ajax({
		        	type: "POST",
	                url:"http://localhost/passcheck/main/dupquery",
	                data: {password: passwd},
	                success:function(result){
	                	$('#hows').html('');
	                    $('#hows').html(result);
	                }, 
	                error: function(data){
	                	
	                }
		        });



		    }, 300);
	};
});




});