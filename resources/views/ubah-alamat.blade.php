<x-app-layout>
    <div class="fixed inset-0  flex items-center justify-center">
    <div class="bg-white rounded-lg w-full shadow-lg max-w-2xl p-6">
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h2 class="text-2xl font-bold">Ubah Alamat</h2>
            {{-- <button onclick="toggleModal('editAlamatModal')" class="text-gray-500 hover:text-red-500 text-2xl">&times;</button> --}}
        </div>

        <form action="{{ route('alamat.update', $alamat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" class="w-full border border-gray-300 rounded p-2" value="{{ $alamat->nama }}" required>
                </div>
                <div>
                    <label for="nomer" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="nomer" class="w-full border border-gray-300 rounded p-2" value="{{ $alamat->nomer }}" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <input type="text" name="provinsi" class="w-full border border-gray-300 rounded p-2" value="{{ $alamat->provinsi }}" required>
                    </div>
                    <div>
                        <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                        <input type="text" name="kota" class="w-full border border-gray-300 rounded p-2" value="{{ $alamat->kota }}" required>
                    </div>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="w-full border border-gray-300 rounded p-2" value="{{ $alamat->alamat }}" required>
                </div>
                <div>
                    <label for="patokan" class="block text-sm font-medium text-gray-700">Patokan</label>
                    <input type="text" name="patokan" class="w-full border border-gray-300 rounded p-2" value="{{ $alamat->patokan }}" required>
                </div>
                {{-- <div class="flex items-center">
                    <input type="checkbox" id="isdefault" name="isdefault" value="1" class="mr-2" {{ $alamat->isdefault ? 'checked' : '' }}>
                    <label for="isdefault" class="text-sm text-gray-700">Jadikan sebagai alamat utama</label>
                </div> --}}
            </div>

            <div class="mt-6 flex justify-end gap-2">
                <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Batal
                </button>
                <button type="submit" class="bg-orange3 text-white px-4 py-2 rounded hover:bg-orange2">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

</x-app-layout>