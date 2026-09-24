<div class="grid md:grid-cols-3 gap-8">
    @forelse ($news as $data)
        <a href="{{ route('newssingle', $data->slug) }}" class="block">
            <div
                class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden rounded-t-2xl">
                    <img src="{{ $data->image ? asset($data->image) : asset('frontend/images/blog.jpg') }}"
                        alt="{{ $data->title }}"
                        class="rounded-lg w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                </div>
                <div class="p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-medium text-primary">
                            {{ \Carbon\Carbon::parse($data->created_at)->format('M d, Y') }}
                        </p>
                    </div>
                    <h4
                        class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300 mb-3 line-clamp-1">
                        {!! $data->name ?? '' !!}
                    </h4>
                    <p class="text-gray-600 text-sm line-clamp-4 mb-5">
                        @php
                            $words = explode(' ', strip_tags($data->description ?? ''));
                            $limited = implode(' ', array_slice($words, 0, 35)) . (count($words) > 35 ? '...' : '');
                        @endphp
                        {!! $limited !!}
                    </p>
                    <div class="flex items-center justify-between mt-auto text-gray-500 text-sm">
                        <div>
                            <p class="font-semibold text-gray-900">{{ $data->author ?? 'Author Name' }}</p>
                            <p class="text-xs">{{ $data->position ?? 'Author position' }}</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                            </svg>
                            <span>{{ $data->likes ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <p class="text-gray-500 text-center col-span-3">No news found.</p>
    @endforelse
</div>