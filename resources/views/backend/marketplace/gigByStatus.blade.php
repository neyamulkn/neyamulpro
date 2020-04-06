<table class="responsive-table-input-matrix">
    <thead>
    <tr>
        <th>IMG</th>
        <th>GIG Title </th>
        @if(Auth::user()->role_id == env('ADMIN'))
        <th>AUTHOR</th>
        <th>DATE</th>
        @endif
        <th>IMPRESSIONS</th>
        <th>CLICKS</th>
        <th>VIEWS</th>
        <th>ORDERS</th>
        <th>CANCELLATIONS</th>
        <th>Action</th>  
    </tr>
    </thead>
    <tbody>
    @foreach($get_gigs as $show_gig)
        <tr class="tbgig" id="item{{ $show_gig->gig_id }}">
            <td class="gig-pict-45">
                <span class="gig-pict-45">
                    <a href="#"><img src="{{ asset('gigimages/'. ($show_gig->get_image ? $show_gig->get_image->image_path : '' ) ) }}" alt="" ></a>
                </span>
            </td>
            <td class="title js-toggle-gig-stats ">
                <div class="ellipsis1">
                    <a class="ellipsis" target="_blank" href="{{ url('marketplace/'.$show_gig->gig_url) }}">{{ $show_gig->gig_title }}</a>
                </div>
            </td>
            @if(Auth::user()->role_id == env('ADMIN'))
            <td><a href="{{route('profile_view', $show_gig->get_user->username)}}" target="_blank" >{{$show_gig->get_user->name }}</a></td>
            <td>{{ Carbon\Carbon::parse($show_gig->created_at)->format('d M, Y') }}</td>
            @endif
            <td>{{ $show_gig->gig_impress }} <i class="fa fa-long-arrow-up green"></i></td>
            <td>{{ $show_gig->gig_click }} <i class="fa fa-long-arrow-up green"></i></td>
            <td>{{ $show_gig->gig_view }} <i class="fa fa-long-arrow-up green"></i></td>
            <td>{{ count($show_gig->gigOrder) }}</td>
            <td>0 %</td>
            <td>
                <label for="sv" class="select-block v3">
                    <select onchange="action_type(this.value,'{{$show_gig->gig_url}}', '{{$show_gig->gig_id}}')" name="sv" id="sv">
                        <option value="0">select action</option>
                        
                        @if(Auth::user()->role_id == env('ADMIN'))
                        <option value="active">Approve</option>
                        <option value="reject">Reject</option>
                        @endif
                       
                        @if($show_gig->gig_status == 'paused')
                        <option value="active">Active</option>
                        @endif
                        @if($show_gig->gig_status == 'active')
                        <option value="paused">Paused</option>
                        @endif
                        <option value="edit">Edit</option>
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
    {{ $get_gigs->links() }}
</div>