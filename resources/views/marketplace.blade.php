<link href="{{asset('affiliate.css')}}" rel="stylesheet">
<div class="herahorlancer">
    <div style="margin:8px 5px;text-align: left;font-weight: bold;color: black;"><a style="color: black;" href="#">affiliateByHOTLancer</a></div>
    <?php $i=1; ?>
    @foreach($products as $product)
    <a id="url_{{$i++}}" href="{{url('marketplace/'.$product->gig_url)}}?ref={{ $ref_name }}" target="_blank" class="hotlancercol-md-{{ $column_1 }} hotlancer">
		<div class="herakhanhotlancer">
			<div class="hotlancerhlalpimg"><img src="{{ asset('gigimages/'.$product->image_path) }}"></div>
			<div class="hotlancerhlalpt">{{ $product->gig_title }}</div>
			<div class="hotlancerhlalpppl">
			  <div class="hotlancerhlalpl">${{ $product->basic_p }}</div>
			  <div class="hotlancerhlalpr"><span style="position: absolute; right: 7px;right: 7px;bottom: 10px;color: #FFD44F;">&#9733; &#9733; &#9733; &#9733; &#9733;</span></div>
			</div>
		</div>
	</a>
	@endforeach
</div>	