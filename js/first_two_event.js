//
//Start Getting Upcoming Event from Evenbrite
//
$(document).ready(function() {

	//anon oauth token
	var token = 'FP5N4456EJUYP4KOCVRI';
	//search_type
	var $events = $("#events");

	$events.html('<div class="spinner-border text-primary m-5"><span class="sr-only">Loading...</span></div>');
	$.get('https://www.eventbriteapi.com/v3/events/search/?token='+token+'&q=autism&sort_by=date&location.address=australia%2C+victoria&expand=venue', 

	  function(res) {
	  if(res.events.length) {
	    var s = "";
	    for(var i=0;i<3;i++) {
	      var event = res.events[i];
	      var eventTime = moment(event.start.local).format("dddd, MMMM Do YYYY, h:mm A");

	      console.dir(event);
	      var eventImage = event.logo;
	      //if eventImage is not null
	      if ( eventImage != null ) {
			eventImage = event.logo.url;
			}
	  		else
	  		{ eventImage = "assets/img/event_template.jpg"; }      
	  	  s += "<div class='card ml-3 mt-2 shadow-sm' style='width:250px;'>";
	      s += "<img class='card-img-top' src='" + eventImage + "'><br>";
	      s += "<div class='card-body'><a class='card-title' href='" + event.url + "'>" + event.name.text + "</a>";
	      s += "<p class='card-text'>Location: " + event.venue.address.address_1 + "<br/>";
	      s += "Date/Time: " + eventTime + "</p>";          
	      s += "</div></div>";
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
