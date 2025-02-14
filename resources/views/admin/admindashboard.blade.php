@extends('layouts.admin_layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="dashboard-container">      
    <!-- View Questions Button -->
        <div class="view-questions">
            <a href="{{ route('admin.questions') }}" class="btn-view">View All Questions</a>
        </div>
    </div>

    <style>
        .view-questions {
            text-align: center;
            margin: 20px 0;
        }
        .btn-view {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-view:hover {
            background: #0056b3;
        }
    </style>
@endsection
