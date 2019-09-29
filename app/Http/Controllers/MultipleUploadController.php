<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
class MultipleUploadController extends Controller
{
    function index()
    {
     return view('frontend/multiple_file_upload2');
    }

//     function upload(Request $request)
//     {

//       $user_id = Auth::user()->id;
//      // $image_code = '';
//      $image = $request->file('uploadFile');
  
//       $new_name = rand() . '.' . $image->getClientOriginalExtension();
//       $image->move(public_path('theme-files'), $new_name);
      
//      //  $image_code = '<div class="col-md-3" style="margin-bottom:24px;"><img src="/images/'.$new_name.'" class="img-thumbnail" /></div>';

//       DB::table('gig_images')->insert(['image_path' => $new_name, 'gig_id' => 4, 'user_id' => $user_id]);
    
//      // // $output = array(
//      // //  'success'  => 'Images uploaded successfully',
//      // //  'image'   => $image_code
//      // // );

//      // // return response()->json($output);
// echo '<a href="'.$new_name.'" rarget="_blank"/><i class="fa fa-paperclip" aria-hidden="true"></i> '.$new_name.' </a>';
   
//     }
function upload(Request $request)
    {
     $rules = array(
      'uploadFile'  => 'required|max:2048'
     );

     $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
        return response()->json(['errors' => $error->errors()->all()]);
     }

     $uploadFile = $request->file('uploadFile');

     $new_name = rand() . '.' . $uploadFile->getClientOriginalExtension();
     $uploadFile->move(public_path('theme/zipfile'), $new_name);

     $output = array(
         'success' => '<a href="#" onclick="remove_file('.$new_name.')" class="button dark-light square">
                <img src="'.asset('/allscript/images/dashboard/close-icon-small.png').'" alt="close-icon">
              </a>',
         'image'  => '<input type="hidden" form="main_form" name="main_image" value="'.$new_name.'"><a href="'.$new_name.'" rarget="_blank"/><i class="fa fa-paperclip" aria-hidden="true"></i> '.$new_name.' </a>'
        );

      return response()->json($output);
    }

    function action(Request $request)
    {
    // $get_user_id = Auth::user()->id; 
    //  $images = $request->file('file');
    //  foreach ($images as $image) {

    //             $image_name = rand('123456', '999999').$image->getClientOriginalName();

    //             $image_path = public_path('gigimages/'.$image_name );
    //             Image::make($image)->save($image_path);
                
    //             $data = [
    //                 'gig_id' => $request->gig_id,
    //                 'user_id' => $get_user_id,
    //                 'image_path' => $image_name
    //             ];

    //            $succcess = gig_image::create($data);
    //         }

          echo $request->fasd;

    }
}