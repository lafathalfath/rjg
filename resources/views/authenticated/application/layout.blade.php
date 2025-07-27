@extends('layouts.manage_application')

@section('title')
Layouts
@endsection

@section('content')
<div>
    <h1 class="text-xl font-semibold">Layouts</h1>
    <div class="flex justify-end"><button class="btn btn-sm text-white bg-[#0a0] hover:bg-[#090]" onclick="new_layout_modal.showModal()">+ New Layout</button></div>
    <table class="w-full table">
        <thead>
            <tr class="text-center">
                <th class="w-0">#</th>
                <th>name</th>
                <th class="w-[0]">actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($layouts as $layout)
                <tr class="hover:bg-gray-100">
                    <td class="w-0">{{ $loop->iteration }}</td>
                    <td><a href="{{ route('layout.edit', Crypt::encryptString($layout->id)) }}" class="hover:underline">{{ $layout->name }}</a></td>
                    <td class="w-[0]">
                        <button class="btn btn-sm bg-[#d00] hover:bg-[#c00] text-white">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">You don't have any layouts</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<dialog id="new_layout_modal" class="modal">
    <div class="modal-box">
        <div>
            <form action="{{ route('layout.store') }}" id="new_layout" method="POST">
                @csrf
                <input type="text" class="hidden" value="{{ request()->app_id }}" name="application_id">
                <div class="flex flex-col">
                    <label for="name">Layout Name</label>
                    <input type="text" name="name" id="name" class="px-2 py-1 rounded min-w-96">
                </div>
            </form>
        </div>
        <div class="modal-action">
            <div><button class="btn bg-[#0a0] hover:bg-[#090] text-white" onclick="new_layout.submit()">Create</button></div>
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop"><button></button></form>
</dialog>
@endsection