@extends('layouts.master')
@section('content')
    @livewire('users.user-edit',['user' => $user])
@endsection
