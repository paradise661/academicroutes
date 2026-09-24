@extends('layouts.frontend.master')
@section('content')
    @if ($careers->isNotEmpty())
        <section class="bg-gray-100 py-16 px-4 md:px-10 lg:px-20 min-h-screen">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($careers as $career)
                    <!-- Career card as you already have -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-8 flex flex-col justify-between">
                        <!-- Header with Job Title and Badge -->
                        <div class="flex items-start justify-between mb-6">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ $career->name ?? '' }}
                            </h2>
                            <span
                                class="text-white text-xs md:text-sm font-semibold px-4 py-1 rounded-full whitespace-nowrap select-none"
                                style="background-color: rgb(1, 33, 105);">
                                {{ $career->type ?? 'Full Time (Onsite)' }}
                            </span>
                        </div>

                        <!-- Job Details -->
                        <div class="space-y-5 mb-8 text-gray-700 dark:text-gray-300 text-base md:text-lg">
                            <!-- Experience Level -->
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span><strong>Level:</strong> {{ $career->level ?? 'N/A' }}</span>
                            </div>

                            <!-- Salary and Openings -->
                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-green-600 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                    </svg>
                                    <span><strong>Salary:</strong> {{ $career->salary ?? 'Negotiable' }}</span>
                                </div>

                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-purple-600 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span><strong>Openings:</strong> {{ $career->number ?? '1' }}</span>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-red-600 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span><strong>Location:</strong> {{ $career->location ?? 'Thamel, Kathmandu' }}</span>
                            </div>

                            <!-- Application Deadline -->
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span><strong>Apply Before:</strong> {{ get_the_date($career->deadline) ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <!-- View Details Link -->
                        <div class="flex justify-center">
                            <a class="text-white font-semibold py-3 px-8 rounded-md transition duration-200 text-lg text-center w-full max-w-xs"
                                href="{{ route('careersingle', $career->slug) }}" style="background-color: rgb(1, 33, 105);"
                                onmouseover="this.style.backgroundColor='rgb(0, 25, 80)'"
                                onmouseout="this.style.backgroundColor='rgb(1, 33, 105)'">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <section class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
            <h2 class="text-3xl font-semibold text-gray-700">No Vacancies Available</h2>
        </section>
    @endif
@endsection
