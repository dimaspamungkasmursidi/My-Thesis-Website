<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Members List') }}
        </h2>
    </x-slot>

    <section class="container mx-auto sm:p-8 sm:pt-12">
        <section class="bg-gray-800 p-8 sm:rounded-lg shadow-lg space-y-4">
            <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
                <table class="table-auto w-full border-collapse border border-gray-700">
                    <thead class="bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700">
                        <tr>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">No</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Nama</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Email</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Tanggal Bergabung</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Whatsapp</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Alamat</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800">
                        @foreach ($members as $id => $member)
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                                <td class="px-6 py-4 text-gray-200">{{ $members->firstItem() + $id }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $member->name }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $member->email }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $member->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $member->whatsapp_number ?? 'No WhatsApp' }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $member->address ?? 'No Address' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $members->links('pagination::tailwind') }}
            </div>
        </section>
    </section>
</x-app-layout>
