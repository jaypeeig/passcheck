
$(document).ready(function(){

$('#bclear').click(function(){
	$('#passkey').val('');
});

$('#bsave').click(function(){
	event.preventDefault();
	/*event.preventDefault();
	var passwd = $('#passkey').val();

	if (passwd == "") {
		var mess = "<p class='text-center text-danger'>Please input a password</p>";
		$('#message').html(mess);
		console.log(passwd);
	}else{
		$('#message').html('');
		console.log(passwd);

			$.ajax({
                type: "POST",
                url:"http://localhost/passcheck/main/show_messages",
                data: {password: passwd},
                success:function(result){
                    console.log(result);
                    $('#message').html("<ul>" + result + "</ul>");
                }, 
                error: function(data){
                	var mess = "<p class='text-center text-danger'>Error in ajax request.</p>";
					$('#message').html(mess);
                    console.log(data);
                }
            });
	};*/

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
	}else{
			console.log(passwd);
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
	                data: {password: passwd},
	                success:function(result){
	                	$('#how').html('');
	                    $('#how').html('Password strength: ' + result);
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