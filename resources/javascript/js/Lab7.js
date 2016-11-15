$(window).on('load', function() {   
  // load XML file
  $.ajax({
    type: "GET",
    url: "../../resources/javascript/json/lab7.json",
    data: {get_param: 'value'}, 
    dataType: "json",
    success: function(data) {
      alert("hy");
      var obj = JSON.parse(data);

      var labs =  $("#labs").find(".row")[0];

      alert(obj[1].name);

      for (var i in obj) {
        var name  =  obj[i].name;
        var link  =  obj[i].link;
        var descr =  obj[i].descr;
        alert("kjhkjhkjhl");

        $(labs).append(
          '<div class="col-sm-4">\
            <h4><a href="'+ link +'">'+ name +'</a></h4>\
            <p>'+ descr +'</p>\
          </div>'
        );
      }
    },
    error: function() {
      alert("Error: Failed to load xml correctly!");
    }
  });
});
