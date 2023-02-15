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
                                <div class="card-header">ตารางข้อมูล</div>
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">แผนก</th>
                                    <th scope="col">พนักงาน</th>
                                    <th scope="col">วันที่สร้าง</th>
                                    <th scope="col">เเก้ไข</th>
                                    <th scope="col">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($department as $row)
                                        <tr>
                                        <th>{{$department->firstItem()+$loop->index}}</th>
                                        <td>{{$row->department_name}}</td>
                                        <!-- เอามาจาก fun user() -->
                                        <td>{{$row->user->name}}</td>
                                        <!-- diffForHumans นับเป็นเวลาว่านานเท่าไรเเล้ว -->
                                        <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{url('department/edit/'.$row->id)}}">เเก้ไข</a></td>
                                        <td><a class="btn btn-warning" href="{{url('department/softdelete/'.$row->id)}}">ลบ</a></td>
                                        
                                    </tr>
                                        @endforeach
                                </tbody>
                                </table>
                                {{$department->links()}}
                            </div>
                            @if(count($transhDepartments)>0)
                            <div class="card p-3">
                                <div class="card-header">ถังขยะ</div>
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">แผนก</th>
                                    <th scope="col">พนักงาน</th>
                                    <th scope="col">วันที่สร้าง</th>
                                    <th scope="col">กู้คืนข้อมูล</th>
                                    <th scope="col">ลบถาวร</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    @foreach($transhDepartments as $row)
                                        <tr>
                                        <th>{{$department->firstItem()+$loop->index}}</th>
                                        <td>{{$row->department_name}}</td>
                                        <!-- เอามาจาก fun user() -->
                                        <td>{{$row->user->name}}</td>
                                        <!-- diffForHumans นับเป็นเวลาว่านานเท่าไรเเล้ว -->
                                        <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                                        <td><a class="btn btn-success" href="{{url('department/restore/'.$row->id)}}">กู้คืน</a></td>
                                        <td><a class="btn btn-danger" href="{{url('department/delete/'.$row->id)}}">ลบถาวร</a></td>
                                        
                                    </tr>
                                        @endforeach
                                </tbody>
                                </table>
                                {{$transhDepartments->links()}}
                            </div>
                            @endif
                           
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                                <div class="card-header">เเบบฟอร์ม</div>
                                <div class="card-body">
                                    <form action="{{route('addDepartment')}}" method="POST">
                                    @csrf
                                       <div class="form-group">
                                            <label for="department_name">ชื่อตำเเหน่ง</label>
                                            <input type="text" class="form-control" name="department_name">
                                       </div>
                                       @error('department_name')
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
