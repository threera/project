<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departmoent;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    //
    public function index(){
        //query builder
        // $department = DB::table('departmoents')->get();
        // $department = DB::table('departmoents')
        // //รวม 2 table เอา departmoents ไป join กับ users
        // ->join('users','departmoents.user_id','users.id')
        // ->select('departmoents.*','users.name')->paginate(3);

        //Eloquent
        // $department = Departmoent::all();
        $department = Departmoent::paginate(3);
        //กูคืนข้อมูลที่เคยลบ
        $transhDepartments = Departmoent::onlyTrashed()->paginate(3);
        return view('admin.department.index',compact('department','transhDepartments'));
    }

    public function store(Request $request){

        $request->validate(
        [
            'department_name'=>'required|unique:departmoents|max:255'
        ],
        [
            'department_name.required'=>'กรุณาป้อนเเผนก',
            'department_name.max'=>'เกิน 255 ตัว',
            'department_name.unique'=>'มีเเผนกนี้เเล้ว'
        ]
        );
    
        //บันทึกข้อมูล
        //1 Eloquent
        // $department = new Departmoent;
        // $department->department_name = $request->department_name;
        // $department->user_id = Auth::user()->id;
        // $department->save();

        //2 query builder migrations
        $data = array();
        $data["department_name"] = $request->department_name;
        $data["user_id"] = Auth::user()->id;
        DB::table('departmoents')->insert($data);

        // ย้อนกลับไป พร้อมส่งข้อมูลไป
        return redirect()->back()->with('success',"บันทึกข้อมูลสำเร็จ");

            //เเสดงข้อมูล ตาม Request
            // dd($request->department_name);
    }


    public function edit($id){
        
      $department = Departmoent::find($id);
        //   dd($department);
            return view('admin.department.edit',compact('department'));
    }

    
    public function update(Request $request, $id){
        $request->validate(
            [
                'department_name'=>'required|unique:departmoents|max:255'
            ],
            [
                'department_name.required'=>'กรุณาป้อนเเผนก',
                'department_name.max'=>'เกิน 255 ตัว',
                'department_name.unique'=>'มีเเผนกนี้เเล้ว'
            ]
        );
        $department = Departmoent::find($id)->update([
              //   dd($department);
              'department_name'=>$request->department_name,
              'user_id'=>Auth::user()->id
        ]);

        return redirect()->route('department')->with('success',"เเก้ไขข้อมูลสำเร็จ");

    }

    public function softdelete($id){
        $department = Departmoent::find($id)->delete();
        return redirect()->back()->with('success',"ลบข้อมูลสำเร็จ");
    }


    public function restore($id){
        //กูคืนข้อมูล
        $restore = Departmoent::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success',"กูคืนข้อมูลสำเร็จ");
    }

    public function delete($id){
        //ลบถาวร forceDelete
        $restore = Departmoent::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success',"ลบข้อมูลถาวรสำเร็จ");
    }

}
