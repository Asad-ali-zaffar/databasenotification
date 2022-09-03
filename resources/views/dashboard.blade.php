<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach (auth()->user()->unreadNotifications as $notification )
                    <div class="bg-blue-300 p-3 m-2">
                       <b> {{$notification->data['name']}}</b> started following you !!!
                       <a href="markasred/{{$notification->id}}" class="p-2 bg-red-400 text-white rounded-lg">Mark as red</a>
                    </div>
                    @endforeach

                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach (auth()->user()->readNotifications as $notification )
                    <div class="bg-blue-300 p-3 m-2">
                       <b> {{$notification->data['name']}}</b> &nbsp; {{$notification->data['email']}} started following you !!!
                       <a href="markasred/{{$notification->id}}" class="p-2 bg-gray-400 text-white rounded-lg">Mark as red</a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
