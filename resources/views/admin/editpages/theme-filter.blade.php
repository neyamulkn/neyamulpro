<input type="hidden" name="id" value="{{$get_data->filter_id}}">

<div class="input-container">
    <div class="input-container">
        <label class="rl-label">Filter Name</label>
        <input  required name="filter_name" value="{{$get_data->filter_name}}" type="text" placeholder="Enter filter name...">
    </div>
</div>

<div class="input-container">
    <label for="Category" class="rl-label required">Sub Category </label>
    <label for="Category" class="select-block">
        <select required="" name="category_id[]" id="Category" multiple="multiple" style="width:100%" class="select2">
            <option value="">Select Category</option>
            @foreach($get_category as $category)
                <option value="{{$category->id}}" {{ ( in_array($category->id, explode(',', $get_data->category_id)) ) ? 'selected' : '' }} >{{$category->category_name}}</option>
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
    <label for="Category" class="rl-label required">Filter type </label>
    <div class="col-md-4">
        <input type="radio" {{($get_data->type == 'radio') ? 'checked' : '' }} id="editRadio" name="type" value="radio">
        <label for="editRadio">
            <span class="checkbox primary primary"></span>
            Radio
        </label>
        <input type="radio"  {{($get_data->type == 'select') ? 'checked' : '' }} id="editSelect" name="type" value="select">
        <label for="editSelect">
            <span class="checkbox primary primary"></span>
            Select
        </label>
        <input type="radio"  {{($get_data->type == 'dropdown') ? 'checked' : '' }} id="editDropdown" name="type" value="dropdown">
        <label for="editDropdown">
            <span class="checkbox primary primary"></span>
            Dropdown
        </label>
    </div>
</div>
<div class="input-container">
    <div class="input-container">
        <label class="rl-label">Filter Message</label>
        <input name="filter_msg" type="text" value="{{$get_data->filter_msg}}" placeholder="Enter Filter Message.">
    </div>
</div>


