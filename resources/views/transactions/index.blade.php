<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">ID</th>
                            <th class="border px-6 py-4">Produk</th>
                            <th class="border px-6 py-4">User</th>
                            <th class="border px-6 py-4">Ukuran</th>
                            <th class="border px-6 py-4">Harga</th>
                            <th class="border px-6 py-4">Tanggal Transaksi</th>
                            <th class="border px-6 py-4">Status</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @forelse($transaction as $item)
                            @inject('carbon', 'Carbon\Carbon', Carbon::setLocale('id'))
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4 ">{{ $item->food->name }}</td>
                                <td class="border px-6 py-4 ">{{ $item->user->name }}</td>
                                <td class="border px-6 py-4">{{ $item->food->ukuran }}</td>
                                <td class="border px-6 py-4">{{ number_format($item->total) }}</td>
                                <td class="border px-6 py-4">
                                    {{ $carbon::parse($item->created_at)->setTimezone('Asia/Jakarta')->format('d-m-Y H:i:s') }}
                                </td>
                                <td class="border px-6 py-4">{{ $item->status }}</td>
                                <td class="border px-6 py- text-center">
                                    <a style="background-color: blue;"
                                        href="{{ route('transactions.show', $item->id) }}"
                                        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('transactions.destroy', $item->id) }}" method="POST"
                                        class="inline-block">
                                        <br>
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button style="background-color: red;" type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @empty
                            <tr>
                                <td colspan="7" class="border text-center p-5">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $transaction->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
