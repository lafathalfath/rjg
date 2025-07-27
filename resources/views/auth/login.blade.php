@extends('layouts.guest')

@section('title')
    LOGIN
@endsection

@section('style')
    
@endsection

@section('content')
<form action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="flex flex-col">
        <label for="name_or_email">Username or Email</label>
        <input type="text" name="name_or_email" id="name_or_email" class="px-2 py-1 rounded min-w-96">
    </div>
    <div class="mt-2">
        <div class="flex flex-col">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="px-2 py-1 rounded min-w-96">
        </div>
        <div>
            <button type="button" class="cursor-pointer" id="toggle-password" onclick="togglePassword(this)">show password</button>
        </div>
    </div>
    <div class="flex justify-center mt-5">
        <button type="submit" class="btn bg-[#0a0] hover:bg-[#090] text-white">Login</button>
    </div>
</form>
@endsection

@section('script')
<script>
    const togglePassword = (e) => {
        const input = document.getElementById('password')
        input.type = input.type == 'password' ? 'text' : 'password'
        e.innerHTML = input.type == 'password' ? 'show password' : 'hide password'
    }
</script>
@endsection