<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction &raquo; {{ $transaction->food->name }} by {{ $transaction->user->name }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full rounded overflow-hidden shadow-lg px-6 py-6 bg-white">
                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                    <div class="w-full md:w-1/6 px-4 mb-4 md:mb-0">
                        <img src="{{ $item->food->picturePath }}" alt="" class="w-full rounded">
                    </div>
                    <div class="w-full md:w-5/6 px-4 mb-4 md:mb-0">
                        <div class="flex flex-wrap mb-3">
                            <div class="w-2/6">
                                <div class="text-sm">Product Name</div>
                                <div class="text-xl font-bold">{{ $item->food->name }}</div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm">Quantity</div>
                                <div class="text-xl font-bold">{{ number_format($item->quantity) }}</div>
                            </div>
                            <div class="w-2/6">
                                <div class="text-sm">Total</div>
                                <div class="text-xl font-bold">{{ number_format($item->total) }}</div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm">Status</div>
                                <div class="text-xl font-bold">{{ $item->status }}</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                            <div class="w-2/6">
                                <div class="text-sm">User Name</div>
                                <div class="text-xl font-bold">{{ $item->user->name }}</div>
                            </div>
                            <div class="w-3/6">
                                <div class="text-sm">Email</div>
                                <div class="text-xl font-bold">{{ $item->user->email }}</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                            <div class="w-1/6">
                                <div class="text-sm">Phone</div>
                                <div class="text-xl font-bold">{{ $item->user->phoneNumber }}</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                            <div class="w-5/6">
                                <div class="text-sm">Payment URL</div>
                                <div class="text-lg">
                                    <a href="{{ $item->payment_url }}">{{ $item->payment_url }}</a>
                                </div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm mb-1">Change Status</div>
                                <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'ON_DELIVERY']) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold px-2 rounded block text-center w-full mb-1">
                                    On Delivery
                                </a>
                                <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'DELIVERED']) }}"
                                    class="bg-green-500 hover:bg-green-700 text-black font-bold px-2 rounded block text-center w-full mb-1">
                                    Delivered
                                </a>
                                <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'CANCELLED']) }}"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                    Cancelled
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container my-5">
        <h3 class="mb-3">DATA Transaksi</h3>
        <div class="row d-flex align-items-center">
            <div class="col-md-4">
                <img src="{{ $transaction->image }}" alt="" class="w-100 rounded mb-4">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th scope="col">id</th> --}}
                            <th scope="col">produk</th>
                            <th scope="col">qty</th>
                            <th scope="col">total</th>
                            <th scope="col">status</th>
                            <th scope="col">payment type</th>
                            <th scope="col">changeStatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <td>{{ $transaction->id }}</td> --}}
                            <td>{{ $transaction->food->name }}</td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>{{ $transaction->total }}</td>
                            <td>{{ $transaction->status }}</td>
                            <td>{{ $transaction->payment_type }}</td>
                            <td>
                                <a href="{{ route('transactions.changeStatus', ['id' => $transaction->id, 'status' => 'ACCEPT']) }}"
                                    class="btn btn-success btn-block mb-1">Accept</a>
                                <a href="{{ route('transactions.changeStatus', ['id' => $transaction->id, 'status' => 'CANCELLED']) }}"
                                    class="btn btn-danger btn-block mb-1">Cancelled</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="mb-3">DATA USER</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">foto produk</th>
                    <th scope="col">username</th>
                    <th scope="col">phoneNumber</th>
                    <th scope="col">nrp</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="{{ $transaction->food->picturePath }}" alt="" class="w-100 rounded mb-4">
                    </td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->user->phoneNumber }}</td>
                    <td>{{ $transaction->user->nrp }}</td>
                    <td>{{ $transaction->user->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</x-app-layout>
