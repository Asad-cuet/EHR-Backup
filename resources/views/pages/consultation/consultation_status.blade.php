@extends('layout.lay')

@section('title','Patients')
@section('content')

@if(!$consultation->exam_result)
<div class="alert alert-danger">
  You didn't give your <strong>Final Statement</strong> yet.
</div>

@else
<div class="alert alert-info">
You gave your <strong>Final Statement</strong> 
</div>
@endif



<div class="row">
      <div class="col">
      <ul class="list-group">
            <li class="list-group-item bg-info" aria-current="true">Patient Basic Information</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->patient->pre_name}} {{$consultation->patient->fname}} {{$consultation->patient->lname}} </li>
            <li class="list-group-item"><b>Gender : </b>{{$consultation->patient->gender}} </li>
            <li class="list-group-item"><b>Age : </b>{{$consultation->patient->age}} </li>
            <li class="list-group-item"><b>Height : </b>{{$consultation->patient->height}} (Fit.inchi)</li>
            <li class="list-group-item"><b>Wight : </b>{{$consultation->patient->weight}} Kg</li>
            <li class="list-group-item"><b>Phone : </b>{{$consultation->patient->phone}} </li>
            <li class="list-group-item"><b>Address : </b>{{$consultation->patient->address}} </li>
            <li class="list-group-item"><b>Guardian Phone : </b>{{$consultation->patient->guardian_phone}} </li>

            <li class="list-group-item bg-secondary text-white" aria-current="true">Consulting By</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->doctor->user->name}} </li>
            <li class="list-group-item"><b>Department : </b>{{$consultation->doctor->department->name}} </li>
      </ul>
      </div>
      <div class="col">
            <ul class="list-group">

                  <li class="list-group-item bg-dark text-white" aria-current="true">History</li>
                  <li class="list-group-item"><b>Primary Admitting Diagnosis : </b>{{$history->primary_admitting_diagnosis}} </li>
                  <li class="list-group-item"><b>Permanant History : </b>{{$history->permanant_history}} </li>
                  <li class="list-group-item"><b>Previous Medical History : </b>{{$history->previous_medical_history}} </li>
                  <li class="list-group-item"><b>Surgical History : </b>{{$history->surgical_history}} </li>
                  <li class="list-group-item"><b>Smoker : </b>@if($history->smoker==1) Yes @else No @endif </li>
                  <li class="list-group-item"><b>Diabetes : </b>@if($history->diabetes==1) Yes @else No @endif </li>
                  <li class="list-group-item"><b>Heart Rate : </b>{{$history->heart_rate}} </li>
                  <li class="list-group-item"><b>BP Systole : </b>{{$history->bp_systole}} </li>
                  <li class="list-group-item"><b>BP Diastole : </b>{{$history->bp_diastole}} </li>
                  <li class="list-group-item"><b>Oxygen Seturation : </b>{{$history->oxygen_seturation}} </li>
                  <li class="list-group-item"><b>Pain On Scale : </b>@if($history->pain_on_scale==1) Yes @else No @endif </li>
            </ul>
      </div>
</div>

<br>
<ul class="list-group">

      <li class="list-group-item bg-danger text-white" aria-current="true">Problem</li>
      <li class="list-group-item"><b>Details : </b>{{$consultation->problem_details}} </li>
      <li class="list-group-item"><b>Duration : </b>{{$consultation->problem_duration}} </li>

      <li class="list-group-item bg-warning text-white" aria-current="true">Doctor's Prescription</li>
      @foreach ($consultation->prescribe as $item)
      <li class="list-group-item"><b>{{$item['title']}} : </b> {{$item['comment']}}</li>
      @endforeach
      


      <li class="list-group-item active" aria-current="true">Given Test</li>
      @foreach ($test as $item)
            <li class="list-group-item">
                  
                  <h5>{{$item->test->test_name}} : </h5>
                  @if(!empty($item->report))
                        <a href="{{asset('assets/report/'.$item->report)}}" class="badge btn btn-dark" target="_blank" rel="noopener noreferrer">View</a>  
                        @if($item->is_resent==0 && $item->is_once_sent_to_consult==1)
                        <a href="{{url('/lab-resend/'.$item->id.'/'.$item->consultation_id)}}" onclick="return confirm('Are You Sure?')" class="badge btn btn-danger" rel="noopener noreferrer">Re Send to Lab</a> 
                        @endif
                        
                        {{-- lab comment section start --}}
                        <div class="mt-3">
                              @if($item->comment_from_lab)
                              <b>Comment From Laboratory: </b>{{$item->comment_from_lab}}
                              @endif
                        </div>
                        {{-- doctors to lab comment section start --}}
                        @if($consultation->is_on_exam)
                              @if($item->comment_from_doctor)
                              <b>Comment From You: </b>{{$item->comment_from_doctor}}
                              @endif
                              <div class="mt-3">
                                    <form action="{{url('/doctor-comment-to-lab/'.$item->id)}}" method="POST">
                                          @csrf
                                          <input type="text" name="comment_from_doctor_to_lab" placeholder="Write a comment if any">
                                          <button type="submit" class="btn btn-warning badge">@if($item->comment_from_doctor)Update Comment @else Comment @endif</button>
                                    </form>
                              </div>
                        @endif
                        {{-- doctors section start --}}
                        <div class="">
                              @if(!$consultation->is_on_exam)
                                    @if(count($comments)>0)
                                    
                                    @foreach ($comments as $com)
                                    @if( $item->id==$com->exam_id)
                                          <div class="mt-1 mb-1">
                                                {{$com->comment}} by 
                                                @if($com->doctor->user->id==Auth::user()->id) You 
                                                @else 
                                                <a href="{{url('/commented-doctor-view/'.$com->comment_by_doctor_id)}}">{{$com->doctor->user->name}} </a>
                                                @endif
                                          </div>   
                                          @endif                          
                                    @endforeach


                                    @endif    

                                    <div class="row">
                                          <div class="col-8">
                                                <form action="{{url('/doctor-comment/'.$item->id.'/'.$item->consultation_id)}}" method="post">
                                                      @csrf
                                                      <input type="text" name="comment" placeholder="This comment is readable only for doctor" class="form-control">
                                                      
                                          </div>
                                          <div class="col-4">
                                                      <button type="submit" class="btn btn-secondary">Comment</button>
                                                </form>
                                          </div>
                                    </div>

                              @endif    
                        </div>

                  @else
                       <div class="">Didn't Submitted Yet</div>
                  @endif
                  
                  
            </li>
      @endforeach

      <li class="list-group-item bg-success text-white" aria-current="true">Doctor's Final Statement</li>
      <li class="list-group-item">@if($consultation->exam_result){{$consultation->exam_result}} @else Didn't submitted yet @endif</li>
</ul>

<br>
<br>
<br>

@endsection