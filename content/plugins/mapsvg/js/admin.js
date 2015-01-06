// Need this to avoid conflicts between Bootstrap.js and jQueri-UI
jQuery.fn.datepicker = function(){return};
jQuery.fn.sortable   = function(){return};
jQuery.fn.tabs       = function(){return};
jQuery.fn.buttonset  = function(){return};
jQuery.fn.disableSelection  = function(){return};


/*
 * jQuery plugin - convert <form></form> data to JS object
 * Author - Roman S. Stepanov
 * http://codecanyon.net/user/Yatek/portfolio
 */
(function( $ ) {
$.fn.formToJSON = function(addEmpty) {

	var obj = {};

	function add(obj, name, value){
        if(!addEmpty && !value)
            return false;
		if(name.length == 1) {
			obj[name[0]] = value;
		}else{
			if(obj[name[0]] == null)
				obj[name[0]] = {};
			add(obj[name[0]], name.slice(1), value);
		}
	};

	$(this).find('input, textarea, select').each(function(){
	    if($(this).attr('name') && !( ($(this).attr('type')=='checkbox' || $(this).attr('type')=='radio') && $(this).attr('checked')==undefined)){
            add(obj, $(this).attr('name').replace(/]/g, '').split('['), $(this).val());
        }
	});

    return obj;
};
})(jQuery);


/**
 * mapSvg Admin
 *
 * Author - Roman S. Stepanov
 * http://codecanyon.net/user/Yatek/portfolio
 */
(function( $ ) {

    // mapfile, pluginDirUrl, mapsDirUrl, marks :  : vars defined in mapsvg.php
    var default_width,default_height,default_viewbox_width,default_viewbox_height;
    var msvg, msvg_viewbox;
    var editingMark;
    var _data = {}, _this = {};

    methods = {

        setWidth : function (){
            if($('#keep_ratio').is(':checked')){
                var new_width = Math.round($('#map_height').val() * default_width / default_height);
                $('#map_width').val(new_width);
            }else{
                //setViewBoxRatio();
            }
        },
        setHeight : function (){
            if($('#keep_ratio').is(':checked')){
                var new_height = Math.round($('#map_width').val() * default_height / default_width);
                $('#map_height').val(new_height);
            }else{
                //setViewBoxRatio();
            }
        },
        keepRatioClickHandler : function (){
            if($('#keep_ratio').is(':checked')){
                methods.setHeight();
                //setViewBoxRatio();
            }
        },
        setWidthViewbox : function (){
            if($('#keep_ratio').is(':checked'))
                var k = default_width / default_height;
            else
                var k = ($('#map_width').val() / $('#map_height').val());

            var new_width = Math.round($('#viewbox_height').val() * k);

            if (new_width > default_viewbox_width){
                new_width  = default_viewbox_width;
                var new_height = default_viewbox_height * k;
                $('#viewbox_height').val(new_height);
            }

            $('#viewbox_width').val(new_width);
        },
        setViewBoxRatio : function (){
            var mRatio = $('#map_width').val() / $('#map_height').val();
            var vRatio = $('#viewbox_width').val() / $('#viewbox_height').val();

            if(mRatio != vRatio){
                if(mRatio >= vRatio){ // viewBox is too tall
                    $('#viewbox_height').val( default_viewbox_width * mRatio ) ;
                }else{ // viewBox is too wide
                    $('#viewbox_width').val( default_viewbox_height / mRatio ) ;
                }
            }
                //...

        },
        setHeightViewbox : function (){

            if($('#keep_ratio').is(':checked'))
                var k = default_height / default_width;
            else
                var k = ($('#map_height').val() / $('#map_width').val());


            var new_height = Math.round($('#viewbox_width').val() * k);

            if (new_height > default_viewbox_height){
                new_height  = default_viewbox_height;
                var new_width = default_viewbox_width * k;
                $('#viewbox_width').val(new_width);
            }

            $('#viewbox_height').val(new_height);
        },
        viewBoxResetSize : function (){
            $('#viewbox_height').val();
        },
        selectCheckbox : function (){
            c = $(this).attr('checked') ? true : false;
            $('.region_select').removeAttr('checked');
            if(c)
                $(this).attr('checked','true');
        },
        disableAll : function (){
            c = $(this).attr('checked') ? true : false;
            if(c)
                $('.region_disable').attr('checked','true');
            else
                $('.region_disable').removeAttr('checked');
        },
        toggleViewBoxEditor : function (){

            var hidden = $('#mapsvg-viewbox-edit').hasClass('hidden');

            if(hidden)
                methods.showViewBoxEditor.call(this);
            else
                methods.hideViewBoxEditor.call(this);

            return false;
        },
        hideViewBoxEditor : function(){

            $('#setViewBox').show();

            //$('#mapsvg-viewbox-edit').hide()

            //$('#mapsvg').appendTo('#tab_marks');
            //var width = $('#myTab').width();
            //var size = $('#mapsvg').mapSvg().setSize(width, 0, false);

            //$('#mapsvg').mapSvg().viewBoxSetBySize(size[0], size[1]);
            //$('#mapsvg').mapSvg().setViewBox();

            //$('#mapsvg').mapSvg().setZoom(false);
            //$('#mapsvg').mapSvg().setPan(false);
            //$('#mapsvg').mapSvg().setMarksEditMode(true);

            $('#mapsvg-viewbox-edit').addClass('hidden');

            $('body').unbind('mousedown.mapsvgadmin');


            return true;
        },
        showViewBoxEditor : function(){

            $('#setViewBox').hide();
            $('#mapsvg-viewbox-edit').removeClass('hidden').css('max-width', width);

            var width  = $('#mapform input#map_width').val();
            var height = $('#mapform input#map_height').val();

            var containerWidth = $('#setViewBox').closest('.controls').width()-42;

            /*
            if(width > containerWidth){
                width  = containerWidth;
                height = height * width/containerWidth;
            }
            */

            $('#mapsvg-viewbox').mapSvg().setSize(width, height, true);


            /*
            $('#mapsvg').destroy().init({});
            $('#mapsvg').appendTo('#mapsvg-viewbox-edit');
            $('#mapsvg').mapSvg().setSize(width, height, true);
            $('#mapsvg').mapSvg().viewBoxSetBySize(width, height);
            $('#mapsvg').mapSvg().setZoom(true);
            $('#mapsvg').mapSvg().setPan(true);
            $('#mapsvg').mapSvg().setMarksEditMode(false);
            */

            $('body').bind('mousedown.mapsvgadmin', methods.viewBoxBlur);

            return true;
        },
        viewBoxBlur : function(e){
            if($(e.target).closest('#mapsvg-viewbox-edit').length) return false;
           methods.hideViewBoxEditor();
        },
        showMarksEditMap : function (){

        },
        saveMapSettings : function (){
            var form = $(this);
            $('#btn-mapsvg-save').button('loading');
            var formData = form.formToJSON();
            formData.m.marks = msvg.marksGet();


            $.post(ajaxurl, {action: 'mapsvg_save', data: formData}, function(id){
                $('#btn-mapsvg-save').button('reset');
                var msg = 'Settings saved';
                $('#map-page-title').html(formData.title);

                if(formData.map_id=='new'){
                    $('#mapsvg-alert-shortcode').children('#mapsvg-shortcode').html(id);
                    $('#mapsvg-alert-shortcode').fadeIn();
                    //msg += '. Shortcode: [mapsvg id='+id+']';
                    $('body,html').scrollTop(0);
                    form.find('input[name=map_id]').val(id);
                }
                $().message(msg);
            });

            return false;
        },
        mapDelete : function(e){
            e.preventDefault();
            var table_row = $(this).closest('tr');
            var id = table_row.attr('data-id');
            $.post(ajaxurl, {action: 'mapsvg_delete', id: id}, function(){
                table_row.fadeOut();
            });
        },
        mapCopy : function(e){

            e.preventDefault();

            var table_row = $(this).closest('tr');
            var id        = table_row.attr('data-id');
            var map_title = table_row.attr('data-title');

            if(!(new_name = prompt('Enter new map name', map_title+' - copy')))
                return false;

            $.post(ajaxurl, {'action': 'mapsvg_copy', 'id': id, 'new_name': new_name}, function(new_id){
                var new_row = table_row.clone();

                var map_link = '?page=mapsvg-config&map_id='+new_id;
                new_row.attr('data-id', new_id).attr('data-title', new_name);
                new_row.find('.mapsvg-map-title a').attr('href', map_link).html(new_name);
                new_row.find('.mapsvg-action-buttons a.mapsvg-button-edit').attr('href', map_link);
                new_row.find('.mapsvg-shortcode').html('[mapsvg id='+new_id+']');
                new_row.prependTo(table_row.closest('tbody'));
            });
        },
        setViewBox : function (){
            var v = $('#mapsvg-viewbox').mapSvg().getViewBox();

            $('input#viewbox_disabled').val( parseInt(v[0])+' '+parseInt(v[1])+' '+parseInt(v[2])+' '+parseInt(v[3]) );
            $('input#viewbox_x').val(v[0]);
            $('input#viewbox_y').val(v[1]);
            $('input#viewbox_w').val(v[2]);
            $('input#viewbox_h').val(v[3]);
            methods.hideViewBoxEditor();

            return false;
        },
        marksEditModal : function(){
            editingMark = this;
            $('#markModal').modal('show');
            if(this.attrs.src)
                $('#markModal #mark-attrs-src').val(this.attrs.src);
            $('#markModal #mark-tooltip').val(this.data('tooltip'));
            $('#markModal #mark-popover').val(this.data('popover'));
            $('#markModal #mark-attrs-href').val(this.data('href'));
            $('#markModal #mark-attrs-target').val(this.attrs.target);
        },
        marksEditorInit : function(){
            $('#markModal').on('click', '#markSave', function(){
                $('#markModal #markModalState').val('save');
                $('#markModal').modal('hide');
            }).on('click', '#markCancel', function(){
                $('#markModal #markModalState').val('cancel');
                $('#markModal').modal('hide');
            }).on('click', '#markDelete', function(){
                $('#markModal #markModalState').val('delete');
                $('#markModal').modal('hide');
            }).on('keypress', 'input', function(e){
                if(e.keyCode==13)
                    $('#markModal #markSave').trigger('click');
            }).on('hide', function(){
                var action = $('#markModalState').val();
                if(action == 'save'){
                    var d = $('#markModal').formToJSON(true);

                    msvg.markUpdate(editingMark, d.mark);
                }else if(action == 'delete'){
                    msvg.markDelete(editingMark);
                }
            });
        },
        updateMapDimensions : function(){
            _data.options.width   = $('#map_width').val();
            _data.options.height  = $('#map_height').val();
            _data.options.viewBox = [$('#viewbox_x').val(), $('#viewbox_y').val(), $('#viewbox_w').val(), $('#viewbox_h').val()];
        },
        init : function(options){

            _data.options = options;

            $(document).ready(function(){


                // first page, jsut check check for new version
                    /*
                    $.post(ajaxurl, {action: 'mapsvg_check_version'}, function(result){
                        new_version = parseInt(result);
                        if(new_version == 1){
                            $('#mapsvg-new-version').show();
                        }
                    });
                    */


                if(_data.options.mapfile){
                // settings page

                    default_width  = $('#default_width').val();
                    default_height = $('#default_height').val();
                    default_viewbox_width  = $('#default_width').val();
                    default_viewbox_height = $('#default_height').val();

                    _this.updateMapDimensions();


                    msvg = jQuery("#mapsvg").mapSvg({
                        source     : _data.options.mapfile,
                        disableAll : true,
                        disabledClickable : true,
                        width      : $('#myTab').width(),
                        marks      : _data.options.marks,
                        editMode   : true,
                        marksEditHandler: methods.marksEditModal
                    });


                    msvg_viewbox = jQuery("#mapsvg-viewbox").mapSvg({
                        source     : _data.options.mapfile,
                        viewBox    : _data.options.viewBox,
                        zoomLimit: [-1000,1000],
                        zoomDelta: 1.1,
                        disableAll : true,
                        pan        : true,
                        zoom       : true,
                        responsive : true,
                        width      : _data.options.width,
                        height     : _data.options.height
                    });

                    $('input.input-switch').on('click',function(){
                        if($(this).is(':checked')){
                            $(this).closest('.controls').find('.radio').next().attr('disabled','disabled');
                            $(this).parent().next().removeAttr('disabled');
                        }
                    });

                    // Init marks editor
                    methods.marksEditorInit();

                    $('input.cpicker').ColorPicker({
                    	onSubmit: function(hsb, hex, rgb, el) {
                    		$(el).val('#'+hex);
                    		$(el).ColorPickerHide();
                    	},
                    	onBeforeShow: function () {
                    		$(this).ColorPickerSetColor(this.value);
                    	}
                    }).bind('keyup', function(){
                    	$(this).ColorPickerSetColor(this.value);
                    });

                    $('.input2textarea').on('focus',function(){
                       $(this).hide();
                       var nt = $('<textarea>'+$(this).val()+'</textarea>');
                       $(this).after(nt);
                       nt.focus();
                       nt.on('blur',function(){
                                var t = $(this);
                                t.prev().val(t.val()).show();
                                t.remove();
                            });
                    });

                    $('#myTab a').click(function (e) {
                          e.preventDefault();
                          $(this).tab('show');
                    }).on('shown', function (e){
                      if($(e.target).html()=='Marks')
                        methods.showMarksEditMap();
                    });

                    /** SAVE FORM SETTINGS VIA AJAX **/
                    $('#mapform').on('submit', methods.saveMapSettings);


                    /** EVENT HANDLERS **/
                    $('#map_width').on('keyup', methods.setHeight);
                    $('#map_height').on('keyup', methods.setWidth);
                    $('#viewbox_width').on('keyup', methods.setHeightViewbox);
                    $('#viewbox_height').on('keyup', methods.setWidthViewbox);
                    $('#keep_ratio').on('change', methods.keepRatioClickHandler);
                    $('.region_select').on('change', methods.selectCheckbox);
                    $('#disable_all_regions').on('change', methods.disableAll);
                    $('#setViewBox').on('click', methods.toggleViewBoxEditor);
                    $('#saveViewBox').on('click', methods.setViewBox);


                    return methods;
                }else{

                    $('#mapsvg-table-maps').on('click', 'a.mapsvg-delete', methods.mapDelete);
                    $('#mapsvg-table-maps').on('click', 'a.mapsvg-copy', methods.mapCopy);

                }
          });
        }
  };

  _this = methods;

  /** $.FN **/
  $.fn.mapsvgadmin = function( opts ) {

    if ( methods[opts] ) {
      return methods[opts].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof opts === 'object') {
      return methods.init.apply( this, arguments );
    }else if (!opts){
        return methods;
    } else {
      $.error( 'Method ' +  method + ' does not exist on mapSvg plugin' );
    }

  };

})( jQuery );