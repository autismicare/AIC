//
//Start Getting Upcoming Event from Evenbrite
//
$(document).ready(function() {

	//anon oauth token
	var token = 'FP5N4456EJUYP4KOCVRI';
	//search_type
	var $events = $("#events");

	$events.html("<i>Loading events...</i>");
	$.get('https://www.eventbriteapi.com/v3/events/search/?token='+token+'&q=autism&sort_by=date&location.address=australia%2C+victoria&expand=venue', 

	  function(res) {
	  if(res.events.length) {
	    var s = "";
	    for(var i=0;i<res.events.length;i++) {
	      var event = res.events[i];
	      var eventTime = moment(event.start.local).format('M/D/YYYY h:mm A');
	      console.dir(event);
	      var eventImage = event.logo;
	      //if eventImage is not null
	      if ( eventImage != null ) {
			// eventImage = event.logo.original.url;
			eventImage = event.logo.url;
			}
	  		else
	  		{ eventImage = "assets/img/event_template.jpg"; }
	      s += "<div class='container shadow-sm col-lg-3 col-md-4 col-9 m-2'>";
	      s += "<img src='" + eventImage + "' style='width:100%'><br>";    	  	
	      s += "<b><img src='./assets/img/e_sm.png' class='mt-1'><a style='color:#FF6B21;' href='" + event.url + "'> " + event.name.text + "</a>";
	      s += "<br><img src='./assets/img/gpin_sm.png'><a style='color:#53B07F;' href='https://maps.google.com/maps?width=100%&amp;height=200&amp;hl=en&amp;q=" + event.venue.address.latitude + "," + event.venue.address.longitude + "'>" + event.venue.address.address_1 + "</a></b><br>";
	      s += "<a>Date/Time: " + eventTime + "</a><br>";     	     
	      s += "</div>";
	    }
	    $events.html(s);
	  } else {
	    $events.html("<p>Sorry, there are no upcoming events.</p>");
	  }

	});
	
	

});
//
//End Getting Upcoming Event from Evenbrite
//

