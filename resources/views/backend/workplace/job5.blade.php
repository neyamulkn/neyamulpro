@extends('backend.layouts.master')
@section('title', $get_job->job_title)

@section('css')
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
    
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- /HEADLINE -->
            <div class="worklaft1">
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Title</p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Description </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Details </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Expertise </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1 selected">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Visibility </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Budget </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Review </p>
                    <span class="sl-icon icon-check"></span>
                </a>
            </div>
        <form  action="{{url('dashboard/workplace/job-post/insert/step_five')}}" method="post">
                {{csrf_field()}}
           <input type="hidden" name="slug" value="{{$get_job->job_title_slug}}">
                 
            <div class="workr81">
                <div class="workttsr">
                    <div class="workttse22">
                        <h2 class="workbottom">Details</h2>
                        <span> Step 5 of 7 </span>
                    </div>
                    <div class="workttse222 v1">
                        <p class="workttsw"><b>How many freelancers do you need for this job? </b></p>
                        <div class="container">
                             <div class="form cf">
                                <section class="payment-plan cf">
                                    <input  type="radio" <?php echo ($get_job) ? ($get_job->number_freelancer == 1)? 'checked= "checked"' : '' : '' ?> name="number_type" id="one_freelancer" value="1">
                                    <label onclick="number_freelancer(1)" class="monthly-label four col" for="one_freelancer" ><span class="sl-icon icon-user-follow"></span><p class="hireup">One freelancer </p></label>

                                    <input type="radio" <?php echo ($get_job) ? ($get_job->number_freelancer > 1) ? 'checked= "checked"' : '' : '' ?>  name="number_type" id="more_freelancer" value="2">
                                    <label onclick="number_freelancer(2)"class="yearly-label four col" for="more_freelancer" ><span class="sl-icon icon-menu"></span><p class="hireup">More than freelancer</p></label>

                                   
                                </section>
                                <span id="number_freelancer" <?php echo ($get_job) ? ($get_job->number_freelancer > 1) ? ' style="display: block" ' : 'style="display: none"' : '' ?> >
                                    <p style="color: #000;">Number of freelancers? </p>
                                    <input type="text" value=" <?php echo ($get_job) ? ($get_job->number_freelancer > 1) ? $get_job->number_freelancer : '' : '' ?>" style="width: 50%; border:1px solid #ccc;" name="number_freelancer">
                                 </span>
                            </div>
                        </div>
                    </div>    


                    
                </div>
                <div class="cattwork">
                    <b class="cattworks">Additional Options (Optional)</b><br>
                    
                    <p>Add screening questions and/or require a cover letter</p>
                    
                </div>
                <div class="downloadtheme5">
                    <a href="{{url('dashboard/workplace/job-post/'.$get_job->job_title_slug.'/step/4')}}" class="button mid tertiary half v3">Back</a><br>
                    <button type="submit" class="button mid secondary wicon half  v3">Next</button><br>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- PACK BOXES -->
            <!-- /PACK BOXES -->
        </form>
            <div class="clearfix"></div>    
            

            <!-- FORM BOX ITEMS -->
            <!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->
@endsection
@section('js')

<script type="text/javascript">
function number_freelancer(value){

    if(value == 2){
        $('#number_freelancer').show();
    }else{
        $('#number_freelancer').hide();
    }
}
</script>

 @endsection

