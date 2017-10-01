
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");
    
    /*
        Login form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    /*
        Registration form validation
    */
    $('.registration-form input[type="text"], .registration-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.registration-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
	
	$('#country').on('change',function() {
	
		var countryID =$(this).val();
		
		if(countryID) {
				$.ajax
				({
					type:'POST',
					url:'ajax.php',
					data:'country_id='+countryID,
					success:function(data) {
						$('#state').html(data);
						$('#city').html('<option value="">Select State First</option>');
						}
				});
		}
		else {
			$('#state').html('<option value="">Select Country First</option>');
			$('#city').html('<option value="">Select State First</option>');

		}

	})

	
    
    
});

function formhash(form, password) {
    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");
    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
    // Make sure the plaintext password doesn't get sent.
    password.value = "";
    // Finally submit the form.
    form.submit();
}
function regformhash(form, uid, email, password, conf, age, gender,country,state) {
     // Check each field has a value
    if (uid.value == ''         ||
          email.value == ''     ||
          password.value == ''  ||
          conf.value == ''		||
          age.value == ''		||
          gender.value == ''		||
          country.value == ''		||
          state.value == ''		
		  ) {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    // Check the username
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
        alert("Username must contain only letters, numbers and underscores. Please try again");
        form.username.focus();
        return false;
    }
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
    // At least one number, one lowercase and one uppercase letter
    // At least six characters 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");
    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
    // Make sure the plaintext password doesn't get sent.
    password.value = "";
    conf.value = "";
    // Finally submit the form.
    form.submit();
    return true;
}
