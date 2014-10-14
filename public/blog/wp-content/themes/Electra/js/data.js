function calendarEvent(){
    jQuery.ajax({
        url: ajaxurl,
        type:'POST',
        data: "action=tt_events_calendar",
        async: false,
        success: function(result){
            codropsEvents = jQuery.parseJSON(result);
        }
    });
return false;
}
var codropsEvents;
calendarEvent();