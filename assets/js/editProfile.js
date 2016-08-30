var ajaxurl = meta_image.ajaxurl;

var user = {
	onReady: function() {
		user.imageUploader();
		user.removeUserImage();
		user.removeVideo();
	},
	imageUploader: function() {
		var meta_image_frame;
     	// Runs when the image button is clicked.
	    jQuery('.upload-image').click(function(e){

	    	// Prevents the default action from occuring.
	        e.preventDefault();
	        var button = jQuery(this);
	        var elem = jQuery(this).parent();
	    	var image = elem.attr("data-img");
	    	var val = elem.attr("data-input");
	    	var userID = elem.attr("data-user");
	    	var input = jQuery('#'+val);
	    	var img = jQuery('.'+image);

	        // Sets up the media library frame
	        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
	            title: meta_image.title,
	            button: { text:  meta_image.button },
	            library: { type: 'image, video' },
	            multiple: true
	        });

	        // Runs when an image is selected.
	        meta_image_frame.on('select', function(){

	            // Grabs the attachment selection and creates a JSON representation of the model.
	            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
	            // Sends the attachment URL to our custom image input field.
	            img.find("img").remove();
	            if(image === "bg_video") {
	            	img.append('<video muted autoplay id="bgvid" loop><source src="'+media_attachment.url+'" type="video/webm"><source src="'+media_attachment.url+'" type="video/ogv"><source src="'+media_attachment.url+'" type="video/mp4"></video>');
	            	input.val(media_attachment.url);
	            	elem.append('<button class="remove-video button button-large">Remove</button>');
		            button.remove();
	            } else {
	            	img.append('<img src="'+media_attachment.url+'" alt="" />' );
	            	input.val(media_attachment.url);
		            elem.append('<button class="remove-image button button-large">Remove</button>');
		            button.remove();
		            user.saveUserImage( val, userID, media_attachment.url );
	            }
	        });

	        // Opens the media library frame.
	        meta_image_frame.open();
	    });
	},
	removeVideo: function() {
		jQuery('.remove-video').click(function(e){
			e.preventDefault();

			var val = jQuery(this).parent().attr("data-img");

			jQuery('.'+val).html("");
			jQuery('#custom_'+val).val("");

			jQuery(this).parent().append('<button class="add button button-large upload-image" style="text-align:center;">Upload/Set Video</button>');
			jQuery(this).remove();

			user.imageUploader();

		});
	},
	removeUserImage: function() {
		jQuery('.remove-image').click(function(e){
			e.preventDefault();

			var val = jQuery(this).parent().attr("data-input");
	    	var userID = jQuery(this).parent().attr("data-user");

			jQuery(this).parent().find("input").val("");
			jQuery(this).parent().find("img").remove();

			user.saveUserImage(val,userID,"");

			jQuery(this).parent().append('<button class="add button button-large upload-image" id="upload-logo" style="text-align:center;" data-input="agent_image" data-img="profile" data-user="<?php echo $user_id; ?>">Upload/Set Profile Image</button>');
			jQuery(this).remove();

			user.imageUploader();

		});
	},
	saveUserImage: function(field, userID, image) {
        jQuery.ajax({
            url: ajaxurl,
            type: "GET",
            data: {
                imageField: field,
                fieldVal: image,
                userID: userID,
                action: 'setImage'
            },
            dataType: 'html',
            success : function() {
            	user.removeImage();
            },
            error : function(jqXHR, textStatus, errorThrown) {
                window.alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        }); 
    }
};

jQuery(document).ready(function() {
	user.onReady();
});