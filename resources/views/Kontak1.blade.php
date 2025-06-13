<x-font-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(key: 'Dashboard') }}
        </h2> --}}
    </x-slot>

    <main class="flex max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">
            Contact Us
        </h2> --}}
        <div class="bg-white rounded-lg shadow-lg overflow-hidden md:flex md:space-x-6">
            <div class="md:w-1/2 p-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Silahkan Email</h3>
                {{-- <p class="text-gray-600 mb-6">
                    Have questions or need assistance? We're here to help! Fill out the
                    form and we'll get back to you as soon as possible.
                </p> --}}
                <form action="#" class="space-y-6" method="POST" novalidate="">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="name">
                            Nama Lengkap
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            id="name" name="name" placeholder="Your full name" required="" type="text" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="email"> Alamat email
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            id="email" name="email" placeholder="you@example.com" required="" type="email" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="subject">
                            Subject
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            id="subject" name="subject" placeholder="Subject of your message" required="" type="text" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="message">
                            Pesan
                        </label>
                        <textarea
                            class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                            id="message" name="message" placeholder="Tulis pesan disini .." required=""
                            rows="5"></textarea>
                    </div>
                    <button
                        class="w-full bg-orange3 hover:bg-orange2 text-white font-semibold py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition"
                        type="submit">
                        Kirim Pesan
                    </button>
                </form>
            </div>
            <div class="md:w-1/2 bg-cream p-8 flex flex-col justify-center space-y-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Info Kontak</h3>
                <p class="text-gray-700">
                    <i class="fas fa-map-marker-alt text-blue-600 mr-3"> </i>
                    Perum Jl. Wirasana Indah, RT.03/RW.06, Wirasana, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53318
                </p>
                <p class="text-gray-700">
                    <i class="fas fa-phone-alt text-blue-600 mr-3"> </i>
                    +6288220132902
                </p>
                <p class="text-gray-700">
                    <i class="fas fa-envelope text-blue-600 mr-3"> </i>
                    makjuicipicip@gmail.com
                </p>
                <div class="mt-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d751.9617652048389!2d109.36510062807783!3d-7.38102125414557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559b7c1058d0d%3A0x7968cc27d05188e1!2sMakaroni%20Keju%20Icip%20-%20Icip!5e1!3m2!1sid!2sid!4v1747199557813!5m2!1sid!2sid" class="rounded-lg shadow-md w-full"  width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
                
                <div class="flex space-x-4 mt-6">
                    <a aria-label="Facebook" class="text-orange3 hover:text-orange2 transition" href="#">
                        <i class="fab fa-facebook fa-2x"> </i>
                    </a>
                    <a aria-label="Instagram" class="text-orange3 hover:text-orange2 transition" href="https://www.instagram.com/makjuicip_icippurbalingga/?utm_source=ig_web_button_share_sheet">
                        <i class="fab fa-instagram fa-2x"> </i>
                    </a>
                </div>
            </div>
        </div>
    </main>
</x-font-layout>