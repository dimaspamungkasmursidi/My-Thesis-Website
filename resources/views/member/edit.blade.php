<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-4">Edit Profile</h2>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" required class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="whatsapp_number" class="block text-sm font-medium">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $member->whatsapp_number) }}" required class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium">Address</label>
                    <textarea name="address" id="address" required class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">{{ old('address', $member->address) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="photo" class="block text-sm font-medium">Photo</label>
                    <input type="file" name="photo" id="photo" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                    <small class="text-gray-500">Leave blank if you don't want to change the password.</small>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
