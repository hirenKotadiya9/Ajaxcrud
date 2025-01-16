<nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-bold">MyWebsite</div>
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('home') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Home</a>
                <a href="{{ route('countries.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Country</a>
                <a href="{{ route('about') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Services</a>
            </div>
        </div>
    </nav>
