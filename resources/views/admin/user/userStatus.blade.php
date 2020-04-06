<table class="responsive-table-input-matrix">
    <thead>
    <tr>
        <th>IMG</th>
        <th>NAME </th>
        <th>DATE</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>COUNTRY</th>
        <th>GIGS</th>
        <th>THEMES</th>
        <th>JOBS</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    	@foreach($get_users as $show_user)

            <tr class="tbgig" id="item{{$show_user->id}}">
                <td class="gig-pict-45">
                    <span class="gig-pict-45">
                        <a href="#"><img src="{{asset('image/'.$show_user->userinfo->user_image)}}" alt="" ></a>
                    </span>
                </td>
                <td class="title js-toggle-gig-stats ">
                    <div class="ellipsis1">
                        <a class="ellipsis" target="_blank" href="{{route('profile_view', $show_user->username)}}">{{$show_user->name }}</a>
                    </div>
                </td>
                
                <td>{{ Carbon\Carbon::parse($show_user->created_at)->format('d M, Y') }}</td>
                <td>{{ $show_user->email }} </td>
                <td>{{ $show_user->userinfo->user_phone }} </td>
              	<td>{{$show_user->country }} </td>
                <td>{{ count($show_user->gigs) }}</td>
                <td>{{ count($show_user->themes) }}</td>
                <td>{{ count($show_user->jobs) }}</td>
                
                <td>
                    <label for="sv" class="select-block v3">
                        <select onchange="action_type(this.value, '{{$show_user->id}}')" name="sv" id="sv">
                            <option value="0">select action</option>
                            <option value="active">Approve</option>
                            <option value="reject">Reject</option>
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
    {{ $get_users->links()}}
</div>