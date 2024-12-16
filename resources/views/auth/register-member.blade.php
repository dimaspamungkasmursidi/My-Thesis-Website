<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Member</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-blue-500 to-blue-700 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-xl">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Create an Account</h2>
        <p class="text-center text-gray-600 mb-4 text-sm">
            Join our library today and enjoy exclusive benefits!
        </p>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="bg-red-50 text-red-600 text-sm p-4 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.member') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo (optional)</label>
                <input type="file" name="photo" id="photo" accept="image/*" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">WhatsApp Number</label>
                <input type="text" name="whatsapp_number" id="whatsapp_number" required value="{{ old('whatsapp_number') }}"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="e.g., +62 812 3456 7890">
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-2 px-4 rounded-lg shadow-md hover:shadow-lg hover:from-blue-500 hover:to-blue-300 focus:outline-none focus:ring focus:ring-blue-300 transition duration-200">
                    Register Now
                </button>
            </div>
        </form>

        <p class="text-center text-gray-600 mt-6 text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 font-medium hover:underline">Log in</a>
        </p>
    </div>
</body>
</html>
