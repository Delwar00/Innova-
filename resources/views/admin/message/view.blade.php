@extends('layouts.app')
@section('view-page')
<div class="container">      
  <div class="bg bg-primary col-md-12 text-center" style="padding:10px 0"><h3>View Messages</h3></div>
  <table class="table table-bordered">
    <thead>
      <tr>
         <th>#</th>
        <th>Sender Name</th>
        <th>Sender Email</th>
        <th>Sender Messages</th>
        <th>Action</th>
        <th>Send At</th>
        <th>Updated At</th>
      </tr>
    </thead>
    <tbody>
        @forelse($all_message as $info)
        <tr>
          <td>{{$info->id}}</td>
          @if($info->message_status==1)
            <td style="background-color:green">{{$info->sender_name}}</td>
          @else
            <td style="background-color:red">{{$info->sender_name}}</td>
          @endif
          <td>{{$info->sender_email}}</td>
          <td>{{$info->sender_message}}</td>
          <td >
               
               @if($info->message_status==1)
                <a href="{{url('/contact/message/marksasread')}}/{{$info->id}}">Mark as Read</a> |
              @endif
              
              <a href="{{url('/contact/message/delete')}}/{{$info->id}}"><i class="fa fa-trash-o"></i></a> |
              <a href="{{url('/contact/message/update')}}/{{$info->id}}">Update</a> |
             <a href="{{url('/contact/message/single/view')}}/{{$info->id}}">View</a> |
          </td>
          <td>{{$info->created_at->diffForHumans()}}</td>
          <td>
              @if($info->updated_at)
              {{ $info->updated_at->diffForHumans()}}(Updated Once)
              @else 
              Not Updated yet
              @endif
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">
                <h4 class="text-center text-danger">There Is no value Available.</h4>
            </td>
        </tr>
        @endforelse

    </tbody>
  </table>
    
    <br>
    <h4 style="width:20%;margin:auto">{{$all_message->links()}}</h4>
   
    <div class="bg bg-primary col-md-12 text-center" style="padding:10px 0"><h3>Soft Deleted Messages</h3></div>
    <table class="table table-bordered">
    <thead>
      <tr>
         <th>#</th>
        <th>Sender Name</th>
        <th>Sender Email</th>
        <th>Sender Messages</th>
        <th>Action</th>
        <th>Send At</th>
        <th>Updated At</th>
      </tr>
    </thead>
    <tbody>
        @forelse($soft_delete_messages as $info)
        <tr>
          <td>{{$info->id}}</td>
          @if($info->message_status==1)
            <td style="background-color:green">{{$info->sender_name}}</td>
          @else
            <td style="background-color:red">{{$info->sender_name}}</td>
          @endif
          <td>{{$info->sender_email}}</td>
          <td>{{$info->sender_message}}</td>
          <td >
                <a href="{{url('/contact/message/restore')}}/{{$info->id}}">Restore</a> |
              
          </td>
          <td>{{$info->created_at->diffForHumans()}}</td>
          <td>
              @if($info->updated_at)
              {{ $info->updated_at->diffForHumans()}}(Updated Once)
              @else 
              Not Updated yet
              @endif
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">
                <h4 class="text-center text-danger">There Is no value Available.</h4>
            </td>
        </tr>
        @endforelse

    </tbody>
  </table>  
    
</div>
@endsection