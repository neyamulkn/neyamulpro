<input type="hidden" name="id" value="{{$get_data->id}}">
<div class="input-container">
    <div class="input-container">
        <label class="rl-label">Child Category Name</label>
        <input name="subchild_category_name" value="{{$get_data->subchild_category_name}}" type="text" id="" placeholder="Enter category here...">
    </div>
</div>

<div class="input-container">
    <label for="Category" class="rl-label required">Child Category Name</label>
    <label for="Category" class="select-block">
        <select name="subcategory_id" id="Category">';

        @foreach($get_category as $category)
            <option {{ ( $get_data->subcategory_id == $category->id ? "selected " : " " ) }} value="{{$category->id}}"> {{ $category->subcategory_name }} </option> 
        @endforeach
      </select>
        <!-- SVG ARROW -->
        <svg class="svg-arrow">
            <use xlink:href="#svg-arrow"></use>
        </svg>
        <!-- /SVG ARROW -->
    </label>
</div>

<div class="input-container">
    <label for="status" class="rl-label required">Status</label>
    <label for="status" class="select-block">
        <select name="status" id="status">
            <option {{ ($get_data->status == 1 ? "selected": " ") }} value="1">Active</option>
            <option {{ ($get_data->status == 2 ? "selected": " ") }} value="2">Unactive</option>
            
        </select>
        <!-- SVG ARROW -->
        <svg class="svg-arrow">
            <use xlink:href="#svg-arrow"></use>
        </svg>
        <!-- /SVG ARROW -->
    </label>
</div>
