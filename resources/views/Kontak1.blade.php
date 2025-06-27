<x-font-layout>
    @section('title')
    <title>Kontak ICIP-ICIP</title>
    @endsection
    <main class="pt-[90px] flex max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div>
            <div class="berhasilalert p-4 mb-4 text-center text-sm text-green-800 rounded-lg bg-green-100 hidden "
                role="alert">
                <span class="font-medium">Berhasil!! </span>Terimakasih telah mengubungi kami.
            </div>
            <div class="gagalalert p-4 mb-4 text-center text-sm text-red-800 rounded-lg bg-red-100 hidden "
                role="alert">
                <span class="font-medium">Gagal!!!</span> Silahkan kirim ulang pesan.
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden md:flex md:space-x-6">


                <div class="md:w-1/2 p-8">

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Silahkan Kirim Pesan Anda</h3>


                    <form name="Form-Contact-Icip" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="name">
                                Nama Lengkap
                            </label>
                            <input
                                class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange1 focus:border-orange1"
                                id="name" name="nama" placeholder="Nama Lengkap" required="" type="text" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="email"> Alamat email
                            </label>
                            <input
                                class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange1 focus:border-orange1"
                                id="email" name="email" placeholder="emiaiil@example.com" required="" type="email" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="subject">
                                Subject
                            </label>
                            <input
                                class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange1 focus:border-orange1"
                                id="subject" name="subject" placeholder="Subject of your message" required=""
                                type="text" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="message">
                                Pesan
                            </label>
                            <textarea
                                class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange1 focus:border-orange1 resize-none"
                                id="message" name="pesan" placeholder="Tulis pesan disini .." required=""
                                rows="5"></textarea>
                        </div>
                        <button
                            class="btn_kirim w-full bg-orange3 hover:bg-orange2 text-white font-semibold py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-orange1 focus:ring-offset-1 transition"
                            type="submit">
                            Kirim Pesan
                        </button>
                        <button disabled type="button"
                            class="btn_loading w-full bg-orange3 hover:bg-orange2 text-white font-semibold py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-orange1 focus:ring-offset-1 transition hidden ">
                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="#E5E7EB" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentColor" />
                            </svg>
                            Loading...
                        </button>
                    </form>
                </div>
                <div class="md:w-1/2 bg-cream p-8 flex flex-col justify-center space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Info Kontak</h3>
                    <p class="text-gray-700">
                        <i class="fas fa-map-marker-alt text-orange3 mr-3"> </i>
                        Perum Jl. Wirasana Indah, RT.03/RW.06, Wirasana, Kec. Purbalingga, Kabupaten Purbalingga, Jawa
                        Tengah 53318
                    </p>
                    <p class="text-gray-700">
                        <i class="fas fa-phone-alt text-orange3 mr-3"> </i>
                        +6288220132902
                    </p>
                    <p class="text-gray-700">
                        <i class="fas fa-envelope text-orange3 mr-3"> </i>
                        makjuicipicip@gmail.com
                    </p>
                    <div class="mt-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d751.9617652048389!2d109.36510062807783!3d-7.38102125414557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559b7c1058d0d%3A0x7968cc27d05188e1!2sMakaroni%20Keju%20Icip%20-%20Icip!5e1!3m2!1sid!2sid!4v1747199557813!5m2!1sid!2sid"
                            class="rounded-lg shadow-md w-full" width="400" height="300" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>


                    <div class="flex space-x-4 mt-6">
                        <a aria-label="Facebook" class="text-orange3 hover:text-orange2 transition" href="#">
                            <i class="fab fa-facebook fa-2x"> </i>
                        </a>
                        <a aria-label="Instagram" class="text-orange3 hover:text-orange2 transition"
                            href="https://www.instagram.com/makjuicip_icippurbalingga/?utm_source=ig_web_button_share_sheet">
                            <i class="fab fa-instagram fa-2x"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbyhmrsYic0GwjYZcu0-aAUJTB6_324H9tawVwCyTJu5Q9-pCPFLTe4vrKdN-Upa9qudsA/exec'
        const form = document.forms['Form-Contact-Icip']
        const btnKirim = document.querySelector('.btn_kirim');
        const btnLoading = document.querySelector('.btn_loading');
        const alertberhasil = document.querySelector('.berhasilalert');
        const alertgagal = document.querySelector('.gagalalert');

        form.addEventListener('submit', e => {
            btnLoading.classList.toggle('hidden');
            btnKirim.classList.toggle('hidden');
            e.preventDefault()
            fetch(scriptURL, { method: 'POST', body: new FormData(form) })
                .then(response => {
                    btnLoading.classList.toggle('hidden');
                    btnKirim.classList.toggle('hidden');
                    alertberhasil.classList.toggle('hidden');
                    setTimeout(() => alertberhasil.classList.toggle('hidden'), 3000);
                    form.reset();
                    console.log('Success!', response);

                })
                .catch(error => {
                    alertgagal.classList.toggle('hidden');
                    setTimeout(() => alertgagal.classList.toggle('hidden'), 3000);
                    form.reset();
                    console.error('Error!', error.message);
                })
        })
    </script>
</x-font-layout>