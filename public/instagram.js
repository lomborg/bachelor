


function feedIt(){
	var container = document.getElementById("intelligo-instagram-widget-container");
  
  var id = container.getAttribute("widget_id");
  var columns = container.getAttribute("columns");
  var rows = container.getAttribute("rows");
  var wrap = container.getAttribute("wrap");
  var widget = container.getAttribute("widget");
	var sUrl = 'https://cp.meetintelligo.com/instagram/'+id+'/'+columns+'/'+rows+'/'+wrap+'/'+widget;
  jQuery.getJSON(sUrl, function(data) {
    container.innerHTML = data.html;
  });
}

widgetIt();

var jQuery;

function widgetIt() {


  if (window.jQuery === undefined || window.jQuery.fn.jquery !== '2.1.3') {
      console.log("no jQuery");
      var script_tag = document.createElement('script');
      script_tag.setAttribute("type", "text/javascript");
      script_tag.setAttribute("src", "https://code.jquery.com/jquery-3.2.1.min.js");
      if (script_tag.readyState) {
        script_tag.onreadystatechange = function () { // For old versions of IE
            if (this.readyState == 'complete' || this.readyState == 'loaded') {
                scriptLoadHandler();
            }
        };
      } else {
        script_tag.onload = scriptLoadHandler;
      }
      (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
  } else {
      jQuery = window.jQuery;
      feedIt();
  }


  function scriptLoadHandler() {
      jQuery = window.jQuery.noConflict(true);
      feedIt(); 
  }

}



