@extends('layouts.app')
@section('update-page')
<!-- Contact Section -->
<div id="contact">
  <div class="container">
      <div class="col-md-8" style="width:80%;margin:auto">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form name="sentMessage" id="contactForm" novalidate method="post" action="{{ url('/contact/message/update/submit') }}">
             @csrf  
             
            <div class="form-group">
                <input type="text" id="name" name="sender_name" value="{{$old_info->sender_name}} {{old('sender_name')}}" class="form-control" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
                <input type="hidden" name="message_id" value="{{$old_info->id}}" class="form-control">
              </div>
           
              <div class="form-group">
                <input type="email" id="email" name="sender_email" value="{{$old_info->sender_email}} " class="form-control" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
           
          
          <div class="form-group">
              <textarea name="sender_message" id="message"  rows="3" class="form-control" required>
                  {{$old_info->sender_message}}
              </textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
           
          <button type="submit" class="btn btn-custom btn-lg">Update Information</button>
          </div>
        </form>
      </div>
    </div>
      <section>
@endsection