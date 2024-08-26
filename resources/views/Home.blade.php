<!-- resources/views/home.blade.php -->

@extends('layouts.layout')

@section('title', 'Home - Online Quiz System')

@section('custom-css')
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #55679C;
            color: #333;
        }

        a {
            text-decoration: none;
        }

        /* Header */
        header {
            background-color: #7C93C3;
            color: white;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            font-size: 2rem;
            font-weight: bold;
        }

        header nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        header nav a {
            color: white;
            font-size: 1.1rem;
            margin: 0 15px;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #ffe600;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),  no-repeat center center/cover;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-in-out;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease-in-out;
        }

        .hero a {
            font-size: 1.25rem;
            padding: 15px 30px;
            border-radius: 30px;
            transition: background-color 0.3s;
            animation: fadeInUp 1.2s ease-in-out;
        }

        .hero a:hover {
            background-color: #0056b3;
        }

        /* About Section */
        #about {
            padding: 80px 0;
            background-color: #ffffff;
        }

        #about h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: #007bff;
            animation: fadeIn 1s ease-in-out;
        }

        #about p {
            font-size: 1.25rem;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
            animation: fadeInUp 1.2s ease-in-out;
        }

        /* Features Section */
        .features {
            background-color: #f9f9f9;
            padding: 80px 0;
            text-align: center;
        }

        .features h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 50px;
            text-align: center;
            color: #007bff;
            animation: fadeIn 1s ease-in-out;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #007bff;
            animation: zoomIn 1.2s ease-in-out;
        }

        .features .col-md-4 h3 {
            font-size: 1.75rem;
            margin-bottom: 20px;
            color: #333;
            animation: fadeInUp 1.4s ease-in-out;
        }

        .features .col-md-4 p {
            font-size: 1.25rem;
            color: #666;
            animation: fadeInUp 1.6s ease-in-out;
        }

        /* Call to Action Section */
        .cta {
            background-size: cover;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .cta p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            animation: fadeInUp 1.2s ease-in-out;
        }

        .cta a {
            font-size: 1.25rem;
            padding: 15px 30px;
            border-radius: 30px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
            animation: fadeInUp 1.4s ease-in-out;
        }

        .cta a:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        footer p {
            font-size: 1rem;
            margin: 0;
        }

        footer a {
            color: #007bff;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #ffe600;
        }

        /* Animations */
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
@endsection

@section('content')

    <!-- Header -->
    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    QuizMaster
                </div>
                <nav>
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#features">Features</a>
                    <a href="{{ url('login') }}">Login</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <h1>Welcome to QuizMaster</h1>
        <p>Your ultimate destination for challenging and fun quizzes!</p>
        <a href="{{ url('/register') }}" class="btn btn-primary btn-lg">Get Started</a>
    </section>

    <!-- About Section -->
    <section id="about" class="features" >
        <h2>About QuizMaster</h2>
        <p>QuizMaster is an interactive platform where you can participate in quizzes on various topics and challenge your knowledge. Whether you're a student, a professional, or just looking to have some fun, QuizMaster offers something for everyone.</p>
    </section>

    {{-- Features Section 
    <section id="features" class="hero">
        <div class="container">
            <h2>Features</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>Challenging Quizzes</h3>
                    <p>Take quizzes on a variety of topics, from general knowledge to specialized subjects.</p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-stopwatch"></i>
                    </div>
                    <h3>Real-time Results</h3>
                    <p>Get your results instantly after completing a quiz and see where you stand.</p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Leaderboard</h3>
                    <p>Compete with others and see your ranking on the leaderboard.</p>
                </div>
            </div>
        </div>
    </section>--}}

{{-- Call to Action Section--}}
    <section id="register" class="cta">
        <div class="container">
            <h2>Ready to Test Your Knowledge?</h2>
            <p>Sign up today and start participating in exciting quizzes!</p>
            <a href="{{ url('/register') }}"" class="btn btn-light btn-lg">Register Now</a>
        </div>
    </section> 

   
@endsection
