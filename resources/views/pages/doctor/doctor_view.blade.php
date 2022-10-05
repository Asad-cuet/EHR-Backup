@extends('layout.lay')

@section('title','Patient View')
@section('content')


<div class="" style="width:100%;max-width:700px;margin:auto">
<h3 class="">Doctor's Details</h3>
<form method="POST" action="{{url('/update-doctor/'.$doctor->id)}}">
      @csrf

            <div class="row">
              <div class="col">
                    <select required class="form-select" name="department_id" aria-label="Default select example">
                          <option value="0" selected>Select Department (Required)</option>
                          @foreach ($departments as $item)
                                <option value="{{$item['id']}}" @if($doctor->department_id==$item['id']) selected @endif>
                                      {{$item['name']}} 
                                </option>               
                          @endforeach
                    </select>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col">
                <input required type="text" name="name" value="{{$doctor->user->name}}" class="form-control" placeholder="Full Name" aria-label="First name">
              </div>
              <div class="col">
                <input required type="email" name="email" value="{{$doctor->user->email}}" class="form-control" placeholder="Email" aria-label="First name">
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col">
                <input required type="text" name="specialization" value="{{$doctor->specialization}}" class="form-control" placeholder="Specializaton" aria-label="First name">
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col">
                <input required type="text" name="qualification" value="{{$doctor->qualification}}" class="form-control" placeholder="Qualification" aria-label="First name">
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col">
                <input required type="number" name="phone" value="{{$doctor->phone}}" class="form-control" placeholder="Phone" aria-label="First name">
              </div>
        </div>
        <br>
        <div class="text-center">
              <button type="submit" class="btn btn-primary">Update</button>
        </div>
      
</form>
      
<br>

</div>




@endsection