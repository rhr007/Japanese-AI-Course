<x-layout>
    <h1 class="text-3xl font-bold mb-6 text-fuchsia-700">Edit Post</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold mb-1">Title</label>
            <input type="text" name="title" id="title"
                class="w-full border {{ $errors->has('title') ? 'border border-red-500' : 'border border-gray-300' }} rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold mb-1">Description</label>
            <textarea name="description" id="description" rows="5"
                class="w-full border {{ $errors->has('description') ? 'border border-red-500' : 'border border-gray-300' }} rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>{{ old('description', $post->description) }}</textarea>
        </div>

        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
            Update Post ✅
        </button>
    </form>
</x-layout>
