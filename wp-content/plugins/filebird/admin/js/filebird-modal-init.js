!function(e){"use strict";var i=new e.Event("remove"),o=e.fn.remove;e.fn.remove=function(){return e(this).trigger(i),o.apply(this,arguments)},jQuery(document).ready(function(){!e("body.wp-admin.upload-php").length&&wp.media&&(wp.media.view.Modal.prototype.on("close",function(i){e("#filebird_sidebar").appendTo("body"),e("#filebird_sidebar").hide()}),wp.media.view.Modal.prototype.on("open",function(i){e(".fb-treeview-loading").show(),FileBird_Popup.init()}))})}(jQuery);