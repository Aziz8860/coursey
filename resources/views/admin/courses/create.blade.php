<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('New Course') }}
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

        <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
          @csrf

          <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
              :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="thumbnail" :value="__('thumbnail')" />
            <x-text-input id="thumbnail" class="mt-1 block w-full" type="file" name="thumbnail"
              required autofocus autocomplete="thumbnail" />
            <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="path_trailer" :value="__('Path Trailer (from Youtube)')" />
            <x-text-input id="path_trailer" class="mt-1 block w-full" type="text"
              name="path_trailer" :value="old('path_trailer')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('path_trailer')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="category" :value="__('category')" />

            <select name="category_id" id="category_id"
              class="w-full rounded-lg border border-slate-300 py-3 pl-3">
              <option value="">Choose category</option>
              @forelse($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}
                </option>
              @empty
              @endforelse
            </select>

            <x-input-error :messages="$errors->get('category')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="about" :value="__('about')" />
            <textarea name="about" id="about" cols="30" rows="5"
              class="w-full rounded-xl border border-slate-300"></textarea>
            <x-input-error :messages="$errors->get('about')" class="mt-2" />
          </div>

          <hr class="my-5">

          <div class="mt-4">
            <div class="flex flex-col gap-y-5">
              <x-input-label for="keypoints" :value="__('keypoints')" />
              @for ($i = 0; $i < 4; $i++)
                <input type="text" class="rounded-lg border border-slate-300 py-3"
                  placeholder="Write your copywriting" name="course_keypoints[]">
              @endfor
            </div>
            <x-input-error :messages="$errors->get('keypoints')" class="mt-2" />
          </div>

          <div class="mt-4 flex items-center justify-end">

            <button type="submit"
              class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
              Add New Course
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>
