setInterval(function () {
  gethotlancer();
  java();
}, 10000);
gethotlancer();
function gethotlancer()
{
    var url = "http://localhost:8000/affiliate/view";
    var product_count = $(".affiliatebyhotlancer").data("hotlancer-count");
    var hotlancer_column = $(".affiliatebyhotlancer").data("hotlancer-column");
    var hotlancer_type = $(".affiliatebyhotlancer").data("hotlancer-type");
    var hotlancer_ref = $(".affiliatebyhotlancer").data("hotlancer-ref");
	$(".affiliatebyhotlancer").each(function(){
		$.ajax({
       	url:url,
 	 	  data: {product_count:product_count,hotlancer_column:hotlancer_column,hotlancer_type:hotlancer_type,hotlancer_ref:hotlancer_ref},
      crossDomain: true,
     type: "GET",
     dataType: "Html",
     success:function(response){
   
     	$(".affiliatebyhotlancer").html(response)
     }
   	});
	});
}
