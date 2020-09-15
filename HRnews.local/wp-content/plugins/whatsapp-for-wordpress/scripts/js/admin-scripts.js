jQuery(document).ready(function ($) {
    //Validate form with JQuery----------
    jQuery.validator.addMethod("domain", function(value, element) {
        return this.optional(element) 
        || /^https:\/\/chat.whatsapp.com/.test(value)
        || /^(\+)?\d+$/.test(value)
      }, "Please enter a valid phone number or group link");
    jQuery.validator.setDefaults({
        //debug: true,
        errorClass: "wa-validate-error",
        success: "valid",
      });
      $( ".post-type-whatsapp-accounts #post" ).validate({
        rules: {
        nta_group_number: {
            required: true,
            domain: true,
          }
        }
    });
    //Validate-----------------
    
    var svgImage = `<svg width="48px" height="48px" class="nta-whatsapp-default-avatar" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
    <path style="fill:#EDEDED;" d="M0,512l35.31-128C12.359,344.276,0,300.138,0,254.234C0,114.759,114.759,0,255.117,0
    S512,114.759,512,254.234S395.476,512,255.117,512c-44.138,0-86.51-14.124-124.469-35.31L0,512z"/>
    <path style="fill:#55CD6C;" d="M137.71,430.786l7.945,4.414c32.662,20.303,70.621,32.662,110.345,32.662
    c115.641,0,211.862-96.221,211.862-213.628S371.641,44.138,255.117,44.138S44.138,137.71,44.138,254.234
    c0,40.607,11.476,80.331,32.662,113.876l5.297,7.945l-20.303,74.152L137.71,430.786z"/>
    <path style="fill:#FEFEFE;" d="M187.145,135.945l-16.772-0.883c-5.297,0-10.593,1.766-14.124,5.297
    c-7.945,7.062-21.186,20.303-24.717,37.959c-6.179,26.483,3.531,58.262,26.483,90.041s67.09,82.979,144.772,105.048
    c24.717,7.062,44.138,2.648,60.028-7.062c12.359-7.945,20.303-20.303,22.952-33.545l2.648-12.359
    c0.883-3.531-0.883-7.945-4.414-9.71l-55.614-25.6c-3.531-1.766-7.945-0.883-10.593,2.648l-22.069,28.248
    c-1.766,1.766-4.414,2.648-7.062,1.766c-15.007-5.297-65.324-26.483-92.69-79.448c-0.883-2.648-0.883-5.297,0.883-7.062
    l21.186-23.834c1.766-2.648,2.648-6.179,1.766-8.828l-25.6-57.379C193.324,138.593,190.676,135.945,187.145,135.945"/></svg>`;

    $('.widget-text-color').wpColorPicker();
    $('.widget-background-color').wpColorPicker();
    $('.widget-hover-backcolor').wpColorPicker();
    $('.widget-hover-textcolor').wpColorPicker();

    btn_always_available();
    select_display_pages_option();
    checkAll_SelectPages_List();
    checkItemsAccountsList();
    selectAll_table_input_shortcode();
    copy_clipboard_shortcode_input();
    change_button_position();
    change_widget_position();
    btn_apply_time_all();
    btn_show_gdpr();

    //Checking selector
    var selector = $('.njt-wa-woobutton').length;
    if (selector > 0){
        register_autocomplete('woo');
        removeAccount('woo');
    } else {
        register_autocomplete('all');
        removeAccount('all');
    }
    //DATA
    var DeactiveData;
    var fullData;

    //Loading Data input
    var isLoading = true;
    
    $("#sortable").sortable({
        connectWith: '#sortable',
        update: function (event, ui) {

            $(this).children().each(function (index) {
                if ($(this).attr('data-position') != (index + 1)) {
                    $(this).attr('data-position', (index + 1)).addClass('updated-position');
                }
            });

            if (selector > 0){
                saveNewPositions('woo');
            } else {
                saveNewPositions('all');
            }
        }
    });

    function saveNewPositions(load_type) {
        var pos = [];
        $('.updated-position').each(function () {
            pos.push([$(this).attr('data-index'), $(this).attr('data-position')]);
            $(this).removeClass('updated-position');
        });

        $.ajax({
            url: nta.url,
            type: 'POST',
            dataType: 'json',
            data: {
                'action': 'save_account_position',
                'update': load_type,
                'positions': pos
            }
        }).done(function ($result) {

        });
    }
    $("#sortable").disableSelection();

    function add_item(event, ui, load_type) {
        var html = "";
        html = '<div class="nta-list-items"';
        html += 'data-index="' + ui.item.account_id + '" data-position="0">';
        html += '<div class="box-content ' + (load_type == 'woo' ? 'box-content-woo' : '') + '">';
        html += `<div class="box-row"><div class="account-avatar">`;
        if (ui.item.avatar != '') {
            html += '<div class="wa_img_wrap" style="background: url(' + ui.item.avatar + ') center center no-repeat; background-size: cover;"></div>';
        } else {
            html += svgImage;
        }
        html += `</div><div class="container-block">`;
        html += '<a href=""><h4>' + ui.item.label + '</h4></a>';
        html += '<p>' + ui.item.nta_title + '</p><p>';
        html += '<span class="' + (ui.item.nta_monday === 'checked' ? 'active-date' : '') + '">' + 'Mon</span>';
        html += '<span class="' + (ui.item.nta_tuesday === 'checked' ? 'active-date' : '') + '">' + 'Tue</span>';
        html += '<span class="' + (ui.item.nta_wednesday === 'checked' ? 'active-date' : '') + '">' + 'Wed</span>';
        html += '<span class="' + (ui.item.nta_thursday === 'checked' ? 'active-date' : '') + '">' + 'Thur</span>';
        html += '<span class="' + (ui.item.nta_friday === 'checked' ? 'active-date' : '') + '">' + 'Fri</span>';
        html += '<span class="' + (ui.item.nta_saturday === 'checked' ? 'active-date' : '') + '">' + 'Sar</span>';
        html += '<span class="' + (ui.item.nta_sunday === 'checked' ? 'active-date' : '') + '">' + 'Sun</span>';
        html += '</p><a data-remove="' + ui.item.account_id + '" href="javascrtip:;" class="btn-remove-account">Remove</a></div>';
        html += '<div class="icon-block">';
        html += '<img src="' + ui.item.image_url + 'images/bar-sortable.svg' + '" width="20px"></div></div></div></div>';
        $('.nta-list-box-accounts').prepend(html);
        let obj = DeactiveData.findIndex(o => o.account_id === ui.item.account_id);
        DeactiveData.splice(obj, 1);
        //AJAX Save
        $.ajax({
            url: nta.url,
            type: 'POST',
            dataType: 'json',
            data: {
                'action': 'add_account',
                'add': load_type,
                'account_id': ui.item.account_id,
                'account_name': ui.item.label
            }
        }).done(function ($result) {
            removeAccount(load_type);
        });

        $('.nta-list-status strong').text("Selected Accounts:");
        $('.nta-list-box-accounts').show();

    }

    function register_autocomplete($load_type = 'all') {
        if ($("#input-users").length > 0) {
            if (isLoading) {
                $(this).addClass('ui-autocomplete-loading');
            }
            $.ajax({
                url: nta.url,
                type: 'POST',
                dataType: 'json',
                data: {
                    'action': 'load_accounts_ajax',
                    'load': 1,
                }
            }).done(function ($result) {
                isLoading = false;
                if ($result.data == null && $('.nta-list-box-accounts .nta-list-items').length < 1) {
                    $('.nta-list-status strong').text("Please add a WhatsApp account here");
                    $('.nta-list-box-accounts').hide();
                } else {
                    if ($result.data == null) {
                        $result.data = []
                    }
                    fullData = $result.data;
                    DeactiveData = $result.data.filter(function (item) {
                        return item.nta_active == "none";
                    })
                    if($load_type == 'woo'){
                        fullData = $result.data;
                        DeactiveData = $result.data.filter(function (item) {
                            return item.wo_active == "none";
                        })
                    } else {
                        fullData = $result.data;
                        DeactiveData = $result.data.filter(function (item) {
                            return item.nta_active == "none";
                        })
                    }

                    $("#input-users").autocomplete({
                        minLength: 0,
                        source: DeactiveData,
                        classes: {
                            "ui-autocomplete": "nta-list-box-select"
                        },
                        select: function (event, ui) {
                            add_item(event, ui, $load_type);

                            return false;
                        }
                    }).autocomplete("instance")._renderItem = function (ul, item) {
                        var html = "";
                        html = `<div class="nta-list-items" data-position="0">
                                <div class="box-content">
                                <div class="box-row">
                                <div class="account-avatar">`;
                        if (item.avatar != '') {
                            html += '<div class="wa_img_wrap" style="background: url(' + item.avatar + ') center center no-repeat; background-size: cover;"></div>';
                        } else {
                            html += svgImage;
                        }
                        html += `</div><div class="container-block">`;
                        html += '<h4>' + item.label + '</h4>';
                        html += '<p>' + item.nta_title + '</p><p>';
                        html += '<span class="' + (item.nta_monday === 'checked' ? 'active-date' : '') + '">' + 'Mon</span>';
                        html += '<span class="' + (item.nta_tuesday === 'checked' ? 'active-date' : '') + '">' + 'Tue</span>';
                        html += '<span class="' + (item.nta_wednesday === 'checked' ? 'active-date' : '') + '">' + 'Wed</span>';
                        html += '<span class="' + (item.nta_thursday === 'checked' ? 'active-date' : '') + '">' + 'Thur</span>';
                        html += '<span class="' + (item.nta_friday === 'checked' ? 'active-date' : '') + '">' + 'Fri</span>';
                        html += '<span class="' + (item.nta_saturday === 'checked' ? 'active-date' : '') + '">' + 'Sar</span>';
                        html += '<span class="' + (item.nta_sunday === 'checked' ? 'active-date' : '') + '">' + 'Sun</span>';
                        html += '</p></div></div></div></div>';
                        return $("<li>").append("<div>" + html + "</div>").appendTo(ul);
                    }
                }
            });
        }
    }

    $("#input-users").on("click", function () {
        if (isLoading) {
            $(this).addClass('ui-autocomplete-loading');
            var njt_input_id = setInterval(njt_loading_checking, 1000);

            function njt_loading_checking() {
                if (!isLoading) {
                    clearInterval(njt_input_id);
                    $("#input-users").autocomplete("search", "");
                }
            }
        } else {
            $("#input-users").autocomplete("search", "");
        }
    });


    function removeAccount(load_type) {
        $(".btn-remove-account").unbind("click");
        $(".btn-remove-account").on("click", function () {
            $remove_id = $(this).data("remove");
            $remove_done = $('.nta-list-items[data-index="' + $remove_id + '"]').remove();
            let obj = fullData.findIndex(o => o.account_id == $remove_id);
            DeactiveData.push(fullData[obj]);

            $.ajax({
                url: nta.url,
                type: 'POST',
                dataType: 'json',
                data: {
                    'action': 'remove_account',
                    'remove': load_type,
                    'remove_id': $remove_id
                }
            }).done(function ($result) {
                if ($result.success) {
                }
                checkItemsAccountsList();
            });
        })
    }

    function change_widget_position() {
        $(".btn-left").on("click", function () {
            $(this).addClass('active');
            $(".btn-right").removeClass('active');
            $("#widget_position").val("left");
        });

        $(".btn-right").on("click", function () {
            $(this).addClass('active');
            $(".btn-left").removeClass('active');
            $("#widget_position").val("right");
        });
    }


    function change_button_position() {
        $(".btn-round").on("click", function () {
            $(this).addClass('active');
            $(".btn-square").removeClass('active');
            $("#nta_button_style").val("round");
        });

        $(".btn-square").on("click", function () {
            $(this).addClass('active');
            $(".btn-round").removeClass('active');
            $("#nta_button_style").val("square");
        });
    }

    function copy_clipboard_shortcode_input() {
        $('#nta-button-shortcode-copy').click(function () {
            $(this).focus();
            $(this).select();
            document.execCommand('copy');
            $('.nta-shortcode-copy-status').show();
        });
    }

    function selectAll_table_input_shortcode() {
        $('.nta-shortcode-table').click(function () {
            $(this).focus();
            $(this).select();
        });
    }

    function btn_apply_time_all() {
        $('#btn-apply-time').on('click', function () {
            startTime = $(".time-available .nta_sunday_hour_start").val();
            endTime = $(".time-available .nta_sunday_hour_end").val();

            $(".time-available .nta_hour_start").val(startTime);
            $(".time-available .nta_hour_end").val(endTime);
        });
    }

    function checkItemsAccountsList() {
        items = $('.nta-list-box-accounts .nta-list-items').length;

        if (items < 1) {
            $('.nta-list-status strong').text("Please select accounts you want them to display in WhatsApp Chat Widget");
            $('.nta-list-box-accounts').hide();
        }
    }

    function btn_always_available(){
        $('body.post-type-whatsapp-accounts input#nta-wa-switch').click(function(){
            var checked = $(this).prop("checked");
            if(checked){
                $('.nta-btncustom-offline').hide();
            }else{
                $('.nta-btncustom-offline').show();
            }
        })
    }

    function btn_show_gdpr(){
        $('body.whatsapp_page_floating-widget-whatsapp input#nta-wa-switch-gdpr').click(function(){
            var checked = $(this).prop("checked");
            if(checked){
                $('#nta-gdpr-editor').show();
            }else{
                $('#nta-gdpr-editor').hide();
            }
        })
    }

    function select_display_pages_option(){
        $("#ninja-wa-display-pages").change(function(){
            var display = $(this).val();
            if ( display == 'show' ) {
                $(".nta-wa-pages-content.show-page").removeClass("hide-select");
                $(".nta-wa-pages-content.hide-page").addClass("hide-select");
            }else{
                $(".nta-wa-pages-content.hide-page").removeClass("hide-select");
                $(".nta-wa-pages-content.show-page").addClass("hide-select");
            }
        })
    }

    function checkAll_SelectPages_List(){
        $("#nta-wa-pages-checkall-hide").change(function(){
            $(".nta-wa-hide-pages").prop('checked', $(this).prop("checked"));
        })

        $("#nta-wa-pages-checkall-show").change(function(){
            $(".nta-wa-show-pages").prop('checked', $(this).prop("checked"));
        })
    }

   
});
