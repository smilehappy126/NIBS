@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

@stop

@section('content')
<div class="container">

  @foreach ($classrooms as $classroom)
    <div class="panel panel-default">
       <div class="panel-heading">{{ $classroom->roomname }}</div>
       <div class="panel-body">{{ $classroom->word }}  <img src="{{ $classroom->imgurl }}" height="200" width="400"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
           修改
        </button>

 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ asset('/newclassroom') }}" id="editword" method="post">
       {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $classroom->roomname }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea  class="form-control" rows="5" name="word"> {{ $classroom->word }}  </textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="editword">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

       </div>
    </div>
    <!-- <form action="{{ asset('newclassroom/'.$classroom->roomname.'/edit') }}" method="GET">
       <button type="submit" id="edit-classroom-{{ $classroom->roomname }}">
           修改
        </button>
    </form>	 -->
  @endforeach

 <form action="{{ asset('/newclassroom') }}" method="POST">
 	    {{ csrf_field() }}
    <div class="form-group">
       <label for="classid">教室名稱或編號:</label>
       <input type="text" class="form-control" id="classid" name="roomname">
    </div>
    <div class="form-group">
       <label for="classword">教室位置、設備、軟體描述:</label>
       <input type="text" class="form-control" id="classword" name="word">
    </div>
        <div class="form-group">
       <label for="classpic">教室照片路由:</label>
       <input type="text" class="form-control" id="classpic" name="imgurl">
    </div>
    <div>
        <button class="btn btn-primary" type="submit">送出</button>
    </div>
  </form>



</div>
@endsection

@section('js')
@stop