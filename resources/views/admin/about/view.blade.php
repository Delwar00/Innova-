@extends('layouts.app')
@section('view-page')
<div class="container">  
    <div class="row">
    <div class="col-md-8">
        <h2 class="bg bg-primary text-center" style='padding:10px 0'>About Information</h2>
        <table class="table table-bordered">
        <thead>
          <tr>
             <th>#</th>
            <th>About Title</th>
            <th>About Details</th>
            <th>About point</th>
             <th>About photos</th>
            <th>About Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($about_info as $about)
            <tr>
                <td>{{$about->id}}</td>
                <td>{{$about->about_title}}</td>
                <td>{{ str_limit($about->about_details,20)}}</td>
                <td>{{$about->about_point}}</td>
                <td><img style="height:50px;width:100px" src="{{asset('/storage')}}/{{$about->about_image}}"></td>
                <td>
                     @if($about->about_status==1)
                        <span style="background-color:red;padding:4px 6px;border-radius:4px;color:white">Deactived</span>
                    @else
                         <span style="background-color:green;padding:4px 14px;border-radius:4px;color:white">Actived</span>
                    @endif
                    
                </td>
                <td>
                     @if($about->about_status==1)
                    <a href="{{url('/admin/about/active')}}/{{$about->id}}">Active</a>
                    @else
                        --
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
      </table> 
        <br>
        <h6 style="width:20%;margin:auto">{{$about_info->links()}}</h6>
    </div>
        
            <div class="col-md-4">
             <div class="card"> 
                <h2 class="bg bg-primary text-center " style='padding:10px 0'>Add About Info</h2>
                <div class="container-fluid"> 
                <form method="post" action="{{url('/admin/about/submit')}}" enctype="multipart/form-data">
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
                      <input type="text" class="form-control" placeholder="Enter About title"  name="about_title"> 
                    </div>
                     <div class="form-group"> 
                      <textarea class="form-control" placeholder="Enter About details"  name="about_details"></textarea>
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter About point" name="about_point" >                
                    </div>
                    <div class="form-group">
                      <input type="file" class="form-control"  name="about_image" >                
                    </div>
                    <button type="submit" class="btn btn-primary" style='margin-bottom:10px'>Submit</button>
                  </form>
                    <br>
                    
                    
                </div>
           </div>
                <br>
            <div class="card"> 
                <h2 class="bg bg-primary text-center " style='padding:10px 0'>Add About Info Points</h2>
                <div class="container-fluid"> 
                <form method="post" action="{{url('/admin/about/point/submit')}}">
                    @csrf
                    <!--sucessful message sends-->
                     @if(session('status1'))
                        <div class="alert alert-success">{{session('status1')}}</div>
                     @endif
                   
                    <div class="form-group">
                        <select class='form-control' name='about_id'>
                            <option>---Select One---</option>
                            @foreach($about_info as $about)
                                <option value='{{$about->id}}'>{{$about->about_title}}</option>
                            @endforeach
                        </select>
                    </div>
                     
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter About point" name="point" >                
                    </div>
                    <button type="submit" class="btn btn-primary" name="lol" style='margin-bottom:10px'>Add Point</button>
                  </form>
                    <br>
                    
                    
                </div>
           </div>
        </div>

    </div>
</div>
@endsection