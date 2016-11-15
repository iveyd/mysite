Part 1:
used ul to bind the on click rather than bing on each li tag
Used e.target instead of jquery lookup for the hide on click
reduces time by 70ms (to be fair, I did this after part 2, so it may have had more effect 
had I dont them in order)



Part 2 Change Log:

moved script tags to bottom of the body - allowed the body to load before running scripts

moved style to the head - doesnt have to flash unstyled content

changed background image to background color - takes less time to render a color than an 
image

changed div.bar ul#foo to #foo (because it is an id) plus changed other lookups to ids - 
faster to look up an id, plus it reduced the file size

Selected by class for list items - faster to look up by class than by tag name

added appended items to a string and appended them all with one append - reduced calls to 
append

removed to HTML text for List items and double the Jquery list item add - reduced file size

took out the unnnecessary and redundant $("li").each() and just used $("li").show() for 
the show all - this was basically calling each twice and now it only calls it once


Styling:

For styling, I played around with the colors a bit with jquery then I made a basic game out 
of how many list items you can click
