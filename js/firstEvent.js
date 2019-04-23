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
	      var event = res.events[0];
	      var eventTime = moment(event.start.local).format('D/M/YYYY h:mm A');
	      console.dir(event);
		  var eventImage = event.logo;
	      //if eventImage is not null
	      if ( eventImage != null ) {
			eventImage = event.logo.original.url;
			}
	  	  else
	  		{ eventImage = "assets/img/event_template.jpg"; }	      
	  	  s += "<div>";
	      s += "<img src='" + eventImage + "' height='50%' width=50%'><br>";
	      s += "<a href='" + event.url + "'>" + event.name.text + "</a>";
	      s += "<p><b>Location: " + event.venue.address.address_1 + "</b><br/>";
	      s += "<b>Date/Time: " + eventTime + "</b></p>";          
	      s += "<a href='event.php' class='btn btn-secondary' role='button'>More Events</a>";
	      s += "</div><br><br>";
	    $events.html(s);
	  } else {
	    $events.html("<p>Sorry, there are no upcoming events.</p>");
	  }
	});    
});
//
//End Getting Upcoming Event from Evenbrite
//

