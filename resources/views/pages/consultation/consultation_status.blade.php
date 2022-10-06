@extends('layout.lay')

@section('title','Patients')
@section('content')


<div class="row">
      <div class="col">
      <ul class="list-group">
            <li class="list-group-item bg-info" aria-current="true">Patient Basic Information</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->patient->pre_name}} {{$consultation->patient->fname}} {{$consultation->patient->lname}} </li>
            <li class="list-group-item"><b>Gender : </b>{{$consultation->patient->gender}} </li>
            <li class="list-group-item"><b>Age : </b>{{$consultation->patient->age}} </li>
            <li class="list-group-item"><b>Height : </b>{{$consultation->patient->height}} Fit</li>
            <li class="list-group-item"><b>Wight : </b>{{$consultation->patient->weight}} Kg</li>
            <li class="list-group-item"><b>Phone : </b>{{$consultation->patient->phone}} </li>
            <li class="list-group-item"><b>Address : </b>{{$consultation->patient->address}} </li>
            <li class="list-group-item"><b>Guardian Phone : </b>{{$consultation->patient->guardian_phone}} </li>

            <li class="list-group-item bg-secondary text-white" aria-current="true">Consulting By</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->doctor->name}} </li>
            <li class="list-group-item"><b>Subject : </b>{{$consultation->doctor->subject}} </li>
      </ul>
      </div>
      <div class="col">
            <ul class="list-group">

                  <li class="list-group-item bg-dark text-white" aria-current="true">History</li>
                  <li class="list-group-item"><b>Primary Admitting Diagnosis : </b>{{$history->primary_admitting_diagnosis}} </li>
                  <li class="list-group-item"><b>Permanant history : </b>{{$history->permanant_history}} </li>
                  <li class="list-group-item"><b>Previous Medical History : </b>{{$history->previous_medical_history}} </li>
                  <li class="list-group-item"><b>Surgical History : </b>{{$history->surgical_history}} </li>
                  <li class="list-group-item"><b>Smoker : </b>{{$history->smoker}} </li>
                  <li class="list-group-item"><b>Diabetes : </b>{{$history->diabetes}} </li>
                  <li class="list-group-item"><b>Heart Rate : </b>{{$history->heart_rate}} </li>
                  <li class="list-group-item"><b>BP Systole : </b>{{$history->bp_systole}} </li>
                  <li class="list-group-item"><b>BP Diastole : </b>{{$history->bp_diastole}} </li>
                  <li class="list-group-item"><b>Oxygen Seturation : </b>{{$history->oxygen_seturation}} </li>
                  <li class="list-group-item"><b>Pain On Scale : </b>{{$history->pain_on_scale}} </li>
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
                        <a href="{{url('/lab-resend/'.$item->id.'/'.$item->consultation_id)}}" onclick="return confirm('Are You Sure?')" class="badge btn btn-danger" rel="noopener noreferrer">Re Send to Lab</a> 
                        
                        
                        {{-- lab comment section start --}}
                        <div class="mt-3">
                              @if($item->comment)
                              <b>Comment From Laboratory:</b>{{$item->comment}}
                              @endif
                        </div>
                        {{-- doctors section start --}}
                        <div class="">
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
                                                <input type="text" name="comment" placeholder="Left a comment.." class="form-control">
                                                
                                    </div>
                                    <div class="col-4">
                                                <button type="submit" class="btn btn-secondary">Comment</button>
                                          </form>
                                    </div>
                              </div>


                        </div>

                  @else
                       <div class="">Didn't Submitted Yet</div>
                  @endif
                  
                  
            </li>
      @endforeach

      <li class="list-group-item bg-success text-white" aria-current="true">Final Result</li>
      <li class="list-group-item">Normal </li>
</ul>

<br>
<br>
<br>

@endsection