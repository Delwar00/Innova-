@extends('layouts.app')
@section('construct-page')
<div class="lol" style="width:86%;margin:auto">  
    <div class="row">
    <div class="col-md-8">
        <h2 class="bg bg-primary text-center" style='padding:10px 0'>Construction Information</h2>
        <table class="table table-bordered">
        <thead>
          <tr>
            <th>Const Title</th>
            <th>Const Details</th>
            <th>Const Button</th>
             <th>Const photos</th>
            <th>const Renovation</th>
            <th>Const started</th>
            <th>Const Estimate</th>
            <th>Const Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_construct_message as $construct)
            <tr>
                <td>{{$construct->construct_title}}</td>
                <td>{{ str_limit($construct->construct_details,20)}}</td>
                <td>{{$construct->construct_button}}</td>
                <td><img style="height:50px;width:100px" src="{{asset('/storage')}}/{{$construct->construct_image}}"></td>
                <td>{{$construct->construct_renovation}}</td>
                <td>{{$construct->construct_started}}</td>
                <td>{{$construct->construct_free_estimate}}</td>
                <td>
                     @if($construct->construct_status==1)
                        <span style="background-color:red;padding:4px 6px;border-radius:4px;color:white">Deactived</span>
                    @else
                         <span style="background-color:green;padding:4px 14px;border-radius:4px;color:white">Actived</span>
                    @endif
                    
                </td>
                <td>
                     @if($construct->construct_status==1)
                    <a href="{{url('/admin/construction/active')}}/{{$construct->id}}">Active</a>
                    @else
                        --
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
      </table> 
        <br>
        <h6 style="width:20%;margin:auto">{{$all_construct_message->links()}}</h6>
        
        </div>
        
            <div class="col-md-4">
             <div class="card"> 
                <h2 class="bg bg-primary text-center " style='padding:10px 0'>Add construction Info</h2>
                <div class="container-fluid"> 
                <form method="post" action="{{url('/admin/construction/submit')}}" enctype="multipart/form-data">
                    @csrf
                    <!--sucessful message sends-->
                     @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                     @endif
                     <!--error-->
                       @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Construction title"  name="construct_title"> 
                    </div>
                     <div class="form-group"> 
                      <textarea class="form-control" placeholder="Enter Construction details"  name="construct_details"></textarea>
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Construction Button" name="construct_button" >                
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Construction Renovation" name="construct_renovation" >                
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Construction started" name="construct_started" >                
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Construction Estimate" name="construct_free_estimate" >                
                    </div>
                    <div class="form-group">
                      <input type="file" class="form-control"  name="construct_image" >                
                    </div>
                    <button type="submit" class="btn btn-primary" style='margin-bottom:10px'>Submit</button>
                  </form>
                    <br>                 
                </div>
           </div>
    </div>
    </div>
</div>
@endsection