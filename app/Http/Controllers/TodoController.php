<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use DataTables;
class TodoController extends Controller
{
  public function index(Request $request)
  {
      if ($request->ajax()) {
          $data = Todo::orderby('id','DESC')->get();
          return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){
   
                         $btn = '<button  type="button"  onclick="edit_task('.$row->id.')" title="Update Task"  rel="tooltip" title="Update Task" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                         <i class="now-ui-icons ui-2_settings-90"></i>
                       </button>
                           <button type="button"  rel="tooltip" title="Delete Task"  onclick="delete_task('.$row->id.')" class="btn btn-danger deleteTask  btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                             <i class="now-ui-icons ui-1_simple-remove"></i>
                           </button';
     
                          return $btn;
                  })
                  
                  ->rawColumns(['action'])
                  ->make(true);
      }
      
      return view('todo.index');
  }
    public function gettasks()
    {
        $tasks=Todo::orderby('id','Desc')->get();
        $html="";
        if(count($tasks)>0){
           
        foreach ($tasks as $key => $value) {
       
        $html.='<tr >
        <td class="text-left">'.$value->name.'</td>
        <td class="td-actions text-right">
        <button  type="button"  onclick="edit_task('.$value->id.')" title="Update Task"  rel="tooltip" title="Update Task" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
        <i class="now-ui-icons ui-2_settings-90"></i>
      </button>
          <button type="button"  rel="tooltip" title="Delete Task"  onclick="delete_task('.$value->id.')" class="btn btn-danger deleteTask  btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
            <i class="now-ui-icons ui-1_simple-remove"></i>
          </button
        </td>
      </tr>';
        }
    }else{
$html="<div class='alert alert-warning'>No data found</div>";
        }
        return Response($html);
      
      //  return response()->json($tasks);
    }
  
    public function save(Request $request)
    {
        $todo=new Todo();
$todo->name=$request->input('name');
$todo->created_at=date('Y-m-d H:i:s');
$todo->save();
return response()->json('success');
    }
    public function edit($id)
    {
        $todo=Todo::find($id);
        $myarray=array(
'name'=>$todo->name,
'id'=>$todo->id,

        );
        return response()->json($myarray); 
    }
    public function update(Request $request)
    {
            $todo=Todo::find($request->id);
            $todo->name=$request->input('name');
            $todo->updated_at=date('Y-m-d H:i:s');
            $todo->save();
            return response()->json('success');
    }
    public function destroy($id)
    {
        $item = Todo::findOrFail($id);
        $item->delete();

        return response()->json('success');
    }
   
   
}
