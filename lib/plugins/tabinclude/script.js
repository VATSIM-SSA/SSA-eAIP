/**
 * Refresh tab page
 * @param page
 */
function dwpl_ti_refresh(_this, page){
    if(page){
        var content = jQuery(_this).closest('#dwpl-ti-container').find('#dwpl-ti-content');
        var loading = jQuery(_this).closest('#dwpl-ti-container').find('#dwpl-ti-loading');
        // show loading
        content.css({visibility:'hidden'});
        loading.css({display:'block'});
        // POST AJAX
        jQuery.post(DOKU_BASE + 'lib/plugins/tabinclude/ajax.php', { call: 'content', page: page })
            .done(function(data) {
                // Refresh tab page
                content.html(data);
                loading.css({display:'none'});
                content.css({visibility:'visible'});
            });
    }
}
/**
 * Initial process
 */
function dwpl_ti_init(){
    // Click event for AJAX tabs
    jQuery('ul.dwpl-ti li div.dwpl-ti-tab-title').click(function(){
        jQuery('.dwpl-ti-tab-title').removeClass('selected');
        jQuery(this).addClass('selected');
        dwpl_ti_refresh(jQuery(this), jQuery(this).attr('value'));
    });
    // Show initial page if necessary
    var init_ajax=jQuery('#dwpl-ti-read-init-page');
    if(init_ajax){
        dwpl_ti_refresh(init_ajax,init_ajax.attr('value'));
    }

    // Click event for Embedded tabs
    jQuery(".dwpl-ti-tab-embd-title").click(function() {
        var num = jQuery(".dwpl-ti-tab-embd-title").index(this);
        jQuery(".dwpl-ti-tab-embd-title").removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery(".dwpl-ti-tab-embd").addClass('hidden');
        jQuery(".dwpl-ti-tab-embd").eq(num).removeClass('hidden');
    });
}
jQuery(function(){dwpl_ti_init();});

