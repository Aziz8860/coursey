<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-row items-center justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Manage Teachers') }}
      </h2>
      <a href="{{ route('admin.teachers.create') }}" class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
        Add New
      </a>
    </div>
  </x-slot>
  <div>

  </div>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex flex-col gap-y-5 overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">
        @forelse ($teachers as $teacher)
          <div class="item-card flex flex-row items-center justify-between">
            <div class="flex flex-row items-center gap-x-3">
              <img src="{{ Storage::url($teacher->user->avatar) }}" alt=""
                class="h-[90px] w-[90px] rounded-2xl object-cover">
              <div class="flex flex-col">
                <h3 class="text-xl font-bold text-indigo-950">{{ $teacher->user->name }}</h3>
                <p class="text-sm text-slate-500">{{ $teacher->user->occupation }}</p>
              </div>
            </div>
            <div class="hidden flex-col md:flex">
              <p class="text-sm text-slate-500">Become teacher since</p>
              <h3 class="text-xl font-bold text-indigo-950">{{ $teacher->created_at }}</h3>
            </div>
            <div class="hidden flex-row items-center gap-x-3 md:flex">
              <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-full bg-red-700 px-6 py-4 font-bold text-white">
                  Delete
                </button>
              </form>
            </div>
          </div>
        @empty
          <p>Tidak ada data guru tersedia.</p>
        @endforelse
      </div>
    </div>
  </div>
</x-app-layout>
