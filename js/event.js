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
			eventImage = event.logo.original.url;
			}
	  		else
	  		{ eventImage = "assets/img/event_template.jpg"; }
	      s += "<div class='mt-2'>";
	      s += "<div class='row'>";
	      s += "<div class='col-sm-6'>";
	      s += "<img src='" + eventImage + "' height='100%' width=100%'><br>";
	      s += "</div>";	
	      s += "<div class='col-sm-6'>";      	  	
	      s += "<a href='" + event.url + "'>" + event.name.text + "</a>";
	      s += "<p><b>Location: " + event.venue.address.address_1 + "</b><br>";
	      s += "<b>Date/Time: " + eventTime + "</b></p>";   
		  s += "<iframe width='100%' height='300' src='https://maps.google.com/maps?width=100%&amp;height=200&amp;hl=en&amp;q=" 
		  s += event.venue.address.latitude + "," + event.venue.address.longitude + "&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'>"
		  s += "<a href='https://www.maps.ie/map-my-route/'>Plot a route map</a></iframe>"
	    	       
	      //s += "<div style='font-size:12px;'>" + event.description.html + "</div></p>";	      
	      //s += "<p>" + event.description.text + "</p>";	      
	      //s += "<p>" + event.summary + "</p>";	      
	      //s += "<img src='" + event.logo.url + "'>";
	      s += "</div></div><br><br>";
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

