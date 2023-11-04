<div id="editakun-modal" tabindex="-1" aria-hidden="true"
class="fixed top-0 bottom-0 right-0 z-50 hidden w-full max-h-full transition-all duration-300 md:w-1/3">
<div class="h-full overflow-y-auto">
    <div class="p-4 bg-white rounded-lg">
        <form enctype="multipart/form-data" method="post" action="/dashboarduser/update-profile">
            @csrf
            <div class="py-1">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Perbarui Profil</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Silakan ubah informasi pribadi Anda</p>
            </div>
            <div class="grid grid-cols-1 mt-2 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama Baru</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required value="{{ old('name', auth()->user()->name) }}">
                    </div>
                </div>
        
                <div class="sm:col-span-4">
                    <label for="numberphone" class="block text-sm font-medium leading-6 text-gray-900">Nomor HP</label>
                    <div class="mt-2">
                        <input id="numberphone" name="numberphone" type="tel" autocomplete="given-numberphone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required value="{{ old('numberphone', auth()->user()->numberphone) }}">
                    </div>
                </div>
        
                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="given-email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required value="{{ old('email', auth()->user()->email) }}">
                    </div>
                </div>
        
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Kata Sandi Baru</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
        
                <div class="sm:col-span-3">
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Kata Sandi</label>
                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
                <div class="col-span-full">
                    <label for="avatar" class="block text-sm font-medium leading-6 text-gray-900">Update Foto Profil</label>
                    <div class="flex items-center mt-2 gap-x-3">
                        <input type="file" name="avatar" id="avatar" accept="image/*">
                        <img id="avatar-preview" class="w-10 h-10 bg-white rounded-full" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('feather/user.svg') }}" alt="user photo">
                    </div>
                </div>
            </div>
        
            <div class="flex items-center justify-end mt-6 gap-x-6">
                <button id="cancelButton" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>
    </div>
</div>
</div>