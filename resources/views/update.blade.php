@extends('layouts.main')

@push('head')
<title>Update</title>
@endpush

@section('main-section')

<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="h2">Update Todo</div>
        <a href="{{ route('todo.home') }}" class="btn btn-primary">Back</a>
    </div>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('todo.updateData') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $todo->id }}">

                {{-- Name Input --}}
                <label for="name" class="form-label mt-4">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $todo->name) }}">

                {{-- Work Input --}}
                <label for="work" class="form-label mt-4">Work</label>
                <input type="text" name="work" id="work" class="form-control" value="{{ old('work', $todo->work) }}">

                {{-- Due Date Input --}}
                <label for="dueDate" class="form-label mt-4">Due Date</label>
                <input type="date" name="dueDate" id="dueDate" class="form-control" value="{{ old('dueDate', $todo->dueDate) }}">
                
                {{-- Submit Button --}}
                <button type="submit" class="btn btn-primary btn-lg mt-4">Update Todo</button>
            </form>
        </div>
    </div>
</div>
@endsection
