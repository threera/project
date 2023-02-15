<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดี , {{Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            @if(session("success"))
                            <div class="alert alert-success">{{session("success")}}</div>
                            @endif
                            <div class="card p-3">
                                <div class="card-header">ตารางข้อมูลบริการ</div>
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ภาพประกอบ</th>
                                    <th scope="col">ชื่อบริการ</th>
                                    <th scope="col">วันที่สร้าง</th>
                                    <th scope="col">เเก้ไข</th>
                                    <th scope="col">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $row)
                                        <tr>
                                        <th>{{$services->firstItem()+$loop->index}}</th>
                                        <td>
                                            <img src="{{asset($row->service_image)}}" alt="" width="100px" height="100px" >
                                        </td>
                                        <td>{{$row->service_name}}</td>
                                        <!-- diffForHumans นับเป็นเวลาว่านานเท่าไรเเล้ว -->
                                        <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{url('service/edit/'.$row->id)}}">เเก้ไข</a></td>
                                        <td><a class="btn btn-warning" onClick="return confirm('คูณต้องการลบข้อมูลหรือไม่ ?')" href="{{url('service/delete/'.$row->id)}}">ลบ</a></td>
                                        
                                    </tr>
                                        @endforeach
                                </tbody>
                                </table>
                                {{$services->links()}}
                            </div>
                           
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                                <div class="card-header">เเบบฟอร์มบริการ</div>
                                <div class="card-body">
                                    <form action="{{route('addService')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                       <div class="form-group">
                                            <label for="service_name">ชื่อบริการ</label>
                                            <input type="text" class="form-control" name="service_name">
                                       </div>
                                       @error('service_name')
                                        <span>{{$message}}</span>
                                       @enderror
                                       <div class="form-group">
                                            <label for="service_image">ภาพประกอบ</label>
                                            <input type="file" class="form-control" name="service_image">
                                       </div>
                                       @error('service_image')
                                        <span>{{$message}}</span>
                                       @enderror
                                       <br/>
                                        <input type="submit" value="บันทึก" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <x-jet-welcome /> -->

                
            </div>
        </div>
    </div>
</x-app-layout>
