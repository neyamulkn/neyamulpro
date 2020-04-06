
<input type="hidden" name="id" value="$get_subfilter->sub_filter_id">
<div class="input-container">
  <div class="input-container">
    <label class="rl-label">Sub Filter Name</label>
    <input required name="sub_filter_name" value="{{$get_subfilter->sub_filtername}}" type="text" id="" placeholder="Enter sub filter name here...">
  </div>
</div>
 
<div class="input-container">
  <label for="Category" class="rl-label required">Filter Name</label>
  <label for="Category" class="select-block">
    <select name="filter_id" id="Category">';

        @foreach($get_filters as $show_filter)
            <option {{ ($get_subfilter->filter_id == $show_filter->filter_id ? "selected" : " " ) }} value="{{$show_filter->filter_id}}">{{$show_filter->filter_name}}</option>
        @endforeach
    </select>
    <!-- SVG ARROW -->
    <svg class="svg-arrow">
      <use xlink:href="#svg-arrow"></use>
    </svg>
    <!-- /SVG ARROW -->
  </label>
</div>
