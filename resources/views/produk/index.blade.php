<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a style="background-color: green;" href="{{ route('produk.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Create produk
                </a>
            </div>

            <br>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <!-- <th class="border px-6 py-4">ID</th> -->
                            <th class="border px-6 py-4">Name</th>
                            <th class="border px-6 py-4">Ukuran</th>
                            <th class="border px-6 py-4">Price</th>
                            <th class="border px-6 py-4">Gambar</th>
                            <!-- <th class="border px-6 py-4">Rate</th> -->
                            <th class="border px-6 py-4">Types</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk as $item)
                            <tr>
                                <!-- <td class="border px-6 py-4">{{ $item->id }}</td> -->
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4 ">{{ $item->ukuran }}</td>
                                <td class="border px-6 py-4">{{ number_format($item->price) }}</td>
                                <td class="border px-6 py-4">
                                    <div class="w-full md:w-1/6 px-4 mb-4 md:mb-0">
                                        <img src="{{ $item->picturePath }}" alt=""
                                            class=" bg-[length:100px_50px]">
                                    </div>
                                </td>
                                <!-- <td class="border px-6 py-4">{{ $item->rate }}</td> -->
                                <td class="border px-6 py-4">{{ $item->types }}</td>
                                <td class="border px-6 py- text-center">
                                    {{-- <a style="background-color: blue;" href="{{ route('produk.edit', $item->id) }}"
                                        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                    </a> --}}
                                    <form action="{{ route('produk.edit', $item->id) }}" class="inline-block">
                                        <br>
                                        <button style="background-color: blue;" type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                                        class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button style="background-color: red;" type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                            class="bg-red-500 hover-bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>

                                    {{-- <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                                        class="inline-block">
                                        <br>
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button style="background-color: red;" type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border text-center p-5">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $produk->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
