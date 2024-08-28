<!DOCTYPE html>
<html>
  <head> 
    <style type="text/css">

    .post_title{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
    }
    .div_center{
        text-align: center;
        padding: 30px;
    }
    lable{
        display: inline-block;
        width: 200px;   
    }
    </style>
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
    @include('admin.sidebar')

        <div class="page-content">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button>

                {{session()->get('message')}}

            </div>
            @endif
            <h1 class="post_title">Update Post</h1>

            <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                        <lable>Post Title</lable>
                        <input type="text" name="title" value="{{$post->title}}">
                    </div>
                    <div class="div_center">
                        <lable>Post Description</lable>
                        <textarea name="description">{{$post->description}}</textarea>
                    </div>
                    <div class="div_center">
                        <lable>Old image</lable>
                        <img style="margin:auto" hieght="100px" width="150px" src="/postimage/{{$post->image}}">

                    </div>
                    <div class="div_center">
                        <lable>UpdateImage</lable>
                        <input type="file" name="image" value="{{$post->image}}">
                    </div>
                    <div class="div_center">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>

            </form>

        </div>

      
      <!-- Sidebar Navigation end-->
        @include('admin.footer')
  </body>
</html>