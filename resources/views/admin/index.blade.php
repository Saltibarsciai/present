@extends('layouts.admin')

@section('content')
    <local-storage token="{{$token}}"></local-storage>
    <admin-container></admin-container>
@endsection
