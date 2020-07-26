@extends('layouts.master');

@section('title')
Admin | Todo List
@endsection

@section('content')     
<div class="row">
  <div class="col-md-12">
    <div class="card  card-tasks">
      <div class="card-header ">
        <h5 class="card-category">Todo List</h5>
      <a href="#add_task" data-toggle="modal" class="btn btn-primary pull-right">Add Task</a>
      </div>
      <div class="card-body ">
        <div class="table-full-width table-responsive">
          <table class="table">
            <tbody id="todolist">
     
         
            </tbody>
          </table>
        </div>
      </div>
      {{-- <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
        </div>
      </div> --}}
    </div>
  </div>
  
</div>
@include('todo.ajax.add');
@include('todo.ajax.edit');
@endsection
@section('scripts')
<script type="text/javascript">
function get_tasks()
{
  $.ajax({
                type: "GET",
                url: '{{URL::to("todo/gettasks")}}',
                // dataType: 'json',
                success: function(data){
                  $('#todolist').html("");
                  $('#todolist').html(data);
                }

            });
}
$(function(){
 
  get_tasks();


  $('#add_task_form').submit(function(event) {
    event.preventDefault();
// process the form
$.ajax({
    type        : 'POST',
    url: '{{URL::to("todo/save")}}',
    data: new FormData(this),
    dataType    : 'json', 
    processData: false,
    contentType: false,
success: function(data){
  $("#add_task_form")[0].reset();
  $('#add_task').modal('hide');
  get_tasks();
                }

              });
});
$('#update_task_form').submit(function(event) {
    event.preventDefault();
// process the form
var id=$('#id').val();
$.ajax({
    type : 'POST',
    url: "{{config('app.url')}}todo/update",
    data: new FormData(this),
    dataType    : 'json', 
    processData: false,
    contentType: false,
success: function(data){
  $("#update_task_form")[0].reset();
  $('#edit_task').modal('hide');
  get_tasks();
                }

              });
});


});
function delete_task(id){
  if(confirm('Do you want to delete this task?')){
$.ajax({
    url: "{{config('app.url')}}todo/destroy/"+id,
    type: 'GET', // Just delete Latter Capital Is Working Fine
    dataType: "JSON",
    data: {
        "id": id,
        "_method":"DELETE",
        "_token":$('meta[name="csrf-token"]').attr('content'),// method and token not needed in data
    },
 success: function(data){
  get_tasks();
                }
});
  }
}
function edit_task(id){
 
$.ajax({
    url: "{{config('app.url')}}todo/edit/"+id,
    type: 'GET', // Just delete Latter Capital Is Working Fine
    dataType: "JSON",
 success: function(data){  
  $("#update_task_form").attr('action', "{{config('app.url')}}todo/update/"+id);
   $('#description').val(data.name);
   $('#id').val(data.id);
  $('#edit_task').modal('show');
                }
});

}

</script>
@endsection