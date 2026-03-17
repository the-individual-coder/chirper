<x-layouts.layout>
  <x-slot name=title>
    Home Feed
  </x-slot>

  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mt-8">Latest Chirps</h1>
    <!-- Chirp Form -->
    <x-chirp.form />
    <!-- Feed -->
    <div class="space-y-4 mt-8">
      @forelse ($chirps as $chirp)
      <x-chirp :chirp="$chirp" />
      @empty
      <x-chirp.empty />
      @endforelse
    </div>
  </div>
</x-layouts.layout>