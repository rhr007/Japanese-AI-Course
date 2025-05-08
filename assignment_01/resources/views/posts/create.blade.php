<x-layout>
    <h1 class="text-3xl font-bold mb-6 text-fuchsia-700">Create New Post</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold mb-1">Title</label>
            <input type="text" name="title" id="title"
                class="w-full border border-red-500 rounded px-3 py-2 focus:outline-lime-600 focus:ring-offset-red-200 focus:ring-blue-500"
                value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-sm font-semibold mb-1">Body</label>
            <textarea name="description" id="body" rows="5"
class="w-full border border-red-500 rounded px-3 py-2 focus:outline-lime-600 focus:ring-offset-red-200 focus:ring-blue-500"
                required>{{ old('description') }}</textarea>
        </div>

        <button type="submit"
            class="w-50 bg-green-400 hover:bg-green-500 hover:text-white text-black font-semibold py-2 px-4 rounded cursor-pointer">
            Publish
        </button>
    </form>
</x-layout>
