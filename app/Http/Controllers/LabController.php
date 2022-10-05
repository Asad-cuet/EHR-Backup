<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consultation;
use App\Models\Test;
use App\Models\Exam;

class LabController extends Controller
{
    public function lab()
    {
        $lab=consultation::where('is_on_exam',1)->where('is_examed',0)->orderBy('updated_at','desc')->get();
        $lab_data=collect($lab)->map(function($item,$key)
        {
            return [
                'id'=>$item['id'],
                'patient_id'=>$item['id'],
                'consulted_by'=>$item['id'],
                'patient_name'=>$item->patient->name,
                'patient_phone'=>$item->patient->phone,
                'doctor_name'=>$item->doctor->name,
                 ];
        });
        
        return view('pages.lab.lab_list',['lab_data'=>$lab_data]);
    }


    public function lab_view(Request $request,$consultation_id)
    {
        $lab=consultation::where('is_on_exam',1)->where('id',$consultation_id)->first();
        $test=Exam::where('consultation_id',$consultation_id)->get();

        
        return view('pages.lab.lab_view',['lab'=>$lab,'test'=>$test]);
    }


    public function submit_report(Request $request,$consultation_id)
    {
        $image_array=$request->file('image');
        if(empty($image_array))
        {
            return redirect()->back()->with('status',"Can't submitted empty");
        }
        $imgae_qnt=count($image_array);

        $test_id_array=$request->input('test_id');
        $test_id_qnt=count($image_array);

        $total_test=Exam::where('consultation_id',$consultation_id)->count();

        


        if($imgae_qnt!=$test_id_qnt)
        {
               return redirect()->back()->with('status',"Submit report properly.");
        }
        else // some report submitted
        {
            for($i=0;$i<$test_id_qnt;$i++)
            {
                if($image_array[$i])       
                {
        
                     
                     $file=$image_array[$i];
                     $extention=$file->getClientOriginalExtension();  
                     if(array_search($extention,['jpg','png','jpeg','gif','pdf']))
                     {
                          $filename=time().'.'.$extention;
                          $file->move('assets/report/',$filename);  
                          $data=[
                            'report'=>$filename
                          ];
                          Exam::where('consultation_id',$consultation_id)->where('test_id',$test_id_array[$i])->update($data);
                        //   if($file)
                        //   {
                        //        $old_logo=Exam::where('id',1)->first()->logo;
                        //        $old_image='assets/report/'.$old_logo;
                        //        if(File::exists($old_image))
                        //        {
                        //             File::delete($old_image);
                        //        }
                        //   }
        
                     }
                     else
                     {
                          return back()->with('status', $extention.' file is not allowed.Only pdf and image file is allowed');
                     }
                     
                }
            }
            
            $submitted_before=$total_test-Exam::where('consultation_id',$consultation_id)->where('report',null)->count();

            if($submitted_before==$total_test) //all report submitted together
            {
                $data=[
                    'is_on_exam'=>0
                    // 'is_examed'=>0
                ];
                consultation::where('id',$consultation_id)->update($data);
                return redirect(route('lab'))->with('status', "All Report Submitted Successfully");
            }
            else
            {
                return redirect(url('/lab-view/'.$consultation_id))->with('status',$imgae_qnt."Report Submitted Successfully");
            }

        }




        
    }


}
