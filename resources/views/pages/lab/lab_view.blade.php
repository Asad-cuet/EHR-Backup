@extends('layout.lay')

@section('title','Lab View')
@section('content')

<div class="row">
      <div class="col">
            <ul class="list-group">
                  
                  <li class="list-group-item active" aria-current="true">Patient Details</li>  
                  <li class="list-group-item" aria-current="true">Name: {{$lab->patient->name}}</li>  
                  <li class="list-group-item" aria-current="true">Gender: {{$lab->patient->gender}}</li>  
                  <li class="list-group-item" aria-current="true">Age: {{$lab->patient->age}}</li>  
                  <li class="list-group-item" aria-current="true">Weight: {{$lab->patient->weight}}</li>  
                  <li class="list-group-item" aria-current="true">Phone: {{$lab->patient->phone}}</li>  
            </ul>
      </div>
      <div class="col">
            <form action="{{url('/submit-report/'.$lab->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
            <ul class="list-group">
                  <li class="list-group-item bg-danger text-white" aria-current="true">Exam</li>
                  @foreach ($test as $item)
                  <li class="list-group-item">
                        <b>{{$item->test->test_name}}</b>
                        <div class="">
                              @if(empty($item->report))
                              <input type="file" name="image[]">
                              <input type="hidden" name="test_id[]" value="{{$item->test_id}}">
                              @else
                              <div class="badge bg-success">Submitted</div>

                              @endif
                        </div>
                  </li>
                  @endforeach  
                  <li class="list-group-item text-center" aria-current="true">
                  <button type="submit" class="btn btn-dark">Submit Report</button>      
                  </li>    
            </ul>
            </form>
      </div>
</div>


@endsection