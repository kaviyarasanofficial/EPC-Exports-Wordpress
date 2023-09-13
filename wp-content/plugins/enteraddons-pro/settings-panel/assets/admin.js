(function($) {
	"use strict";

	let admin = {

		init: function() {
			let $this = this;
			$('.admin_img_table').DataTable({"ordering": false});

			// admin settings tab
			$this.adminSettingsTab();
            $this.webpSelectAll();
            $this.webpConverter();
            $this.imageCompress();
            $this.useWebp();
            $this.backWebpToImg();
            
		},
		adminSettingsTab: function () {

            // Tab
            let tabSelect = $('[data-tab-select]');
            let tab = $('[data-tab]');
            tabSelect.each(function () {
                let tabText = $(this).data('tab-select');
                $(this).on('click', function () {
                    let $v = $(this).data('tab-select');
                    localStorage.setItem("eapModtabActivation", $v);
                    $(this).addClass('active').siblings().removeClass('active');
                    tab.each(function () {
                        if ($v === $(this).data('tab')) {
                            $(this).fadeIn(500).siblings().hide(); // for click
                            // $(this).fadeIn(500).siblings().stop().hide(); // active if hover
                            $(this).addClass('active').siblings().removeClass('active');
                        }
                    });
                });
                if ($(this).hasClass('active')) {
                    
                    tab.each(function () {
                        if (tabText === $(this).data('tab') ) {
                            $(this).addClass('active');
                        }
                        if ($(this).hasClass('active')) {
                            $(this).show().siblings().hide();

                        }
                    });
                }
            });
            
            // Check active tab
            let activateTab = localStorage.getItem("eapModtabActivation");

            if( activateTab ) {
                $('[data-tab-select="'+activateTab+'"]').addClass('active').siblings().removeClass('active');
                $('[data-tab="'+activateTab+'"]').show().siblings().hide();
            }
        },
        webpSelectAll: function() {
                            
            $('.eap-webp-all').click(function() {
                let getCheckbox = $(this).closest('.admin_img_table').find('tr:has(td) input[type="checkbox"]'),
                isChecked = $(this).prop("checked");
                getCheckbox.prop('checked', isChecked);
            });

            $('.admin_img_table tr:has(td)').find('input[type="checkbox"]').click(function() {
                let isChecked = $(this).prop("checked"),
                    isHeaderChecked = $(".eap-webp-all").prop("checked");

                if ( isChecked == false && isHeaderChecked ){
                    $(".eap-webp-all").prop('checked', isChecked);
                } else {
                    $('.admin_img_table tr:has(td)').find('input[type="checkbox"]').each(function() {
                        if ($(this).prop("checked") == false){
                            isChecked = false;
                        }
                    });

                    $(".eap-webp-all").prop('checked', isChecked);
                }
            });

        },
        webpConverter: function() {

            $( '.convert-webp' ).on( 'click', function() {
                
                let selectedMedia = $('input[name="media_item"]:checked'),
                    getImg = [];

                selectedMedia.each( function() {
                    let $this = $(this),
                        t = JSON.parse( $this.val() );
                    getImg.push( t );
                })

                $.ajax({
                    method: 'post',
                    url: adminEap.ajaxurl,
                    data: {
                        action: 'webp_converter',
                        img_url: getImg
                    },
                    beforeSend: function() {
                        $('.loading-wrapper').fadeIn();
                    },
                    success: function ( res ) {
                        console.log( res );
                    },
                    complete: function() {
                        $('.loading-wrapper').fadeOut('slow',function() {
                            $('.work-complete').fadeIn();
                        });
                    }
                })


            } )
        },
        imageCompress: function() {

            $( '.compress-image' ).on( 'click', function() {
                $('.work-complete').hide();
                let selectedMedia = $('input[name="compress_media_item"]:checked'),
                    getImg = [],
                    $lw = $('.loading-wrapper'),
                    $wc = $('.work-complete');

                selectedMedia.each( function() {
                    let $this = $(this);
                    getImg.push( $this.val() );
                })

                if( getImg.length != 0 ) {

                    $.ajax({
                        method: 'post',
                        url: adminEap.ajaxurl,
                        data: {
                            action: 'image_compressor',
                            img_url: getImg
                        },
                        beforeSend: function() {
                            $('.loading-wrapper').fadeIn();
                        },
                        success: function ( res ) {

                            let r = JSON.parse(res),
                                imagelist = '';
                            if( r.eimg.length != 0 ) {
                                imagelist += '<p>Compress Failed Images</p>';
                                $.each( r.eimg, function( k, item ) {
                                    imagelist += '<a style="margin-right:5px" href="'+item+'" target="_blank"><img width="40" src="'+item+'" /></a>';
                                } )
                            }

                            $lw.fadeOut('slow',function() {
                                $wc.html( '<p>Done</p><p>Total: '+r.total+' Completed: '+r.complete+'</p>'+imagelist ).fadeIn();
                            });
                            
                        },
                        error: function(e) {
                            console.log(e);
                        }

                    })

                } else {
                    $lw.fadeOut('slow',function() {
                        $wc.html( '<p>Please Select Image</p>' ).fadeIn();
                    });
                }

            } )
        },
        useWebp: function() {
            
            $(document).on( 'click', '.use-webp', function( e ) {
                e.preventDefault();
                let $t = $( this );

                $.ajax({
                    method: 'post',
                    url: adminEap.ajaxurl,
                    data: {
                        action: 'eap_use_webp',
                        attachment_id: $t.data('id'),
                        webp_url: $t.data('webp')
                    },
                    beforeSend: function() {
                        $t.html('<p>Loading .....</p>');
                    },
                    success: function ( res ) {
                        if( res == 'success' ) {
                            $t.text('Done');
                            location.reload(true);
                        } else {
                            $t.text('Warning: Try again');
                        }
                    }
                })


            } )
        },
        backWebpToImg: function() {
            
            $(document).on( 'click', '.back-webp-toimg', function( e ) {
                e.preventDefault();
                let $t = $( this );
                $.ajax({
                    method: 'post',
                    url: adminEap.ajaxurl,
                    data: {
                        action: 'eap_reset_webp',
                        attachment_id: $t.data('id'),
                        prev_ext: $t.data('prevext')
                    },
                    beforeSend: function() {
                        $t.html('<p>Loading .....</p>');
                    },
                    success: function ( res ) {

                        if( res == 'success' ) {
                            $t.text('Reset Success');
                            location.reload(true);
                        } else {
                            $t.text('Warning: Try again');
                        }
                    }
                })

            } )
        }

	}

	admin.init();

})(jQuery);