<input type="hidden" name="id" value="{{$get_method->id}}">
<div class="input-container">
	<div class="input-container">
		<label class="rl-label">Payment Method Name</label>
		<input name="method_name" value="{{$get_method->method_name}}" type="text" id="" placeholder="Enter method name" required="">
	</div>
</div>
<div class="input-container">
	<div class="input-container">
		<label class="rl-label">Public key</label>
		<input name="public_key" value="{{$get_method->public_key}}" type="text" id="" placeholder="Enter public key">
	</div>
</div>
				
<div class="input-container">
	<div class="input-container">
		<label class="rl-label">Secret key</label>
		<input name="secret_key" value="{{$get_method->secret_key}}" type="text" placeholder="Enter secret key...">
	</div>
</div>
<div class="input-container">
	<div class="input-container">
		<label class="rl-label">Method mode</label>
		<select name="method_mode">
			<option {{($get_method->method_mode == 1 ? 'selected' : '')}} value="1">Test</option>
			<option {{($get_method->method_mode == 2 ? 'selected' : '')}} value="2">Live</option>
		</select>
	</div>
</div>
<div class="input-container">
	<div class="input-container">
		<label class="rl-label">Method for</label>
		<select name="method_for">
			<option value="purchess" {{($get_method->method_for == 1 ? 'selected' : '')}}>Purchess</option>
			<option value="payment" {{($get_method->method_for == 2 ? 'selected' : '')}}>Payment</option>
			<option value="both" {{($get_method->method_for == 3 ? 'selected' : '')}}>Both</option>
		</select>
	</div>
</div>

<div class="input-container">
	<div class="input-container">
		<label class="rl-label">Country Name</label>
		<select name="country">
			<option value="Global">Global</option>
			@foreach($country as $show_country)
				<option value="{{$show_country->country}}" {{($get_method->country == $show_country->country ? 'selected' : '')}}>{{$show_country->country}}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="input-container">
	<label for="country2" class="rl-label required">Status</label>
	<label for="country2" class="select-block">
		<select name="status">
			<option value="1" {{($get_method->status == 1 ? 'selected' : '')}}>Active</option>
			<option value="2" {{($get_method->status == 2 ? 'selected' : '')}}>Unactive</option>
			
		</select>
		<!-- SVG ARROW -->
		<svg class="svg-arrow">
			<use xlink:href="#svg-arrow"></use>
		</svg>
		<!-- /SVG ARROW -->
	</label>
</div>

