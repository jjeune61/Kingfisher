@extends('layout.app')
@section('content')
<div class="row">
<div class="container">
<div class="text-center">
<h1>User Profile</h1>
<hr>
<h5>Name: {{ $user->name }}</h5>
<h5>Email: {{ $user->email }}</h5>
</div>
</div>
</div>
@endsection