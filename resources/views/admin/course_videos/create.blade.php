<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Add Video to Course') }}
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

        <div class="item-card flex flex-row items-center justify-between gap-y-10">
          <div class="flex flex-row items-center gap-x-3">
            <img src="{{ Storage::url($course->thumbnail) }}" alt=""
              class="h-[90px] w-[120px] rounded-2xl object-cover">
            <div class="flex flex-col">
              <h3 class="text-xl font-bold text-indigo-950">{{ $course->name }}</h3>
              <p class="text-sm text-slate-500">{{ $course->category->name }}</p>
            </div>
          </div>
          <div>
            <p class="text-sm text-slate-500">Teacher</p>
            <h3 class="text-xl font-bold text-indigo-950">{{ $course->teacher->user->name }}</h3>
          </div>
        </div>

        <hr class="my-5">

        <form method="POST" action="{{ route('admin.course.add_video.save', $course->id) }}"
          enctype="multipart/form-data">
          @csrf

          <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
              :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="path_video" :value="__('path_video')" />
            <x-text-input id="path_video" class="mt-1 block w-full" type="text" name="path_video"
              :value="old('path_video')" required autofocus autocomplete="path_video" />
            <x-input-error :messages="$errors->get('path_video')" class="mt-2" />
          </div>

          <div class="mt-4 flex items-center justify-end">

            <button type="submit"
              class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
              Add New Video
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>