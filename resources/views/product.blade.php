
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/affiliate.css') }}">
</head>

<body>
	
	<div class="container">
		<div class="row">
			@foreach($products as $product)
			<div class="col-md-{{ $column_1 }}">
				<div class="affiliatebyhotlancer">
					<a href="https://www.hotlancer.com/url?ref={{ $ref_name }}" target="_blank" class="hotlancer">
						<img src="{{ asset('product/'.$product->image) }}" alt="hotlancer image cap">
						<p class="hotlancer-text">{{ $product->name }}</p>
						<ul class="hlalpppl">
						  <li class="hlalpl"><small>Starting At</small>${{ $product->price }}</li>
						  <li class="hlalpr"><img src="{{ asset('s.png') }}"></li>
						</ul>
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>

</body>
</html>
