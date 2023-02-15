<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;

class servicesController extends Controller
{
    public function index(){
        //query builder

        //Eloquent
        $services = Service::paginate(3);

        return view('admin.service.index',compact('services'));
    }

    public function store(Request $request){

        $request->validate(
        [
            'service_name'=>'required|unique:services|max:255',
            'service_image'=>'required|mimes:jpg,png,jpeg'
        ],
        [
            'service_name.required'=>'กรุณาป้อนชื่อบริการ',
            'service_name.max'=>'เกิน 255 ตัว',
            'service_name.unique'=>'มีบริการนี้เเล้ว',
            'service_image.required'=>'กรุณาใส่รูปภาพ'
        ]
        );

        //การเข้ารหัสรูปภาพ
        $service_image = $request->file('service_image');

        //Generate ชื่อภาพ
        $name_gen = hexdec(uniqid());

        //ดึงนามสกุลภาพ
        $img_ext = strtolower($service_image->getClientOriginalExtension());
        
        //ชื่อภาพพร้อมนามสกุล
        $img_name = $name_gen.'.'.$img_ext;

        //บันทึกข้อมูล
        $upload_location = 'image/services/';
        $full_path = $upload_location.$img_name; 

        //uploade img path


        Service::insert([
            'service_name'=>$request->service_name,
            'service_image'=>$full_path,
            'created_at'=>Carbon::now()
        ]);
        $service_image->move($upload_location,$img_name);

        // // ย้อนกลับไป พร้อมส่งข้อมูลไป
        return redirect()->back()->with('success',"บันทึกข้อมูลสำเร็จ");
    }

    public function edit($id){
        
        $service = Service::find($id);
          //   dd($department);
              return view('admin.service.edit',compact('service'));
    }


      public function update(Request $request, $id){
        $request->validate(
            [
                'service_name'=>'required|max:255',
            ],
            [
                'service_name.required'=>'กรุณาป้อนชื่อบริการ',
                'service_name.max'=>'เกิน 255 ตัว',
            ]
        );
        //การเข้ารหัสรูปภาพ
        $service_image = $request->file('service_image');

        //เปลี่ยนชื่อเเละภาพ
        if($service_image){
            //Generate ชื่อภาพ
            $name_gen = hexdec(uniqid());

            //ดึงนามสกุลภาพ
            $img_ext = strtolower($service_image->getClientOriginalExtension());

            //ชื่อภาพพร้อมนามสกุล
            $img_name = $name_gen.'.'.$img_ext;

            //บันทึกข้อมูล
            $upload_location = 'image/services/';
            $full_path = $upload_location.$img_name;

            //update
            Service::find($id)->update([
                'service_name'=>$request->service_name,
                'service_image'=>$full_path
            ]);
            
            //ลบภาพก่อนหน้า unlink
            $old_image = $request->old_image;
            unlink($old_image);

            $service_image->move($upload_location,$img_name);


            return redirect()->route('services')->with('success',"เเก้ไขข้อมูลสำเร็จ");

        } else {
            //เเก้ไขชื่อ
            $Service = Service::find($id)->update([
                'service_name'=>$request->service_name,
            ]);
            return redirect()->route('services')->with('success',"เเก้ไขชื่อสำเร็จ");
        }
        
    }


    public function delete($id){
        //ลบรูปถาพ ค้นจากฐานข้อมูล
        $img = Service::find($id)->service_image;
        unlink($img);

        //ลบข้อมูล
        Service::find($id)->delete();
        return redirect()->back()->with('success',"ลบข้อมูลสำเร็จ");
    }
}
