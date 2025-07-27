@extends('layouts.authenticated')

@section('title')
Dashboard
@endsection

@section('content')

<div>
    <h1 class="text-xl font-semibold">Applications</h1>
    <div class="flex justify-end"><button class="btn btn-sm bg-[#0a0] hover:bg-[#090] text-white" onclick="new_app_modal.showModal()">+ New Application</button></div>
    <table class="w-full table">
        <thead>
            <tr class="text-center">
                <th class="w-[0] text-center">#</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($applications as $app)
                <tr class="hover:bg-gray-100">
                    <td class="w-[0] text-center">{{ $loop->iteration }}</td>
                    <td><a href="{{ route('application', Crypt::encryptString($app->id)) }}" class="hover:underline">{{ $app->name }}</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">You don't have any applications</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<dialog id="new_app_modal" class="modal">
    <div class="modal-box">
        <div>
            <form action="{{ route('application.store') }}" id="new_app" method="POST">
                @csrf
                <div class="flex flex-col">
                    <label for="name">Application Name</label>
                    <input type="text" name="name" id="name" class="px-2 py-1 rounded min-w-96">
                </div>
            </form>
        </div>
        <div class="modal-action">
            <div><button class="btn bg-[#0a0] hover:bg-[#090] text-white" onclick="new_app.submit()">Create</button></div>
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop"><button></button></form>
</dialog>

@endsection