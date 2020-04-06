<link href="{{asset('affiliate.css')}}" rel="stylesheet">
<div class="herahorlancer">
    <div style="margin:8px 5px;text-align: left;font-weight: bold;color: black;"><a style="color: black;" href="#">affiliateByHOTLancer</a></div>
    @foreach($get_theme as $show_theme)
    <a href="{{url('themeplace/'.$show_theme->theme_url)}}?ref={{ $ref_name }}" target="_blank" class="hotlancercol-md-{{ $column_1 }} hotlancer">
		<div class="herakhanhotlancer">
			<div class="hotlancerhlalpimg"><img src="{{ asset('theme/images/'.$show_theme->main_image) }}"></div>
			<div class="hotlancerhlalpt">{{ $show_theme->theme_name }}</div>
			<div class="hotlancerhlalpppl">
			  <div class="hotlancerhlalpl">${{ $show_theme->price_regular }}</div>
			  <div class="hotlancerhlalpr"><span style="position: absolute; right: 7px;right: 7px;bottom: 10px;color: #FFD44F;">&#9733; &#9733; &#9733; &#9733; &#9733;</span></div>
			</div>
		</div>
	</a>
	@endforeach
</div>	