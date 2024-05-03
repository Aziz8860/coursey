<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('New Teacher') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">

        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="w-full rounded-3xl bg-red-500 py-3 text-white">
              {{ $error }}
            </div>
          @endforeach
        @endif

        <form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
          @csrf

          <div>
            <x-input-label for="email" :value="__('email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
              required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <div class="mt-4 flex items-center justify-end">

            <button type="submit" class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
              Add New Teacher
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>
