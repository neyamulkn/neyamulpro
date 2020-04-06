 @foreach($get_theme_info as $show_theme_info)
 <a class="devcsstip_trigger">
    <img class="user-avatar medium" src="{{ asset('theme/images/thumb/'.$show_theme_info->main_image)}}" alt="">
  <span class="devcsstip">
    <div class="devcss">
        <div class="size-limiter"><img alt="" src="{{ asset('theme/images/thumb/'.$show_theme_info->main_image)}}"></div><strong>{{$show_theme_info->theme_name}}</strong>
        <div class="info">
            <div class="author-category">by <span class="author">{{$show_theme_info->username}}</span></div>
            <div class="price"><span class="cost"><sup>$</sup>{{$show_theme_info->price_regular}}</span></div>
        </div>
        <div class="footer"><span class="category">{{$show_theme_info->category_name}} /{{$show_theme_info->subcategory_name}}</span><span class="gst-notice">All prices are in USD</span></div>
    </div>
  </span>
</a>
@endforeach

<script type="text/javascript">
    $(document).ready(function() {
  //Tooldevcsstips
  $(".devcsstip_trigger").hover(function(){
    devcsstip = $(this).find(".devcsstip");
    devcsstip.show(); //Show tooldevcsstip
  }, function() {
    devcsstip.hide(); //Hide tooldevcsstip      
  }).mousemove(function(e) {
    var mousex = e.pageX + 20; //Get X coodrinates
    var mousey = e.pageY + 20; //Get Y coordinates
    var devcsstipWidth = devcsstip.width(); //Find width of tooldevcsstip
    var devcsstipHeight = devcsstip.height(); //Find height of tooldevcsstip
    
    //Distance of element from the right edge of viewport
    var devcsstipVisX = $(window).width() - (mousex + devcsstipWidth);
    //Distance of element from the bottom of viewport
    var devcsstipVisY = $(window).height() - (mousey + devcsstipHeight);
      
    if ( devcsstipVisX < 20 ) { //If tooldevcsstip exceeds the X coordinate of viewport
      mousex = e.pageX - devcsstipWidth - 20;
    } if ( devcsstipVisY < 20 ) { //If tooldevcsstip exceeds the Y coordinate of viewport
      mousey = e.pageY - devcsstipHeight - 20;
    } 
    devcsstip.css({  top: mousey, left: mousex });
  });
});
</script>