<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-row items-center justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Manage Courses') }}
      </h2>
      <a href="{{ route('admin.courses.create') }}"
        class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
        Add New
      </a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex flex-col gap-y-5 overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">
        @forelse ($courses as $course)
          <div class="item-card flex flex-col justify-between gap-y-10 md:flex-row md:items-center">
            <div class="flex flex-row items-center gap-x-3">
              <img src="{{ Storage::url($course->thumbnail) }}" alt=""
                class="h-[90px] w-[120px] rounded-2xl object-cover">
              <div class="flex flex-col">
                <h3 class="text-xl font-bold text-indigo-950">{{ $course->name }}</h3>
                <p class="text-sm text-slate-500">{{ $course->category->name }}</p>
              </div>
            </div>
            <div class="hidden flex-col md:flex">
              <p class="text-sm text-slate-500">Students</p>
              <h3 class="text-xl font-bold text-indigo-950">{{ $course->students->count() }}</h3>
            </div>
            <div class="hidden flex-col md:flex">
              <p class="text-sm text-slate-500">Videos</p>
              <h3 class="text-xl font-bold text-indigo-950">{{ $course->course_videos->count() }}
              </h3>
            </div>
            <div class="hidden flex-col md:flex">
              <p class="text-sm text-slate-500">Teacher</p>
              <h3 class="text-xl font-bold text-indigo-950">{{ $course->teacher->user->name }}</h3>
            </div>
            <div class="hidden flex-row items-center gap-x-3 md:flex">
              <a href="{{ route('admin.courses.show', $course) }}"
                class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                Manage
              </a>

              <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="rounded-full bg-red-700 px-6 py-4 font-bold text-white">
                  Delete
                </button>
              </form>
            </div>
          </div>

      </div>
    @empty
      <p>Belum ada kelas yang ditambahkan</p>
      @endforelse

    </div>
  </div>
</x-app-layout>
