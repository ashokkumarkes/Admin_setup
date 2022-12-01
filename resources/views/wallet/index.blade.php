@extends('layouts.app')
@section('content')
    <h1>Wallet page</h1>
    <form action="{{route('add-amount')}}" method="post">
        @csrf
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Amount:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Amount" name="amount">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection