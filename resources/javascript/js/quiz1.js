$(window).on('load', function() {   
  // load XML file
  $(function() {
    $.ajax({
      type: "GET",
      url: "../../resources/xml/quiz1.xml",
      data: {get_param: 'value'}, 
      dataType: "xml",
      success: function(xml) {

        var col  =  6;
        var elem =  $("#homeworks").find(".row")[0];

        $(xml).find("website").children().each ( function() {
          $(this).children().each( function () {
            var name  =  $(this).find("name").text();
            var link  =  $(this).find("link").text();
            var descr =  $(this).find("descr").text();

            if (name == "Lab 1") {
              col = 4;
              elem = $("#labs").find(".row")[0];
            }

            $(elem).append(
              '<div class="col-sm-'+ col +'">\
                <h4><a href="'+ link +'">'+ name +'</a></h4>\
                <p>'+ descr +'</p>\
              </div>'
            );
          });
        });
      },
      error: function() {
        alert("Error: Failed to load xml correctly!");
      }
    });
  });
});

