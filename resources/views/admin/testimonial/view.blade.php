@extends('layouts.app')
@section('view-page')
<div class="container">  
    <div class="row">
    <div class="col-md-8">
        <h2 class="bg bg-primary text-center" style='padding:10px 0'>Testimonial Information</h2>
        <table class="table table-bordered">
        <thead>
          <tr>
             <th>#</th>
            <th>Testimonial Title</th>
            <th>Testimonial Details</th>
            <th>Testimonial Photo</th>
            <th>Testimonial Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($testimonial_info as $testimonial)
            <tr>
                <td>{{$testimonial->id}}</td>
                <td>{{$testimonial->testimonal_author}}</td>
                <td>{{ str_limit($testimonial->testimonal_details,20)}}</td>
                <td><img style="height:50px;width:100px" src="{{asset('/storage')}}/{{$testimonial->testimonal_image}}"></td>
                
                <td>
                     @if($testimonial->testimonal_status==1)
                        <span style="background-color:green;padding:4px 14px;border-radius:4px;color:white">Actived</span>
                    @else
                        <span style="background-color:red;padding:4px 6px;border-radius:4px;color:white">Dectived</span> 
                    @endif
                    
                </td>
                <td>
                     @if($testimonial->testimonal_status==1)
                    <a href="{{url('/admin/testimonial/deactive')}}/{{$testimonial->id}}">Dective</a>
                    @else
                       <a href="{{url('/admin/testimonial/active')}}/{{$testimonial->id}}">Active</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
      </table> 
        <br>
        <h6 style="width:20%;margin:auto">{{$testimonial_info->links()}}</h6>
    </div>
        
            <div class="col-md-4">
             <div class="card"> 
                <h2 class="bg bg-primary text-center " style='padding:10px 0'>Add Testimonial Info</h2>
                <div class="container-fluid"> 
                    <form method="post" action="{{url('/admin/testimonial/submit')}}" enctype="multipart/form-data">
                    @csrf
                    <!--sucessful message sends-->
                     @if(session('status2'))
                        <div class="alert alert-success">{{session('status2')}}</div>
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
                      <input type="text" class="form-control" placeholder="Enter Testimonial Author"  name="testimonal_author"> 
                    </div>
                     <div class="form-group"> 
                      <textarea class="form-control" placeholder="Enter Testimonial  details"  name="testimonal_details"></textarea>
                    </div>
                    <div class="form-group"> 
                      <input type="file" class="form-control" placeholder="Testimonial Photo"  name="testimonal_image"> 
                    </div>
                    <button type="submit" class="btn btn-primary" style='margin-bottom:10px'>Add Testimonial</button>
                  </form>
                    <br>                  
                </div>
           </div>
        </div>

    </div>
</div>
@endsection

