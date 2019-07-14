@extends('layouts.app')
@section('singleview-page')
<div class="container col-md-6">  
    <h2>Single View </h2>
  <table class="table table-bordered">
    <thead>
      <tr>
         <th>#</th>
         <th>{{$old_info->id}}</th>
      </tr>
        <tr> 
            <th>Sender Name : </th>  
            <th>{{$old_info->sender_name}}</th>
      </tr>
      <tr>
          <th>Sender Email : </th>
          <th>{{$old_info->sender_email}}</th>
      </tr>
      <tr>
          <th>Sender Messages : </th>
          <th>{{$old_info->sender_message}}</th>
      </tr>
      <tr> 
            <th>Send At : </th>
            <th>{{$old_info->created_at->diffForHumans()}}</th>
      </tr>
    
    </thead>
 
  </table>
    
 <a href="{{url('/contact/message/view')}}" class="btn btn-primary">Back</a>
   
      
</div>
@endsection