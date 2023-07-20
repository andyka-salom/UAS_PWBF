@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <h1>Profile</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <p class="card-text"><strong>Nama:</strong> {{ $user->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>No telpon:</strong> {{ $user->no_telp }}</p>
                <p class="card-text"><strong>Alamat :</strong> {{ $user->alamat }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            <a href="{{ route('profile.editPassword') }}" class="btn btn-primary">Change Password</a>
            @if (Auth::user()->role === 'customer')
            <form method="POST" action="{{ route('profile.destroy') }}" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
            </form>
            @endif
        </div>
    </div>
@endsection
