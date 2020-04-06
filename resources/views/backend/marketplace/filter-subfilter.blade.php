
<div class="tab"> 
    <?php $active = 1; ?>
    @foreach($get_filter_data as $filter_data)

       <p class="tablinks  @if($active == 1) active @endif" onclick="openCity(event, '{{ $filter_data->filter_id }}')" id="defaultOpen"><input type="hidden" name="filter_id[]" value="{{ $filter_data->filter_id }}">{{  $filter_data->filter_name }}</p>
        <?php $active++; ?>
    @endforeach

</div>
<?php $open = 1; ?>
@foreach($get_filter_data as $filter_data)
    <div id="{{ $filter_data->filter_id }}" @if($open == 1) style="display:block;" @else style="display:none;" @endif class="tabcontent">
    
        <p>{{ $filter_data->filter_msg}}</p>
        @if($filter_data->metadata)
        @foreach ($filter_data->metadata as $metada)
        <li>
            <input @if (in_array($metada->sub_filter_id, $metadata_array)) checked @endif type="checkbox" id="id{{ $metada->sub_filter_id}}" name="gig_metadata[]" value="{{ $metada->sub_filter_id}}">
            <label for="id{{ $metada->sub_filter_id}}">
                <span class="checkbox primary primary"></span>{{ $metada->sub_filter_name }}
            </label>
        </li>
        @endforeach
        @endif
    </div>
    <?php $open++; ?>
@endforeach