<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Transaction::all();
    // }

    public function collection()
    {
        // Set the locale to Indonesian for date and time formatting
        Carbon::setLocale('id');

        return Transaction::join('users', 'transactions.user_id', '=', 'users.id')
            ->join('produks', 'transactions.food_id', '=', 'produks.id')
            ->select(
                'transactions.id',
                'users.name as user_name',
                'produks.name as food_name',
                'transactions.quantity',
                'transactions.total',
                'transactions.status',
                'transactions.payment_type',
                'transactions.payment_url',
                'transactions.deleted_at',
                'transactions.created_at',
                'transactions.updated_at'
            )
            ->get()
            ->map(function ($transaction) {
                return [
                    $transaction->id,
                    $transaction->user_name,
                    $transaction->food_name,
                    $transaction->quantity,
                    $transaction->total,
                    $transaction->status,
                    $transaction->payment_type,
                    $transaction->payment_url,
                    // $transaction->deleted_at,
                    Carbon::createFromTimestamp($transaction->deleted_at)
                        ->setTimezone('Asia/Jakarta')
                        ->format('d-m-Y H:i:s'),
                    Carbon::createFromTimestamp($transaction->created_at)
                        ->setTimezone('Asia/Jakarta')
                        ->format('d-m-Y H:i:s'), // Convert to WIB and format created_at
                    Carbon::createFromTimestamp($transaction->updated_at)
                        ->setTimezone('Asia/Jakarta')
                        ->format('d-m-Y H:i:s'),
                    // $transaction->created_at->format('d-m-Y H:i:s'), // Format created_at
                    // $transaction->updated_at->format('d-m-Y H:i:s'),
                    // Carbon::createFromTimestamp($transaction->created_at)->format('d-m-Y H:i:s'), // Convert and format created_at
                    // Carbon::createFromTimestamp($transaction->updated_at)->format('d-m-Y H:i:s'), // Convert and format updated_at // Format updated_at
                ];
            });
    }

    // public function view(): View
    // {
    //     return view('transactions.index', [
    //         'transaction' => Transaction::all()
    //     ]);
    // }


    public function headings(): array
    {
        return [
            'id',
            'nama_user',
            'nama_produk',
            'quantity',
            'total',
            'status',
            'payment_type',
            'payment_url',
            'deleted_at',
            'created_at',
            'updated_at',
        ];
    }
}
