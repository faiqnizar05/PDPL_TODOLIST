@extends('layouts.main')

@push('head')
<title>Todo List App</title>
<!-- Add Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    /* Base Styling for Body */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f8fa;
        color: #333;
    }

    .todo-card {
        border-radius: 20px;
        transition: all 0.3s ease-in-out;
        border-left: 6px solid #007bff;
        background: linear-gradient(135deg, #e3f2fd, #ffffff);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .todo-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        border-left: 6px solid #28a745;
    }

    .todo-card .card-body {
        padding: 24px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .todo-done {
        border-left: 6px solid #28a745 !important;
        background: linear-gradient(135deg, #e8f7e9, #ffffff);
    }

    .todo-badge {
        font-size: 1rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
    }

    .card-title.done {
        text-decoration: line-through;
        color: #6c757d;
    }

    /* Badge Colors */
    .badge-primary {
        background-color: #007bff;
    }

    .badge-warning {
        background-color: #ffb300;
        color: #000;
    }

    /* Button Styling */
    .btn-hover {
        transition: all 0.3s ease;
        border-radius: 12px;
        padding: 12px 24px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .btn-hover:hover {
        transform: translateY(-3px);
        background-color: #0069d9;
        color: white;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-hover-danger:hover {
        transform: translateY(-3px);
        background-color: #dc3545;
        color: white;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    /* Icon Hover Effects */
    .todo-icon {
        font-size: 1.8rem;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .todo-icon:hover {
        color: #007bff;
        transform: scale(1.15);
    }

    /* Empty Todo List Styling */
    .empty-todo {
        background: #e9f7fd;
        border-radius: 20px;
        padding: 50px;
        text-align: center;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .empty-todo i {
        font-size: 4rem;
        color: #007bff;
    }

    /* Card Animation on Load */
    .todo-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.6s forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('main-section')
<div class="container my-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary"><i class="fa fa-list-check me-2"></i> My Todo List</h2>
        <a href="{{ route('todo.create') }}" class="btn btn-primary btn-hover">
            <i class="fa fa-plus"></i> Add Todo
        </a>
    </div>

    <!-- Cards for Todos -->
    <div class="row">
        @forelse ($todos as $todo)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card todo-card {{ $todo->status == 'done' ? 'todo-done' : '' }} border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title fw-bold {{ $todo->status == 'done' ? 'done' : '' }}">
                                <i class="fa {{ $todo->status == 'done' ? 'fa-check-circle text-success' : 'fa-circle text-secondary' }} me-2 todo-icon"></i>
                                {{ $todo->name }}
                            </h5>
                            <p class="card-text mb-2">
                                <span class="badge badge-primary todo-badge me-2">Work</span>
                                <span class="text-muted"><i class="fa fa-tasks me-1"></i> {{ $todo->work }}</span>
                            </p>
                            <p class="card-text">
                                <span class="badge badge-warning text-dark todo-badge me-2">Due Date</span>
                                <span class="text-secondary"><i class="fa fa-calendar-alt me-1"></i> {{ $todo->dueDate }}</span>
                            </p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-success btn-hover">
                                <i class="fa fa-edit"></i> Update
                            </a>
                            <a href="{{ route('todo.delete', $todo->id) }}" class="btn btn-sm btn-danger btn-hover btn-hover-danger">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info empty-todo">
                    <i class="fa fa-info-circle"></i> No todos available. Add a new one!
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
