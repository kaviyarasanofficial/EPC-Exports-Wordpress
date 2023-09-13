(function($) {
    
    $('.slug-gen').on( 'click', function() {
        const result = Math.random().toString(36).substring(2,7);
        $('.shortener-url-slug').val( result );
    } )
    //
    $('.shorturl-copy').on( 'click', function() {
        let $t = $(this),
            $s = $t.closest('.slug-area').find('[data-siteurl]'),
            $u =  $s.length ? $s.data('siteurl')+$s.val() : $t.closest('[data-shorturl]').data('shorturl');
            navigator.clipboard.writeText($u);
            $t.after( '<span class="copy-msg" style="color:green">Copied to clipboard</span>' );
            setTimeout( function() {
                $('.copy-msg').remove();
            }, 900 )

    } )

    // Url Shortener
    let $custom = $('.is-custom-shortable'),
    $post = $('.is-post-shortable'),
    $page = $('.is-page-shortable'),
    $type = $( '.shortable-url-type' ),
    $sv = $type.val();

    $type.on( 'change', function() {
            let $v = $(this).val();

            // 
            if( $v == 'custom' ) {
                $custom.show();
            } else {
                $custom.hide();
            }
            // 
            if( $v == 'post' ) {
                $post.show();
            } else {
                $post.hide();
            }
            // 
            if( $v == 'page' ) {
                $page.show();
            } else {
                $page.hide();
            }

    } )

    // 
    if( $sv == 'custom' ) {
        $custom.show();
    } else {
        $custom.hide();
    }
    //
    if( $sv == 'post' ) {
        $post.show();
    } else {
        $post.hide();
    }
    //
    if( $sv == 'page' ) {
        $page.show();
    } else {
        $page.hide();
    }

    /******************************************
        plugin license activation ajax
    ******************************************/

    $( '.active-plugin' ).on( 'click', function( e ) {
        e.preventDefault();


        let $parentDiv = $(this).closest('.active-theme'),
          $key = $parentDiv.find('[name="el_license_key"]').val(),
          $email = $parentDiv.find('[name="el_license_email"]').val(),
          $activeThemeWrap = $('.active-theme-wrap');

        $.ajax({
          type: 'POST',
          url: eapAdminObject.ajaxurl,
          data: {
            action: 'eap_license_activation_action',
            purchase_key: $key,
            user_email: $email,
            security: eapAdminObject.nonce
          },
          beforeSend: function() {
            $activeThemeWrap.prepend( '<p class="response-msg">Loading.....</p>' );
          },
          success: function( res ) {

            let r = JSON.parse( res );
            $('.response-msg').remove();
            if( r.status == true ) {
              $activeThemeWrap.prepend( '<p class="response-msg">'+r.msg+'</p>' );
              setTimeout( function() { 
                location.reload();
              }, 2000);
              
            } else {
              $activeThemeWrap.prepend( '<p class="response-msg">'+r.msg+'</p>' );
            }

          }

        })

    } )

    // License deactivation
    $('.deactivate-plugin').on( 'click', function() {

      $.confirm({
            title: 'Do you want to deactivate license?',
            content: '',
            buttons: {
              confirm: function () {
                let $activeThemeWrap = $('.active-theme-wrap');
                $.ajax({

                  type: 'POST',
                  url: eapAdminObject.ajaxurl,
                  data: {
                    action: 'eap_license_deactivate_action',
                    security: eapAdminObject.nonce
                  },
                  success: function( res ) {

                    let r = JSON.parse( res );

                    if( r.status == true ) {
                      $activeThemeWrap.prepend( '<p class="response-msg">'+r.msg+'</p>' );
                      setTimeout( function() { 
                        location.reload();
                      }, 1500);
                      
                    } else {
                      $activeThemeWrap.prepend( '<p class="response-msg">'+r.msg+'</p>' );
                      $('.response-msg').remove();
                    }

                  }

                })

              },
              cancel: function () {

              }
            },
            boxWidth: '500px',
            useBootstrap: false,
      });


    } )


})(jQuery)