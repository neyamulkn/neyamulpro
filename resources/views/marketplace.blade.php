<link href="http://localhost:8000/adsense/affiliate.css" rel="stylesheet">
<div class="herahorlancer">
    <div style="margin:8px 5px;text-align: left;font-weight: bold;color: black;"><a style="color: black;" href="#">affiliateByHOTLancer</a></div>
    @foreach($products as $product)
    <a href="https://www.hotlancer.com/url?ref={{ $ref_name }}" target="_blank" class="hotlancercol-md-{{ $column_1 }} hotlancer">
		<div class="herakhanhotlancer">
			<div class="hotlancerhlalpimg"><img src="{{ asset('gigimages/'.$product->image_path) }}"></div>
			<div class="hotlancerhlalpt">{{ $product->gig_title }}</div>
			<div class="hotlancerhlalpppl">
			  <div class="hotlancerhlalpl">$ 3</div>
			  <div class="hotlancerhlalpr"><img src="http://localhost:8000/adsense/s.png"></div>
			</div>
		</div>
	</a>
	@endforeach
</div>	