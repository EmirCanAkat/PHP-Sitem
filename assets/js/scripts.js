/*
|----------------------------------------------------------------------------
	Coming Soon Style 1 JS
	Author: Envalab
	Version: 1.0
|----------------------------------------------------------------------------
*/

(function ($) {
	"use strict";


	$(window).on('load', function(){

		// PRELOADER
		$(".preloader-wrap").fadeOut(1000);


	}); // end window load function

	/*
	|-----------------------------------------------------
	|	CONTROL Countdown box display
	|-----------------------------------------------------
	*/
	// Make 'false' to hide (top-bottom).
	var display_till_years		= false;
	var display_till_months 	= false;
	var display_till_days		= true;
	var display_till_hours		= true;
	var display_till_minutes	= true;
	var display_till_seconds	= true;

	// Hide Hour, Min, Sec boxes
	var hide_hr_min_sec			= 'no'; // make 'yes' to hide Hour, Min, Sec boxes

	/*
	|-----------------------------------------------------
	|	Countdown JS
	|-----------------------------------------------------
	*/
	var endDate = new Date($("#count-end-date").val()).getTime();
	var startDate = new Date($("#count-start-date").val()).getTime();
	function countDown(){

		var frontYears 		= $( '.years' );
		var frontMonths 	= $( '.months' );
		var frontDays 		= $( '.days' );
		var frontHours		= $( '.hours' );
		var frontminutes	= $( '.minutes' );
		var frontSeconds	= $( '.seconds' );
		var expiredText		= $( '.expired-text' );
		var countDownUl		= $( '.count-down-list' );

		var currentDate = new Date().getTime();
		var difference = endDate - currentDate;
		
		if(difference < 0){
			clearInterval(countd);
			$(expiredText).removeClass('hidden');
			$(countDownUl).addClass('hidden');
		}
		else {
			// if all boxes hide condition
			if (!display_till_years && !display_till_months && !display_till_days && !display_till_hours && !display_till_minutes && !display_till_seconds ) {
				$('#countdown-boxes').hide();
			} else {

				// seconds display condition
				if (display_till_seconds) {
					var seconds = Math.floor(difference / 1000);

					$('#years').hide();
					$('#months').hide();
					$('#days').hide();
					$('#hours').hide();
					$('#minutes').hide();
					$('#seconds').show();
				}

				// till minutes display condition
				if (display_till_minutes) {
					var minutes = Math.floor(difference / (1000 * 60));
					var seconds = Math.floor(difference % (1000 * 60) / 1000);

					$('#years').hide();
					$('#months').hide();
					$('#days').hide();
					$('#hours').hide();
					$('#minutes').show();
					$('#seconds').show();
				}

				// till hours display condition
				if (display_till_hours) {
					var hours = Math.floor(difference / (1000 * 60 * 60));
					var minutes = Math.floor(difference % (1000 * 60 * 60) / (1000 * 60));
					var seconds = Math.floor(difference % (1000 * 60) / 1000);

					$('#years').hide();
					$('#months').hide();
					$('#days').hide();
					$('#hours').show();
					$('#minutes').show();
					$('#seconds').show();
				}

				// till days display condition
				if (display_till_days) {
					var days = Math.floor(difference / (1000 * 60 * 60 * 24));
					var hours = Math.floor(difference % (1000 * 60 * 60 *24) / (1000 * 60 * 60));
					var minutes = Math.floor(difference % (1000 * 60 * 60) / (1000 * 60));
					var seconds = Math.floor(difference % (1000 * 60) / 1000);

					$('#years').hide();
					$('#months').hide();
					$('#days').show();
					$('#hours').show();
					$('#minutes').show();
					$('#seconds').show();
				}

				// till months display condition
				if (display_till_months) {
					var months = Math.floor(difference / (1000 * 60 * 60 * 24 * 30.436875));
					var days = Math.floor(difference % (1000 * 60 * 60 * 24 * 30.436875) / (1000 * 60 * 60 * 24));
					var hours = Math.floor(difference % (1000 * 60 * 60 *24) / (1000 * 60 * 60));
					var minutes = Math.floor(difference % (1000 * 60 * 60) / (1000 * 60));
					var seconds = Math.floor(difference % (1000 * 60) / 1000);

					$('#years').hide();
					$('#months').show();
					$('#days').show();
					$('#hours').show();
					$('#minutes').show();
					$('#seconds').show();
				}

				// till years display condition
				if (display_till_years) {
					var years = Math.floor(difference / (1000 * 60 * 60 * 24 * 30.436875 * 12));
					var months = Math.floor(difference % (1000 * 60 * 60 * 24 * 30.436875 * 12) / (1000 * 60 * 60 * 24 * 30.436875));
					var days = Math.floor(difference % (1000 * 60 * 60 * 24 * 30.436875) / (1000 * 60 * 60 * 24));
					var hours = Math.floor(difference % (1000 * 60 * 60 *24) / (1000 * 60 * 60));
					var minutes = Math.floor(difference % (1000 * 60 * 60) / (1000 * 60));
					var seconds = Math.floor(difference % (1000 * 60) / 1000);

					$('#years').show();
					$('#months').show();
					$('#days').show();
					$('#hours').show();
					$('#minutes').show();
					$('#seconds').show();
				}

				// Hr, Min, Sec hide condition
				if ('yes' == hide_hr_min_sec) {
					$('#hours').hide();
					$('#minutes').hide();
					$('#seconds').hide();
				}
			}

			// Double zero conditions
			if(years < 10){years = "0" + years;}
			if(months < 10){months = "0" + months;}
			if(days < 10){days = "0" + days;}
			if(hours < 10){hours = "0" + hours;}
			if(minutes < 10){minutes = "0" + minutes;}
			if(seconds < 10) {seconds = "0" + seconds;}

			// display numbers
			(years > 0) ? $(frontYears).text(years) : $('#years').hide();
			(months > 0) ? $(frontMonths).text(months) : $('#months').hide();
			(days > 0) ? $(frontDays).text(days) : $('#days').hide();
			$(frontHours).text(hours);
			$(frontminutes).text(minutes);
			$(frontSeconds).text(seconds);
		}
	}
	countDown();
	var countd = setInterval(function(){
		countDown();
	}, 1000);

	
	/**
	 * SOCIAL LINKS
	 */
	var social_el = $('.social-icons');

	if (social_el.length > 0) {
	    var link_target = social_el.data('target');

	    if (link_target == 1) {
	        social_el.find('a').attr('target', '_blank');
	    }
	}

	/*
	|-----------------------------------------------------
	|	Countdown for Style 2
	|-----------------------------------------------------
	*/
	if ($.fn.final_countdown) {
		var end = Math.floor( endDate / 1000);
	    var start = Math.floor( startDate / 1000);
	    var now = Math.floor((new Date).getTime() / 1000);

		$('.countdown').final_countdown({
			'start': start,
			'end': end,
			'now': now     
		});
	}

	/**
	 * SUBSCRIBE FORM
	 */
	$(document).on("submit", '.subs_form', function (e) {
		e.preventDefault();
		var subscribe_form = $('.subs_form');

	    if (subscribe_form.length > 0) {
	    	var subscribe_form_data = subscribe_form.serialize();
	        // ajax request for specific table columns
	        $(".btnSubscribe").text('Sending ...');
	        $.ajax({
	            url: "inc/PostSubscribers.php",
	            type:'POST',
	            dataType: 'json',
	            data: subscribe_form_data,
	            success: function( response ) {
	            	// console.log(response);
	                if (!response.success) {
	                    alert(response.msg);
	                    return false;
	                }

	                $('.subscribe-form').html(response.msg);
	            }
	        });
	    }
	});

    /* =================================
    ===  CONTACT FORM  - Menu       ====
    =================================== */
    $("#contact-form").on('submit', function(e) {
        e.preventDefault();
        var name = $("#name").val();
        var phone = $("#phone").val();
        var email = $("#email_address").val();
        var message = $("#message").val();
        var dataString = 'name=' + name + '&phone=' + phone + '&email=' + email + '&message=' + message;

        function isValidEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

        if (isValidEmail(email) && (message.length > 1) && (name.length > 1)) {
        	$("#submit").hide();
        	$("#loading").show();
            $.ajax({
                type: "POST",
                url: "inc/SendMail.php",
                data: dataString,
                dataType: 'json',
                success: function(res) {
                	if(res.success) {
	                    $('#contact-form .success').text(res.msg);
	                    $('#contact-form .success').fadeIn(1000);
	                    $('#contact-form .error').fadeOut(500);
	                    $("#contact-form")[0].reset();
	                } else {
	                	$('#contact-form .error').text(res.msg);
	                	$('#contact-form .error').fadeIn(1000);
	                	$('#contact-form .success').fadeOut(500);
	                }

		        	$("#submit").show();
		        	$("#loading").hide();
                }
            });
        } else {
            $('#contact-form .error').text("Email is not valid.");
            $('#contact-form .error').fadeIn(1000);
            $('#contact-form .success').fadeOut(500);
        }

        return false;
    });

}(jQuery));