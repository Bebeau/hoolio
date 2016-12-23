var ajaxurl = meta_image.ajaxurl;

var user = {
	onReady: function() {
		user.imageUploader();
		user.removeImage();
		user.removeVideo();
		user.selectTabPage();
		user.sectionBtn();
	},
	imageUploader: function() {
		var meta_image_frame;
     	// Runs when the image button is clicked.
	    jQuery('.upload-image').click(function(e){

	    	// Prevents the default action from occuring.
	        e.preventDefault();

	        // define variables --- this should be cleaned up
	        var button = jQuery(this);
	        var wrap = button.parent();
	    	var image = wrap.attr("data-img");
	    	var field = wrap.attr("data-input");
	    	var postID = wrap.attr('data-post');

	        // Sets up the media library frame
	        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
	            title: meta_image.title,
	            button: { text:  meta_image.button },
	            library: { type: 'image, video' },
	            multiple: true
	        });

	        // Opens the media library frame.
	        meta_image_frame.open();

	        // Runs when an image is selected.
	        meta_image_frame.on('select', function(){

	            // Grabs the attachment selection and creates a JSON representation of the model.
	            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

	            if(image === "bg_video") {
	            	// append user selected video
	            	button.parent().append('<video muted autoplay id="bgvid" loop><source src="'+media_attachment.url+'" type="video/webm"><source src="'+media_attachment.url+'" type="video/ogv"><source src="'+media_attachment.url+'" type="video/mp4"></video>');
	            	// change value of input to video url
	            	jQuery('#'+field).val(media_attachment.url);
	            	// append remove button
	            	button.parent().append('<span class="button button-remove remove-video">X</span>');
		            // remove add button
		            button.remove();
		            // ajax call to save featured video
		            user.saveFeaturedVideo(postID, media_attachment.url);
	            } else {
	            	// append user selected icon
	            	button.parent().append('<img src="'+media_attachment.url+'" alt="" />' );
	            	// change value of input to icon url
	            	jQuery('input', wrap).val(media_attachment.url);
	            	// remove add button
		            button.remove();
		            if(image !== "section") {
		            	// append remove button
		            	button.parent().append('<a href="#" class="button-remove remove-image">Remove icon</a>');
		            	// save image/icon via ajax
		            	user.saveImage( postID, field, media_attachment.url );
		            }
	            }

	        });

	    });
	},
	removeVideo: function() {
		jQuery('.remove-video').click(function(e){
			e.preventDefault();

			var val = jQuery(this).parent().attr("data-img");
			var post = jQuery(this).parent().attr("data-post");

			jQuery('.'+val).html("");
			jQuery('#custom_'+val).val("");

			jQuery('.bg_video').append('<a href="" class="upload-image upload-banner">Set featured video</a>');
			jQuery(this).remove();
			
			user.saveFeaturedVideo(post, "");
			user.imageUploader();

		});
	},
	removeImage: function() {
		jQuery('.remove-image').click(function(e){
			e.preventDefault();

			var field = jQuery(this).parent().attr("data-input");
	    	var postID = jQuery(this).parent().attr("data-post");
	    	var text = jQuery(this).attr("data-text");

			jQuery(this).parent().find("input").val("");
			jQuery(this).parent().find("img").remove();

			user.saveImage(postID, field,"");

			jQuery(this).parent().append('<a class="upload-image" data-input="'+field+'" data-post="'+postID+'">Upload/Set '+text+'</a>');
			jQuery(this).remove();

			user.imageUploader();

		});
	},
	saveImage: function(postID, field, image) {
        jQuery.ajax({
            url: ajaxurl,
            type: "GET",
            data: {
                imageField: field,
                fieldVal: image,
                postID: postID,
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
    },
    saveFeaturedVideo: function(postID, video) {
        jQuery.ajax({
            url: ajaxurl,
            type: "GET",
            data: {
                fieldVal: video,
                postID: postID,
                action: 'setVideo'
            },
            dataType: 'html',
            success : function() {
            	user.removeVideo();
            },
            error : function(jqXHR, textStatus, errorThrown) {
                window.alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        }); 
    },
    selectTabPage: function() {
    	jQuery('.copy select').change(function(){
    		var tab = jQuery(this).parent().parent().attr("data-tab");
    		console.log(tab);
    		jQuery('#section3_tab'+tab+'_page').val(this.value);
    	});
    },
    addSection: function(count) {
	    jQuery.ajax({
	        url: ajaxurl,
	        type: "GET",
	        data: {
	            action: 'addSection',
	            count: count
	        },
	        dataType: 'html',
	        success: function(data) {
	        	jQuery('#sectionWrap').append(data);
	        },
	        error : function(jqXHR, textStatus, errorThrown) {
	            window.alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	        },
	        complete: function() {
	        	user.imageUploader();
	        	user.sectionRemove();
	        }
	    });
	},
	addCheckoutPerk: function(count) {
	    jQuery.ajax({
	        url: ajaxurl,
	        type: "GET",
	        data: {
	            action: 'addCheckoutPerk',
	            count: count
	        },
	        dataType: 'html',
	        success: function(data) {
	        	jQuery('#sectionWrap').append(data);
	        },
	        error : function(jqXHR, textStatus, errorThrown) {
	            window.alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	        },
	        complete: function() {
	        	user.imageUploader();
	        	user.sectionRemove();
	        }
	    });
	},
	removeSection: function() {
		jQuery.ajax({
	        url: ajaxurl,
	        type: "GET",
	        data: {
	            action: 'removeSection'
	        },
	        dataType: 'html',
	        error : function(jqXHR, textStatus, errorThrown) {
	            window.alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	        }
	    });
	},
	sectionBtn: function() {
		jQuery(".btn-section").click(function(e){
			var count = jQuery("#sectionWrap section").length;
			e.preventDefault();
			user.addSection(count);
		});
		jQuery(".btn-checkout").click(function(e){
			var count = jQuery("#sectionWrap section").length;
			e.preventDefault();
			user.addCheckoutPerk(count);
		});
		jQuery('.remove_section').click(function(){
			jQuery(this).parent().parent().remove();
		});
	}
};

jQuery(document).ready(function() {
	user.onReady();
});