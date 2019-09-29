@extends('backend.layouts.master')

@section('title', 'Submit job proposal')

@section('css')
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">

<style>
.up-items33 {
    float: left;
    /* position: static; */
    width: 30%;
    /* margin-left: 23px; */
}

#toolbar [data-wysihtml5-action] {
float: right;
}

#toolbar,
textarea {
width: 100%;
padding: 5px;
-webkit-box-sizing: border-box;
-ms-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

textarea {
height: 400px;
border: 1px #b2b2b2 solid;
font-family: Verdana;
font-size: 14px;
padding: 5px;
}

textarea:focus {
color: black;
border: 2px solid black;
padding: 5px;
}

.wysihtml5-command-active {
font-weight: bold;
}

[data-wysihtml5-dialog] {
    margin: -50px 0 0;
    padding: 5px;
    border: 1px solid #999999;
    position: relative;
    background-color: white;
}

a[data-wysihtml5-command-value="red"] {
color: red;
}

a[data-wysihtml5-command-value="green"] {
color: green;
}

a[data-wysihtml5-command-value="blue"] {
color: red;
}
  
  
.gig-edit-toolbar {
    height: 40px;
    border: 1px #ddd solid;
    padding-bottom: 46px !important;
}
.gig-edit-toolbar .toolbar-btn {
    float: left;
    position: relative;
    width: 40px;
    height: 40px;
    text-indent: -9999px;
    border-right: 1px #ddd solid;
    background: 0 0;
    cursor: pointer;
}
.gig-edit-toolbar .toolbar-btn:before {
    content: '';
    width: 40px;
    height: 40px;
    position: absolute;
    top: 0;
    left: 0;
    background: url({{asset('/allscript')}}/e/hlbg.png) 0 0 no-repeat;
}
.gig-edit-toolbar .toolbar-btn.bold:before {
    background-position: -1px 10px;
}
.gig-edit-toolbar .toolbar-btn.ul:before {
    background-position: -43px 10px;
}
.gig-edit-toolbar .toolbar-btn.ol:before {
    background-position: -84px 10px;
}
.gig-edit-toolbar .toolbar-btn.strong:before {
    background-position: -128px 10px;
}
.gig-edit-toolbar .toolbar-btn.italic:before {
    background-position: -169px 10px;
}
.gig-edit-toolbar .toolbar-btn.link:before {
    background-position: -341px 10px;
}
.gig-edit-toolbar .toolbar-btn.unlink:before {
    background-position: -384px 10px;
}
.gig-edit-toolbar .toolbar-btn.image:before {
    background-position: -213px 10px;
}
.gig-edit-toolbar .toolbar-btn.image:before {
    background-position: -213px 10px;
}
.gig-edit-toolbar .toolbar-btn.h1:before {
    background-position: -255px 10px;
}
.gig-edit-toolbar .toolbar-btn.h2:before {
    background-position: -300px 10px;
}
.gig-edit-toolbar .toolbar-btn.h3:before {
    background-position: -852px 10px;
}
.gig-edit-toolbar .toolbar-btn.code:before {
    background-position: -425px 10px;
}
.gig-edit-toolbar .toolbar-btn.view:before {
    background-position: -765px 10px;
}
.gig-edit-toolbar .toolbar-btn.undo:before {
    background-position: -639px 10px;
}
.gig-edit-toolbar .toolbar-btn.redo:before {
    background-position: -681px 10px;
}
.gig-edit-toolbar .toolbar-btn.left:before {
    background-position: -509px 10px;
}
.gig-edit-toolbar .toolbar-btn.center:before {
    background-position: -551px 10px;
}
.gig-edit-toolbar .toolbar-btn.right:before {
    background-position: -595px 10px;
}
.gig-edit-toolbar .toolbar-btn.underline:before {
    background-position: -723px 10px;
}
.gig-edit-toolbar .toolbar-btn.hr:before {
    background-position: -808px 10px;
}


.gig-edit-toolbar .toolbar-btn:hover, .gig-edit-toolbar .toolbar-btn.wysihtml5-command-active {
    background-color: #f4f4f4;
    box-shadow: 2px 2px 6px #ccc inset;
}
.gig-edit-editor-wrap.inside {
    height: 360px;
    box-shadow: inset 2px 2px 2px #e3e3e3;
}
.textarea-input-requirements {
    font-size: 12px;
    line-height: 120%;
    color: #999;
    padding-top: 5px;
}
code {
    background: #ddd;
    padding: 10px;
    white-space: pre;
    display: block;
    margin: 1em 0;
}
.cf {
    zoom: 1;
}
.rf {
    float: right;
}
.lf {
    float: left;
}

.ttinput-groupg {
    width: 77%;
    float: right;
}
</style>
@endsection

@section('content')
<?php $user_id = Auth::user()->id ; ?>
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
           

            <div class="hotlancer-work">
                    <h3 class="up-post-sub">Work Description</h3>
                    <div class="up-sub-mainup">
                        <p style="color: green;padding-left: 10px;">{{Session::get('success')}}</p>
                        <p style="color: red;padding-left: 10px;">{{Session::get('error')}}</p>
                    <form action="{{url('dashboard/workplace/insert-workdsc')}}" id="submit" method="post">{{csrf_field()}}
                       
                        <!-- update for proposal -->
                        <input type="hidden" name="order_id" value="{{$get_order->order_id}}">
                    </form>
                        <textarea form="submit" id="textarea" required="required" name="work_description" placeholder="Write your work descrtion ..."></textarea>
                            <div id="toolbar" class="gig-edit-toolbar" style="display: block;">
                                <a class="toolbar-btn bold" data-wysihtml5-command="bold" title="CTRL+B"></a>
                                <a class="toolbar-btn ul" data-wysihtml5-command="insertUnorderedList" title="CTRL+I"></a>
                                <a class="toolbar-btn ol" data-wysihtml5-command="insertOrderedList"></a>
                                <a class="toolbar-btn strong" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></a>
                                <a class="toolbar-btn italic" data-wysihtml5-command="italic" title="CTRL+I"></a>
                                <a class="toolbar-btn left" data-wysihtml5-command="justifyLeft" title="Align left"></a>
                                <a class="toolbar-btn center" data-wysihtml5-command="justifyCenter" title="Align Center"></a>
                                <a class="toolbar-btn right" data-wysihtml5-command="justifyRight" title="Align Right"></a>        
                                <a class="toolbar-btn undo" data-wysihtml5-command="undo" title="Undo"></a>
                                <a class="toolbar-btn redo" data-wysihtml5-command="redo" title="Redo"></a>
                                
                                <a class="toolbar-btn view" data-wysihtml5-action="change_view" title="Switch to html view"></a>
                                
                                <div data-wysihtml5-dialog="createLink" style="display: none;">
                                  <label>
                                    Link:
                                    <input data-wysihtml5-dialog-field="href" value="http://">
                                  </label>
                                  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
                                </div>
                            
                                <div data-wysihtml5-dialog="insertImage" style="display: none;">
                                  <label>
                                    Image:
                                    <input data-wysihtml5-dialog-field="src" value="http://">
                                  </label>
                                  <label>
                                    Align:
                                    <select data-wysihtml5-dialog-field="className">
                                      <option value="">default</option>
                                      <option value="wysiwyg-float-left">left</option>
                                      <option value="wysiwyg-float-right">right</option>
                                    </select>
                                  </label>
                                  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
                                </div>
                            </div>
                            <div class="textarea-input-requirements cf"><span class="char-counter rf ">1090/1200 Characters</span><span class="lf ">min. 120</span></div>

                            
                            <div id="log" style="display: none;"></div>
                        <br/><br/>

                        <label class="rl-label required">Attach work files</label>
                        <div class="up-box up-drop">
                          <label class="rl-label required" style="padding-top:15px; cursor: pointer;" for="proposal_dsc"> upload project files </label>
                          <input type="file " form="submit" style="display: none;cursor: pointer; " id="proposal_dsc" name="proposal_file">
                        </div>
                        
                        <div class="clearfix"></div>
                        <hr class="line-separator">
                        <button type="submit" form="submit" class="button big dark">Submit Item <span class="primary">for Review</span></button>
                        
                    </div>
                
            </div>

            <div class="clearfix"></div>            

            <!-- FORM BOX ITEMS -->
            <!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->

@endsection


@section('js')
    <!-- /SVG MINUS -->
<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>   


<script src="{{asset('/allscript')}}/js/advanced.js"></script>
<script src="{{asset('/allscript')}}/js/wysihtml.js"></script>

<script>
  var editor = new wysihtml5.Editor("textarea", {
    toolbar:        "toolbar",
    stylesheets:    "{{asset('/allscript')}}/e/1.css",
    parserRules:    wysihtml5ParserRules
  });
  
  var log = document.getElementById("log");
  
  editor
    .on("load", function() {
      log.innerHTML += "<div>load</div>";
    })
    .on("focus", function() {
      log.innerHTML += "<div>focus</div>";
    })
    .on("red", function() {
      log.innerHTML += "<div>blur</div>";
    })
    .on("change", function() {
      log.innerHTML += "<div>change</div>";
    })
    .on("paste", function() {
      log.innerHTML += "<div>paste</div>";
    })
    .on("newword:composer", function() {
      log.innerHTML += "<div>newword:composer</div>";
    })
    .on("undo:composer", function() {
      log.innerHTML += "<div>undo:composer</div>";
    })
    .on("redo:composer", function() {
      log.innerHTML += "<div>redo:composer</div>";
    });
</script>

 @endsection