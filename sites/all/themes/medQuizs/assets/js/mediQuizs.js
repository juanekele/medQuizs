$(document).ready(function() {
    $('#showlogin').click(function() {
        $('#loginpanel').slideToggle('slow', function() {
            $("#triangle_down").toggle(); 
            $("#triangle_up").toggle();
        });
    });
    //Cambia la clase a active al pinchar en un menu.
	/*$('ul.nav > li').click(function (e) {
        e.preventDefault();
        $('ul.nav > li').removeClass('active');
        $(this).addClass('active');                
    });  */    
// $('#example').tablesorter(); 
  var path=window.location.pathname;
  var page = path.substring(10);

    $(".nav-sidebar >li").removeClass( "active" );
  if( page == "")
  {
    $("#inicio").addClass("active");
  }
  else{
    $("#"+page).addClass("active");
  }


 });


function rellenaGraf(a,a_label,b,b_label,c,c_label,d,d_label,id,chartType)
{
    var graphdata = [
   {
      value: a,
      label: a_label,
      color: "#46BFBD",
        highlight: "#5AD3D1"
   },
   {
      value: b,
      label: b_label,
      color:"#F7464A",
      highlight: "#FF5A5E"
   },
   {
      value: c,
      label: c_label,
      color: "#FDB45C",
        highlight: "#FFC870"
   },
   {
      value : d,
      label: d_label,
      color: '#6AE128'
   }
];

var context = document.getElementById(id).getContext('2d');
if(chartType=="pie")
{
  var skillsChart = new Chart(context).Pie(graphdata);
}
else
{
  var skillsChart = new Chart(context).Doughnut(graphdata);
}


///////////
$.fn.centrar = function () {
        this.css("position","absolute");
        this.css("top", ( $(window).height() - this.height() ) / 2  + "px");
        this.css("left", ( $(window).width() - this.width() ) / 2 + "px");
        return this;
    }

    $.fn.escalar = function () {
        var maxWidth = $(window).width() - 30;
        var width = this.width();        
        var maxHeight = $(window).height();
        var height = this.height();        


        if (maxWidth < width || maxHeight < height) {        
            scale = Math.min(maxWidth/width, maxHeight/height);
            this.css({'transform': 'scale(' + scale + ')'});
        } else {
            this.css({'transform': ''});
        }
    }

    $('.modalDialog > div').each(function() {
        $(this).centrar();
        $(this).escalar();        
    });       

    $(window).bind('resize', function() {        
        $('.modalDialog > div').each(function() {
            $(this).centrar();
            $(this).escalar();            
        });        
    });

////////////



}