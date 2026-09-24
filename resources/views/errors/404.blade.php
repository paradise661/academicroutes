@extends('layouts.frontend.master')

@section('content')
    <section style="padding: 40px 16px; background-color: #f9fafb;">
        <div style="text-align: center;">
            <img src="{{ asset('frontend/images/404.jpg') }}" alt="404 Error"
                style="display: block; margin: 0 auto; max-width: 30%; height: auto;" />
            <h1 style="font-size: 24px; font-weight: 700; color: #25354b; margin-top: 24px;">Oops! Page Not Found</h1>
            <p style="color: #6b7280; font-size: 16px; margin: 8px 0 24px;">
                The page you’re looking for doesn’t exist or has been moved.
            </p>
            <a href="/"
                style="display: inline-block; padding: 12px 24px; background-color: #020972; color: #fff; font-weight: 500; border-radius: 8px; text-decoration: none; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;"
                onmouseover="this.style.backgroundColor='#0f766e'" onmouseout="this.style.backgroundColor='#020972'">
                Return To Home Page
            </a>
        </div>
    </section>
@endsection
