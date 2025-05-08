<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Laravel Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 text-gray-800">


    <nav class="bg-white shadow mb-8 py-4">
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
            <div class="text-xl font-bold">My Blog</div>
            <ul class="flex space-x-6">
                <li>
                    <a 
                        href="{{ route('posts.index') }}" 
                        class="{{ request()->routeIs('posts.index') ? 'text-blue-600 font-semibold' : 'hover:text-blue-500' }}">
                        Posts
                    </a>
                </li>
                <li>
                    <a 
                        href="{{ route('posts.create') }}" 
                        class="{{ request()->routeIs('posts.create') ? 'text-blue-600 font-semibold' : 'hover:text-blue-500' }}">
                        Create Post
                    </a>
                </li>
                <li>
                    <a 
                        href="{{ route('home') }}" 
                        class="{{ request()->routeIs('comments.index') ? 'text-blue-600 font-semibold' : 'hover:text-blue-500' }}">
                        Comments
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    

    <div class="container mx-auto px-6 md:px-12">
        {{ $slot }}
    </div>

</body>
</home