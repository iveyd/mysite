/*********************************************************************************
 *	When a disk image is clicked, the event handler inside of the event listener *
 * 	will pull information from the provided json file and populate the page with *
 *	the information provided.													 *
 *********************************************************************************/


$('img').on('click', function() { //when one of the images is clicked, do stuff

	$.getJSON("lab4.json", function(data) { //get json from file and store it in data

		$.each(data.Songs, function(song, info) { //for each song in Songs

			var div = document.getElementById((song+1).toString()); //specify where the information is going
			
			div.style.borderBottom = "2px solid black"; //add border styling
			
			div.style.borderTop = "2px solid black"; //add border styling

			$.each(div.children, function(index, element) { //for each child of div

				var elementClassName = element.className; //get class name of element

				if (elementClassName === "site") { //if element need special treatment

					element.href = info[elementClassName]; //set reference

					element.children[0].src = info[element.children[0].className]; //set image

				} else if (elementClassName === "genres"){ //dealing with an array
					
					var subGenres = info[elementClassName]; //get the array

					var txt = ""; //string

					$.each(subGenres, function(index, genre) {
						
						txt += genre+"/"; //add info to string

					});

					txt = txt.slice(0, -1); //get rid of the trailing '/' char
					element.innerHTML = "<li>"+txt+"</li>"; //add it to the list

					element.style.display = "inline"; //add list styling
					element.style.listStyle = "none"; //add list styling

				} else { //if element only needs to be populated

					element.innerHTML = info[elementClassName]; //set info

				}

			}); //end each child loop

		}); //end each song loop

	}); //end getJSON

}); //end on (click listener)
