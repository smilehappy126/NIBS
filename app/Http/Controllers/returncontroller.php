<?php

namespace App\Http\Controllers;

use App\Miss;
use App\User;
use App\Reason;
use Illuminate\Http\Request;

class returnController extends Controller
{
  
  public function index()
  {
    $users=User::all();
    $res = Miss::where('status','=','已歸還')->orderBy('date','desc')->get();
    $reasons = Reason::all();
    return view('button3_return.index',['res'=> $res,'users'=>$users,'reasons'=>$reasons]);
  }


	public function update(Request $rep, $id)
	{
      $update=Miss::find($id);
      $update->update(['class'=>$rep->class]);
      $update->update(['name'=>$rep->name]);
      $update->update(['phone'=>$rep->phone]);
      $update->update(['date'=>$rep->date]);
      $update->update(['updated_at'=>$rep->updated_at]);
      $update->update(['item'=>$rep->item]);
      $update->update(['itemnum'=>$rep->itemnum]);
      $update->update(['license'=>$rep->license]);
      $update->update(['classroom'=>$rep->classroom]);
      $update->update(['teacher'=>$rep->teacher]);
      $update->update(['status'=>$rep->status]);
      $update->update(['audit'=>$rep->audit]);
      $update->save();
      return redirect('/return');
	}
  // 透過Name來搜尋
  public function search(Request $rep)
  {
      $res=Miss::where('name','like','%'.$rep->searchname.'%')
                  ->get();
      if (count($res)>=1) {
        return view('button3_return.index',['res'=> $res]);
      } else if (count($miss)<1){
        return view('button3_return.fail',['res'=> $res]);
      }
  }
  public function userupdate(Request $rep)
    {
      $update= User::where('phone','=',$rep->phone);
      $update->update(['violation'=>$rep->violation]);
      $reason=new Reason();
      $reason->user = $rep->username;
      $reason->phone= $rep->phone;
      $reason->reason = $rep->reason;
      $reason->creator = $rep->reasoncreator;
      $reason->save();
      return redirect('/return');
    }




}