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
	      s += "<div class='eventList'>";
	      s += "<h4><a href='" + event.url + "'>" + event.name.text + "</a></h4>";
	      s += "<p><b>Location: " + event.venue.address.address_1 + "</b><br/>";
	      s += "<b>Date/Time: " + eventTime + "</b></p><br/><br/>";          
	      //s += "<p>" + event.description.text + "</p>";
	      //s += "<img src='" + event.logo.url + "'>";
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

//Over flow content
document.querySelector('button').addEventListener('click', function () {
  document.querySelector('p').classList.toggle('ow');
}, false);


