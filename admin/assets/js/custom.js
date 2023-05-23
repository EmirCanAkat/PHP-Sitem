(function ($) {
	"use strict";

	// Auto-fill email-pass
	$(document).on('click', '#autofill', function() {
	  $('#email').val( $('#admin-email').text() );
	  $('#pass').val( $('#admin-pass').text() );

	  $("#loginForm").submit();

	});

	//Date range picker with time picker
	if ($.fn.daterangepicker) {
		$('#CountdownDatetimeRange').daterangepicker({
		  timePicker: true,
		  timePickerIncrement: 1,
		  locale: {
		    format: 'YYYY-MM-DD HH:mm:ss'
		  }
		});
	}

	// Enable CKEditor
	if ($.fn.CKEDITOR) {
		CKEDITOR.replace('about_content');
	}

	// Init Datatable
	if ($.fn.DataTable) {
		$("#example1").DataTable();
	}

	//color picker with addon
	if ($.fn.colorpicker) {
		$('.my-colorpicker2').colorpicker();
	}

	$('.my-colorpicker2').on('colorpickerChange', function(event) {
	  $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
	});

	// Default Background
	$(document).on('change', '#dt_default_background', function(){
	  var dt_default_background = $(this).find('option:selected').val();

	  if ( "bg-color" == dt_default_background) {
	    $(".bg_color_dependency").show();
	    $(".bg_img_dependency").hide();
	  } else {
	    $(".bg_color_dependency").hide();
	    $(".bg_img_dependency").show();
	  }
	});

	// HomeStyle Display screenshot preview
	$(document).on('change', '#dt_home_style', function(){
	  var dt_home_style = $(this).find('option:selected').val();
	  var dt_backgrownd_style = $("#dt_backgrownd_style").find('option:selected').val();
	  var dt_home_style_src_path = $(this).find('option:selected').attr('src-path');

	  if ( "style-1" == dt_home_style) {
	    var dt_backgrownd_style_src_path = $("#dt_backgrownd_style").find('option:selected').attr('src-path1');
	  } else {
	    var dt_backgrownd_style_src_path = $("#dt_backgrownd_style").find('option:selected').attr('src-path2');
	  }

	  $("#dt_home_style_display").attr("src", dt_home_style_src_path);
	  $("#dt_backgrownd_style_display").attr("src", dt_backgrownd_style_src_path);
	});

	// Backgrownd Display screenshot preview
	$(document).on('change', '#dt_backgrownd_style', function(){
	  var dt_backgrownd_style = $(this).find('option:selected').val();
	  var dt_home_style = $("#dt_home_style").find('option:selected').val();

	  if ( "style-1" == dt_home_style) {
	    var dt_backgrownd_style_src_path = $(this).find('option:selected').attr('src-path1');
	  } else {
	    var dt_backgrownd_style_src_path = $(this).find('option:selected').attr('src-path2');
	  }

	  if ("video-style" == dt_backgrownd_style) {
	    $(".yt_dependency_sections").show();
	  } else {
	    $(".yt_dependency_sections").hide();
	  }

	  $("#dt_backgrownd_style_display").attr("src", dt_backgrownd_style_src_path);
	});

	// Enable-disable dependency sections
	$(document).on('change', '#show_aboutpage, #show_contactpage, #show_countdown, #show_callus, #use_ga, #show_socials, #enable_smtp, #show_subscriber', function(){
	  if($($(this)).prop('checked') == true){
	    $(this).closest('form').find(".dependency_sections").show();
	  } else {
	    $(this).closest('form').find(".dependency_sections").hide();
	  }
	});

	// Enable-disable dependency sub sections
	$(document).on('change', '#show_about_button_1, #show_about_button_2', function(){
	  if($($(this)).prop('checked') == true){
	    $(this).closest('.dependency_sections').find(".dependency_sub_sections").show();
	  } else {
	    $(this).closest('.dependency_sections').find(".dependency_sub_sections").hide();
	  }
	});

	// Enable-disable dependency sub sections
	$(document).on('change', '#show_about_images', function(){
	  if($($(this)).prop('checked') == true){
	    $(".dependency_img_sections").show();
	  } else {
	    $(".dependency_img_sections").hide();
	  }
	});

	// Enable-disable dependency img sections
	$(document).on('change', '#show_logo_image, #show_logo_favicon', function(){
	  if($($(this)).prop('checked') == true){
	    $(this).closest('.dependency_sections').find(".dependency_img_sections").show();
	  } else {
	    $(this).closest('.dependency_sections').find(".dependency_img_sections").hide();
	  }
	});

	// Upload image preview
	$(document).on('change', '#about_img_1, #about_img_2, #about_img_3, #about_img_4, #dt_default_background_img, #logo_image, #logo_favicon', function(){
	  previewImage(this, $(this).closest('.uploaded-img-box').find("img"));
	});

	// Show password
	$(document).on('click', '#show-pass', function(){
		if($($(this)).prop('checked') == true){
	  		$("#admin_pass").attr("type", "text");
	  	} else {
	  		$("#admin_pass").attr("type", "password");
	  	}
	});

	// Reset to Default value
	$(document).on('click', '.btnResetToDefault', function(e){
	  e.preventDefault();
	  // Get section param value
	  var reset_section = $(this).closest('form').find('input[name="section"]').val();

	  $.ajax({
	      url: "reset-to-default.php",
	      type:'POST',
	      data: {
	        'reset_section': reset_section
	      },
	      dataType: 'json',                
	      success: function( response ) {
	        Toast.fire({
	          icon: response.status,
	          title: '&nbsp;&nbsp;&nbsp;&nbsp;'+response.msg
	        });
	        window.history.replaceState( null, null, window.location.href );
	        location.reload();
	      },
	      error: function (res) {
	          console.log(res);
	      }
	  });
	});

	// Constant Toast
	const Toast = Swal.mixin({
	  toast: true,
	  showConfirmButton: true,
	  timer: 3000
	});

	var res = $(".res").val();
	if ('success' == res) {
	    Toast.fire({
	      icon: 'success',
	      title: '&nbsp;&nbsp;&nbsp;&nbsp;Changes updated successfully!'
	    });
	}

	if ('error' == res) {
	    Toast.fire({
	      icon: 'error',
	      title: '&nbsp;&nbsp;&nbsp;&nbsp;Failed to update changes!'
	    });
	}

}(jQuery));


function previewImage(img, previewSrc) {
  if (img.files && img.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $(previewSrc).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(img.files[0]); // convert to base64 string
  }
}