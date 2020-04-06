@extends('backend.layouts.master')

@section('title', $get_job->job_title)

@section('css')
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
    <style type="text/css">
        .project_do .four{
            width: 23% !important;
        }
    </style>
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
                <a href="#" class="worklaft1 ">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Visibility </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1 selected">
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
        <form  action="{{url('dashboard/workplace/job-post/insert/step_six')}}" data-parsley-validate method="post">
                {{csrf_field()}}
            <input type="hidden" name="slug" value="{{$get_job->job_title_slug}}">
                
            <div class="workr81">
                <div class="workttsr">
                    <div class="workttse22">
                        <h2 class="workbottom">Details</h2>
                        <span> Step 6 of 7 </span>
                    </div>
                    <div class="workttse222 v1">
                        <p class="workttsw"><b> How would you like to pay your freelancer? </b></p>
                        <div class="container">
                            <div class="form cf">
                                <section class="payment-plan cf">

                                     <input type="radio" onclick="hideShow('monthly')" checked="" required="required" <?php echo ($get_job) ? ($get_job->price_type == 'monthly') ? 'checked= "checked"' : '' : '' ?>  name="price_type" id="monthly" value="monthly">
                                    <label class="yearly-label four col" for="monthly" ><span class="sl-icon icon-menu"></span><p class="hireup">Pay a monthly price</p></label>

                                    <input   onclick="hideShow('fixed') " type="radio" required="required" <?php echo ($get_job) ? ($get_job->price_type == 'fixed')? 'checked= "checked"' : '' : '' ?> name="price_type" id="fixed" value="fixed">
                                    <label  class="monthly-label four col" for="fixed" ><span class="sl-icon icon-user-follow"></span><p class="hireup">Pay a fixed price </p></label>

                                </section>
                                <div class="col-md-6">
                                <span id="budget">
                                    <p style="color: #000;">Do you have a specific budget? </p>
                                    <input type="number"  placeholder="Exmaple $100" value="{{ ($get_job) ?  $get_job->budget : ''  }}" style=" border:1px solid #ccc;margin-left: 0px;" name="budget" >
                                 </span>
                                </div>
                                <div class="col-md-6">
                                 <span id="day" style="display: none;">
                                    <p style="color: #000;">Do you have a specific day? </p>
                                    <input type="number" value="{{ ($get_job  && $get_job->price_type == 'fixed') ?  $get_job->day_hours : ''  }}"  margin-left: 0px; border:1px solid #ccc;" name="days" placeholder="Exmaple 90 days" >
                                 </span>

                                 <span id="daily"  >
                                    <p style="color: #000;">Do you have a specific daily work hours? </p>
                                        <select name="hours"  id="subcategory" required="">
                                            <?php for ($i=1; $i <= 12; $i++) {  ?>
                                             
                                                <option <?php echo ($get_job && $get_job->price_type == 'monthly' && $get_job->day_hours == $i ) ? 'selected' : '' ?>  value="{{$i}}">Everyday {{$i}} hours</option>
                                            <?php } ?>
                                        </select>
                                 </span>
                             </div>
                            </div>
                        </div>


                    </div>


                    <div class="workttse222 v1">
                        <p class="workttsw"><b> What level of experience should your freelancer have?  </b></p>
                        <div class="container">
                            <div class="form cf">
                                <section class="payment-plan cf">
                                    <input  type="radio" required="required" <?php echo ($get_job) ? ($get_job->experience == 'entry')? 'checked= "checked"' : '' : '' ?> name="experience" id="entry" value="entry">
                                    <label  class="monthly-label four col" for="entry" ><span class="sl-icon icon-user-follow"></span><p class="hireup">Entry Level </p></label>

                                    <input type="radio" required="required" <?php echo ($get_job) ? ($get_job->experience == 'intermediate') ? 'checked= "checked"' : '' : '' ?>  name="experience" id="intermediate" value="intermediate">
                                    <label class="yearly-label four col" for="intermediate" ><span class="sl-icon icon-menu"></span><p class="hireup">Intermediate Level</p></label>

                                     <input type="radio" required="required" <?php echo ($get_job) ? ($get_job->experience == 'expert') ? 'checked= "checked"' : '' : '' ?>  name="experience" id="expert" value="expert">
                                    <label class="yearly-label four col" for="expert" >$$$<p class="hireup">Expert Level</p></label>
                                </section>
                            </div>
                        </div>
                    </div>
 
                </div>
                <div class="cattwork">
                    <b class="cattworks">Additional Options (Optional)</b><br>
                    
                    <p>Add screening questions and/or require a cover letter</p>
                    
                </div>
                <div class="downloadtheme5">
                    <a href="{{url('dashboard/workplace/job-post/'.$get_job->job_title_slug.'/step/5')}}" class="button mid tertiary half v3">Back</a><br>
                    <button type="submit" class="button mid secondary wicon half  v3">Next</button><br>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- PACK BOXES -->
            <!-- /PACK BOXES -->
        </form>
            <div class="clearfix"></div>    

        </div>
        <!-- DASHBOARD CONTENT -->
@endsection
@section('js')

<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>   


<script type="text/javascript">
@if($get_job)
    hideShow("{{$get_job->price_type}}");
@endif
function hideShow(value){

    if(value == 'fixed'){
        $('#day').show();
        $('#daily').hide();
    }
    if(value == 'monthly'){
         $('#day').hide();
        $('#daily').show();
    }
}
</script>
 @endsection

