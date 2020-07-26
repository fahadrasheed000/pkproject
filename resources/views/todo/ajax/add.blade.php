
<div id="add_task" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Add Task</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'add_task_form','action' => 'TodoController@save','method'=>'POST']) !!}
                    <div class="form-group" >
                      
                        <textarea cols="12" rows="3" id="name" placeholder="Enter description" name="name" class="form-control"></textarea>
                    </div> 
                    <input class="btn btn-success pull-right" type="submit" value="Add Task"/>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
        