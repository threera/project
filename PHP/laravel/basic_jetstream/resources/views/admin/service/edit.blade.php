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
                                    <form action="{{url('/service/update/'.$service->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                       <div class="form-group">
                                            <label for="service_name">ชื่อบริการ</label>
                                            <input type="text" class="form-control" name="service_name" value="{{$service->service_name}}">
                                       </div>
                                       @error('service_name')
                                        <span>{{$message}}</span>
                                       @enderror
                                       <br/>
                                       <div class="form-group">
                                            <label for="service_image">รูปภาพ</label>
                                            <input type="file" class="form-control" name="service_image" value="{{$service->service_image}}">
                                       </div>
                                       @error('service_image')
                                        <span>{{$message}}</span>
                                       @enderror
                                       <br/>
                                       <input type="hidden" class="form-control" name="old_image" value="{{$service->service_image}}">

                                       <div class="form-group">
                                        <img src="{{asset($service->service_image)}}" alt="" width="300px" height="300px">
                                       </div>
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
