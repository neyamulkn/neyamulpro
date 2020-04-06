<link href="{{asset('affiliate.css')}}" rel="stylesheet">
<div class="herahorlancer">
    <div style="margin:8px 5px;text-align: left;font-weight: bold;color: black;"><a style="color: black;" href="#">affiliateByHOTLancer</a></div>
    @foreach($get_jobs as $show_job)
    <a href="{{url('workplace/'.$show_job->job_title_slug)}}?ref={{ $ref_name }}" target="_blank" class="hotlancercol-md-{{ $column_1 }} hotlancer">
		<div class="hotlancerkeywordbox">
			<div class="hotlancerhlalpt">{{ $show_job->job_title }}</div>
		</div>
	</a>
	@endforeach
</div>	