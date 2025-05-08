<x-layout>
    <h1 class="text-3xl font-bold mb-6 text-fuchsia-700">All Posts</h1>

    @forelse ($posts as $post)
        <div class="bg-white p-6 rounded shadow mb-4 cursor-pointer hover:bg-orange-300 hover:text-white">
            <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
            <p class="text-gray-700 mt-2">{{ Str::limit($post->body, 150) }}</p>
            <p class="text-sm text-gray-400 mt-2">Posted on {{ $post->created_at->format('M d, Y') }}</p>
            <div class="flex space-x-4 mt-4">
                <a href="{{ route('posts.edit', $post) }}"
                class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
            
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No posts yet. Go ahead and <a href="{{ route('posts.create') }}" class="text-blue-500 underline">create one</a>!</p>
    @endforelse
</x-layout>
