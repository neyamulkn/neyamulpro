<link href="https://adsense.pollimarket.com/css/affiliate.css" rel="stylesheet">
<div class="herahorlancer">
    <div style="margin:8px 5px;text-align: left;font-weight: bold;color: black;"><a style="color: black;" href="#">affiliateByHOTLancer</a></div>
    @foreach($products as $product)
    <a href="https://www.hotlancer.com/url?ref={{ $ref_name }}" target="_blank" class="hotlancercol-md-{{ $column_1 }} hotlancer">
		<div class="herakhanhotlancer">
			<div class="hotlancerhlalpimg"><img src="{{ asset('product/'.$product->image) }}"></div>
			<div class="hotlancerhlalpt">{{ $product->name }}</div>
			<div class="hotlancerhlalpppl">
			  <div class="hotlancerhlalpl">$ {{ $product->price }}</div>
			  <div class="hotlancerhlalpr"><img src="{{ asset('s.png') }}"></div>
			</div>
		</div>
	</a>
	@endforeach
</div>	