
    <table class="responsive-table-input-matrix">
        <thead>
        <tr>
            <th>Image</th>
            <th>Item</th>
             @if(Auth::user()->role_id == env('ADMIN'))
            <th>Author</th>
            @endif
            <th>Price</th>
            <th>Total Sell</th>
            <th>Earnings</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($get_theme_info as $view_theme)

            <tr id="item{{$view_theme->theme_id}}">
                <td class="gig-pict-45">
                    <span class="gig-pict-45">
                        <a href="#"><img src="{{asset('theme/images/thumb/'.$view_theme->main_image)}}" alt="" ></a>
                    </span>
                </td>
                <td class="title js-toggle-gig-stats ">
                    <div class="ellipsis1">
                        <a class="ellipsis" target="_blank" href="{{route('theme_detail', $view_theme->theme_url)}}">{{$view_theme->theme_name}}</a>
                    </div>
                </td>
                @if(Auth::user()->role_id == env('ADMIN'))
                <td><a href="{{ route('profile_view', $view_theme->username) }}" >{{$view_theme->username}}</a></td>
                @endif
                <td>${{$view_theme->price_regular}}</td>
                <td>{{$view_theme->total_sell}}</td>
                <td>${{($view_theme->total_earn) ? $view_theme->total_earn : 0}}</td>
                <td>{{$view_theme->status}}</td>
                       
                <td>
                    <label for="sv" class="select-block v3">
                        <select onchange="action_type(this.value, '{{$view_theme->theme_url}}', '{{$view_theme->theme_id}}')"  name="sv" id="sv">
                            <option value="0">select action</option>
                            @if(Auth::user()->role_id == env('ADMIN'))

                                <option value="active">Approve</option>
                                @if($view_theme->status != 'reject')
                                <option value="reject">Reject</option>
                                @endif
                                <option value="edit">View</option>
                            @else
                            <option value="edit">Edit</option>
                            @endif
                           
                            @if($view_theme->status == 'paused')
                            <option value="active">Active</option>
                            @endif
                            @if($view_theme->status == 'active')
                            <option value="paused">Paused</option>
                            @endif
                            <option value="delete">Delete</option>
                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>
                </td>
            </tr>
        @endforeach
       </tbody>
    </table>
    <div class="page primary paginations">
       {{$get_theme_info->links()}}
    </div>

