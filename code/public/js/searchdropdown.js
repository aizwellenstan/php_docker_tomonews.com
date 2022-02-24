/**
 *   ___________________________________________
 *  |   __  _ ___  _   _   __  __ __  __   __   |
 *  |  |  \| | __|| | | |/' _/|  V  |/  \ / _]  |
 *  |  | | ' | _| | 'V' |`._`.| \_/ | /\ | [/\  |
 *  |  |_|\__|___|!_/ \_!|___/|_| |_|_||_|\__/  |
 *  |___________________________________________|
 *
 * Our portfolio:  http://themeforest.net/user/tagDiv/portfolio
 * by tagDiv  2014
 * Thanks for your interest in our theme! :)
 *
 *
 */
/* global jQuery:false */


var tdDetect = {};

( function(){
    "use strict";
    tdDetect = {
        isIe8: false,
        isIe9 : false,
        isIe10 : false,
        isIe11 : false,
        isIe : false,
        isSafari : false,
        isChrome : false,
        isIpad : false,
        isTouchDevice : false,
        hasHistory : false,
        isPhoneScreen : false,
        isIos : false,
        isAndroid : false,
        isOsx : false,
        isFirefox : false,
        isWinOs : false,
        isMobileDevice:false,
        htmlJqueryObj:null, //here we keep the jQuery object for the HTML element

        /**
         * function to check the phone screen
         * @see tdEvents
         * The jQuery windows width is not reliable cross browser!
         */
        runIsPhoneScreen: function () {
            if ( (jQuery(window).width() < 768 || jQuery(window).height() < 768) && false === tdDetect.isIpad ) {
                tdDetect.isPhoneScreen = true;

            } else {
                tdDetect.isPhoneScreen = false;
            }
        },


        set: function (detector_name, value) {
            tdDetect[detector_name] = value;
            //alert('tdDetect: ' + detector_name + ': ' + value);
        }
    };


    tdDetect.htmlJqueryObj = jQuery('html');


    // is touch device ?
    if ( -1 !== navigator.appVersion.indexOf("Win") ) {
        tdDetect.set('isWinOs', true);
    }

    // it looks like it has to have ontouchstart in window and NOT be windows OS. Why? we don't know.
    if ( !!('ontouchstart' in window) && !tdDetect.isWinOs ) {
        tdDetect.set('isTouchDevice', true);
    }


    // detect ie8
    if ( tdDetect.htmlJqueryObj.is('.ie8') ) {
        tdDetect.set('isIe8', true);
        tdDetect.set('isIe', true);
    }

    // detect ie9
    if ( tdDetect.htmlJqueryObj.is('.ie9') ) {
        tdDetect.set('isIe9', true);
        tdDetect.set('isIe', true);
    }

    // detect ie10 - also adds the ie10 class //it also detects windows mobile IE as IE10
    if( navigator.userAgent.indexOf("MSIE 10.0") > -1 ){
        tdDetect.set('isIe10', true);
        tdDetect.set('isIe', true);
    }

    //ie 11 check - also adds the ie11 class - it may detect ie on windows mobile
    if ( !!navigator.userAgent.match(/Trident.*rv\:11\./) ){
        tdDetect.set('isIe11', true);
        //this.isIe = true; //do not flag ie11 as isIe
    }


    //do we have html5 history support?
    if (window.history && window.history.pushState) {
        tdDetect.set('hasHistory', true);
    }

    //check for safary
    if ( -1 !== navigator.userAgent.indexOf('Safari')  && -1 === navigator.userAgent.indexOf('Chrome') ) {
        tdDetect.set('isSafari', true);
    }

    //chrome and chrome-ium check
    if (/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())) {
        tdDetect.set('isChrome', true);
    }

    if ( null !== navigator.userAgent.match(/iPad/i)) {
        tdDetect.set('isIpad', true);
    }


    if (/(iPad|iPhone|iPod)/g.test( navigator.userAgent )) {
        tdDetect.set('isIos', true);
    }


    //detect if we run on a mobile device - ipad included - used by the modal / scroll to @see scrollIntoView
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        tdDetect.set('isMobileDevice', true);
    }

    tdDetect.runIsPhoneScreen();

    //test for android
    var user_agent = navigator.userAgent.toLowerCase();
    if ( user_agent.indexOf("android") > -1 ) {
        tdDetect.set('isAndroid', true);
    }


    if ( -1 !== navigator.userAgent.indexOf('Mac OS X') ) {
        tdDetect.set('isOsx', true);
    }

    if ( -1 !== navigator.userAgent.indexOf('Firefox') ) {
        tdDetect.set('isFirefox', true);
    }

})();

var td_ajax_search = {

    // private vars
    _current_selection_index:0,
    _last_request_results_count:0,
    _first_down_up:true,
    _is_search_open:false,


    /**
     * init the class
     */
    init: function init() {
console.log(td_ajax_search._is_search_open);

        // hide the drop down if we click outside of it
        jQuery(document).click(function(e) {
			
            if(
                e.target.className !== "td-icon-search"
                && e.target.id !== "search_text"
                && e.target.id !== "td-header-search-top"
                && td_ajax_search._is_search_open === true
            ) {
                td_ajax_search.hide_search_box();
            }
        });


        // show and hide the drop down on the search icon
        jQuery('#td-header-search-button').click(function(event){
            event.preventDefault();
            if (td_ajax_search._is_search_open === true) {
                td_ajax_search.hide_search_box();

            } else {
                td_ajax_search.show_search_box();
            }
        });


        // keydown on the text box
        jQuery('#search_text').keydown(function(event) {
            if (
                (event.which && event.which == 39)
                || (event.keyCode && event.keyCode == 39)
                || (event.which && event.which == 37)
                || (event.keyCode && event.keyCode == 37))
            {
                //do nothing on left and right arrows
                td_ajax_search.td_aj_search_input_focus();
                return;
            }




            if ((event.which && event.which == 13) || (event.keyCode && event.keyCode == 13)) {
                // on enter
                /*var td_aj_cur_element = jQuery('.td-aj-cur-element');
                if (.length > 0) {
                    //alert('ra');
                    var td_go_to_url = td_aj_cur_element.find('.entry-title a').attr('href');
                    window.location = td_go_to_url;
                } else {*/
                    //jQuery($('#search_box_form1')).submit();
                //}
					var e=jQuery("#search_text").val();""!=e&&(e=encodeURIComponent(e),location.href=thisSite+"search.php?kw="+encodeURI(e));
				
                return false; //redirect for search on enter
            } else {

                if ((event.which && event.which == 40) || (event.keyCode && event.keyCode == 40)) {
                    // down
                    td_ajax_search.td_aj_search_move_prompt_down();
                    return false; //disable the envent

                } else if((event.which && event.which == 38) || (event.keyCode && event.keyCode == 38)) {
                    //up
                    td_ajax_search.td_aj_search_move_prompt_up();
                    return false; //disable the envent
                } else {

                    //for backspace we have to check if the search query is empty and if so, clear the list
                    if ((event.which && event.which == 8) || (event.keyCode && event.keyCode == 8)) {
                        //if we have just one character left, that means it will be deleted now and we also have to clear the search results list
                        var search_query = jQuery(this).val();
                        if (search_query.length == 1) {
                            jQuery('#td-aj-search').empty();
                        }

                    }

                    //various keys
                    td_ajax_search.td_aj_search_input_focus();
                    //jQuery('#td-aj-search').empty();
                    setTimeout(function(){
                        td_ajax_search.do_ajax_call();
                    }, 100);
                }
                return true;
            }

        });

    },


    show_search_box: function open_search_box() {
        jQuery(".td-drop-down-search").addClass('td-drop-down-search-open');
        // do not try to autofocus on ios. It's still buggy as of 18 march 2015
        if (tdDetect.isIos !== true) {
            setTimeout(function(){
                document.getElementById("search_text").focus();
            }, 200);
        }
        td_ajax_search._is_search_open = true;
    },


    hide_search_box: function hide_search_box() {
        jQuery(".td-drop-down-search").removeClass('td-drop-down-search-open');
        td_ajax_search._is_search_open = false;
    },



    /**
     * moves the select up
     */
    td_aj_search_move_prompt_up: function td_aj_search_move_prompt_up() {
        if (td_ajax_search._first_down_up === true) {
            td_ajax_search._first_down_up = false;
            if (td_ajax_search._current_selection_index === 0) {
                td_ajax_search._current_selection_index = td_ajax_search._last_request_results_count - 1;
            } else {
                td_ajax_search._current_selection_index--;
            }
        } else {
            if (td_ajax_search._current_selection_index === 0) {
                td_ajax_search._current_selection_index = td_ajax_search._last_request_results_count;
            } else {
                td_ajax_search._current_selection_index--;
            }
        }
        jQuery('.td_module_wrap').removeClass('td-aj-cur-element');
        if (td_ajax_search._current_selection_index  > td_ajax_search._last_request_results_count -1) {
            //the input is selected
            jQuery('.td-search-form').fadeTo(100, 1);
        } else {
            td_ajax_search.td_aj_search_input_remove_focus();
            jQuery('.td_module_wrap').eq(td_ajax_search._current_selection_index).addClass('td-aj-cur-element');
        }
    },



    /**
     * moves the select prompt down
     */
    td_aj_search_move_prompt_down: function td_aj_search_move_prompt_down() {
        if (td_ajax_search._first_down_up === true) {
            td_ajax_search._first_down_up = false;
        } else {
            if (td_ajax_search._current_selection_index === td_ajax_search._last_request_results_count) {
                td_ajax_search._current_selection_index = 0;
            } else {
                td_ajax_search._current_selection_index++;
            }
        }
        jQuery('.td_module_wrap').removeClass('td-aj-cur-element');
        if (td_ajax_search._current_selection_index > td_ajax_search._last_request_results_count - 1 ) {
            //the input is selected
            jQuery('.td-search-form').fadeTo(100, 1);
        } else {
            td_ajax_search.td_aj_search_input_remove_focus();
            jQuery('.td_module_wrap').eq(td_ajax_search._current_selection_index).addClass('td-aj-cur-element');
        }
    },



    /**
     * puts the focus on the input box
     */
    td_aj_search_input_focus: function td_aj_search_input_focus() {
        td_ajax_search._current_selection_index = 0;
        td_ajax_search._first_down_up = true;
        jQuery('.td-search-form').fadeTo(100, 1);
        jQuery('.td_module_wrap').removeClass('td-aj-cur-element');
    },



    /**
     * removes the focus from the input box
     */
    td_aj_search_input_remove_focus: function td_aj_search_input_remove_focus() {
        if (td_ajax_search._last_request_results_count !== 0) {
            jQuery('.td-search-form').css('opacity', 0.5);
        }
    },



   


};

$( document ).ready(function() {
	setTimeout(td_ajax_search.init(), 10000);
    
});