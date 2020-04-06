<table class="responsive-table-input-matrix">
    <thead>
    
    <tr>
        <th>Job Title </th>
        <th>Project Type</th>
        <th>Order date</th>
        <th>Total</th>
        <th>Status</th>
    </tr>
    </thead>
<tbody>

@if(count($get_order) > 0)
    @foreach($get_order as $show_order)
   
    <tr class="tbgig">
        
        <td class="title js-toggle-gig-stats ">
            <div class="ellipsis1">
                <a class="ellipsis" target="_blank" href="{{ url('dashboard/workplace/order-details/'. $show_order->order_id) }}">{{ $show_order->job_title }}</a>
            </div>
        </td>
        <td>{{ $show_order->price_type }}</td>
        <td>{{ \Carbon\Carbon::parse($show_order->created_at)->format('d m , Y') }}</td>
        <td>{{ $show_order->proposal_budget }}</td>
        
        <td>
            <label for="sv" class="select-block v3">
                <span style="text-transform:uppercase;" class="alert alert-success">{{$show_order->status}}
            </label>
        </td>
    </tr>
   
    @endforeach
    @else
     <tr><td colspan="5">No orders found.!</td></tr>
    @endif
    </tbody>
    
</table>
<div class="page primary paginations">
   {{ $get_order->links() }}
</div>