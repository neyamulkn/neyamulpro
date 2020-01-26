<input type="hidden" name="id" value="{{$get_category->id}}">
<div class="input-container">
    <div class="input-container">
        <label class="rl-label">Category Name</label>
        <input name="category_name" value="{{$get_category->category_name}}" type="text" id="" placeholder="Enter category here...">
    </div>
</div>

<div class="input-container">
    <label for="status" class="rl-label required">Status</label>
    <label for="status" class="select-block">
        <select name="status" id="status">
            <option {{ ($get_category->status == 1 ? "selected": " ") }} value="1">Active</option>
            <option {{ ($get_category->status == 2 ? "selected": " ") }} value="2">Unactive</option>
        </select>
        <!-- SVG ARROW -->
        <svg class="svg-arrow">
            <use xlink:href="#svg-arrow"></use>
        </svg>
        <!-- /SVG ARROW -->
    </label>
</div>