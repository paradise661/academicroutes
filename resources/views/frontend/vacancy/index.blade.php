<section class="vacancy-form py-18 bg-[#eff6f9]">
    <div class="container mx-auto">
        <h2 class="text-3xl md:text-4xl font-semibold text-center text-black mb-3 pb-5">
            {{ $setting['vacancy_title'] ?? 'Apply' }}
        </h2>

        <div class="w-full md:w-1/2 mx-auto">
            <form id="vacancy-form" enctype="multipart/form-data" method="post" action="{{ route('vacancy.store') }}">
                @csrf
                <div class="form">
                    <div class="grid gap-4">
                        <div class="space-y-3">
                            <input
                                class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0"
                                type="text" name="name" required placeholder="Your Name*" />
                        </div>

                        <div class="space-y-3">
                            <input
                                class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0"
                                type="email" name="email" required placeholder="Your Email*" />
                        </div>

                        <div class="space-y-3">
                            <input
                                class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0"
                                type="number" name="phone" required placeholder="Contact Number*" />
                        </div>

                        <div class="space-y-3">
                            <input
                                class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0"
                                type="url" name="portfolio" placeholder="Portfolio URL (optional)" />
                        </div>

                        <div class="space-y-3">
                            <input
                                class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0"
                                type="file" name="resume" required />
                        </div>

                        <div class="space-y-3">
                            <textarea class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0"
                                name="about" rows="4" required placeholder="About Yourself*"></textarea>
                        </div>

                        <div class="w-full flex justify-center">
                            <button class="px-4 py-3 bg-secondary rounded-xl text-white font-medium text-base"
                                type="submit">
                                Submit Application
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- Optional success popup --}}
        <script>
            @if (session('message'))
                document.addEventListener('DOMContentLoaded', function() {
                    const popup = document.getElementById('popup');
                    const popupMessage = document.getElementById('popup-message');
                    const successMessage = "{{ session('message') }}";

                    popupMessage.innerText = successMessage;
                    popup.classList.remove('hidden');
                    popup.style.opacity = '1';
                    popup.style.transform = 'translateX(0)';

                    setTimeout(function() {
                        popup.style.opacity = '0';
                        popup.style.transform = 'translateX(100%)';
                    }, 4000);
                });
            @endif
        </script>
    </div>
</section>
