<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-4">My Profile</h2>

            <div class="mb-4">
                <img src="{{ asset('storage/' . $member->photo) }}" alt="Profile Photo" class="rounded-full mx-auto w-32 h-32 object-cover">
            </div>

            <div class="mb-4">
                <strong>Name:</strong> {{ $member->name }}
            </div>

            <div class="mb-4">
                <strong>Email:</strong> {{ $member->email }}
            </div>

            <div class="mb-4">
                <strong>WhatsApp Number:</strong> {{ $member->whatsapp_number }}
            </div>

            <div class="mb-4">
                <strong>Address:</strong> {{ $member->address }}
            </div>

            <div class="mt-4">
                <a href="{{ route('profile.edit') }}" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 text-center block">Edit Profile</a>
            </div>
        </div>
    </div>
</body>
</html>
