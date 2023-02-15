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
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">วันที่สร้าง</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($users as $row)
                                <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <!-- diffForHumans นับเป็นเวลาว่านานเท่าไรเเล้ว -->
                                <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- <x-jet-welcome /> -->
            </div>
        </div>
    </div>
</x-app-layout>
