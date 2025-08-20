@extends('layouts.master')
@section('content')
    @livewire('user-edit',['user' => $user])
@endsection
