@extends('admin.adminLayouts')
@section('content')
    Title
    @foreach ($borrows as $borrow)
        <p>borrows: {{ $borrow->user->numberofbooks }}</p>
    @endforeach
    <p>Total Borrows: {{ $borrowCount }}</p>
@endsection
