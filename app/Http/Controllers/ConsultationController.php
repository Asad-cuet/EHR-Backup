<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consultation;
use App\Models\Prescribe;
use App\Models\Test;
use App\Models\Exam;
use App\Models\ClinicalHistory;
class ConsultationController extends Controller
{
    public function consultations()
    {
        $consultations=consultation::where('is_on_exam',0)->where('is_examed',0)->orderBy('updated_at','desc')->get();
        $consultations=collect($consultations)->map(function($item,$key)
        {
            $patient_name=$item->patient->pre_name.' '.$item->patient->fname;
            return [
                'id'=>$item['id'],
                'patient_id'=>$item['id'],
                'consulted_by'=>$item['id'],
                'patient_name'=>$patient_name,
                'patient_phone'=>$item->patient->phone,
                'doctor_name'=>$item->doctor->user->name,
                 ];
        });
        
        return view('pages.consultation.consultation_list',['consultations'=>$consultations]);

    }

    public function consultation_status($id)
    {
        $consultation=consultation::where('id',$id)->first();
        $test=Exam::where('consultation_id',$id)->get();
        $history=ClinicalHistory::where('patient_id',$consultation->patient_id)->first();
        
        return view('pages.consultation.consultation_status',['consultation'=>$consultation,'test'=>$test,'history'=>$history]);

    }

    public function problem($consultation_id)
    {
        $consultation=consultation::where('id',$consultation_id)->first();
        return view('pages.consultation.action.problem',['consultation_id'=>$consultation_id,'consultation'=>$consultation]);
    }
    public function submit_problem(Request $request,$consultation_id)
    {
        $data=[
            'problem_details'=>$request->input('problem_details'),
            'problem_duration'=>$request->input('problem_duration')
        ];
        consultation::where('id',$consultation_id)->update($data);
        return redirect(route('consultations'))->with('status','Problem Details Submited Successfully');
    }


    public function exam($consultation_id)
    {
        $tests=Test::all();
        return view('pages.consultation.action.exam',['consultation_id'=>$consultation_id,'tests'=>$tests]);
    }
    public function submit_exam(Request $request,$consultation_id)
    {
        $test_id=$request->input('test');
        $t_num=count($test_id);

        //dd($test_id);
        for($i=0;$i<$t_num;$i++)
        {
            $data=[
                    'consultation_id'=>$consultation_id,
                    'test_id'=>$test_id[$i]
            ];
            Exam::create($data);
        }    
        $consult=consultation::where('id',$consultation_id)->first();
        $consult->is_on_exam=1;
        $consult->update();

            return redirect(route('consultations'))->with('status','Exam Added Successfully');
    }




    public function prescribe($consultation_id)
    {
        $consultation=consultation::where('id',$consultation_id)->first();
        return view('pages.consultation.action.prescribe',['consultation_id'=>$consultation_id,'consultation'=>$consultation]);
    }


    public function submit_prescribe(Request $request,$consultation_id)
    {
        $title=$request->input('title');
        $comment=$request->input('comment');
        $m_num=count($title);
        $c_num=count($comment);
        if($m_num!=$c_num)
        {
            return redirect()->back()->with('status',"No Field can't be empty");
        }
        else
        {
            for($i=0;$i<$m_num;$i++)
            {
                $data=[
                        'consultation_id'=>$consultation_id,
                        'title'=>$title[$i],
                        'comment'=>$comment[$i]

                ];
                Prescribe::create($data);
            }
          //  dd($all_data);
            
            return redirect(route('consultations'))->with('status','Prescribe Added Successfully');
        }
        
    }


}
