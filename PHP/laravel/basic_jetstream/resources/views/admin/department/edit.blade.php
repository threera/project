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
                            <div class="card">
                                <div class="card-header">เเบบฟอร์มเเก้ไข</div>
                                <div class="card body">
                                    <form action="{{url('/department/update/'.$department->id)}}" method="POST">
                                    @csrf
                                       <div class="form-group">
                                            <label for="department_name">ชื่อตำเเหน่ง</label>
                                            <input type="text" class="form-control" name="department_name" value="{{$department->department_name}}">
                                       </div>
                                       @error('department_name')
                                        <span>{{$message}}</span>
                                       @enderror
                                       <br/>
                                        <input type="submit" value="เเก้ไข" class="btn btn-primary">
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
