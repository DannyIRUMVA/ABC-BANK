<x-app-layout>
    <div class="flex py-12 ml-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm w-[50em]" style="font-size: 1em;">
                <div class="p-3 text-gray-500 border-b-2 border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Statement of Account</h1>
                    @if ($statement->isEmpty())
                        <p class="text-gray-500">No transactions found.</p>
                    @else
                </div>
                <div class="p-3 text-1xl text-gray-500 border-b-2 border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Balance</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($statement as $transaction)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $transaction->created_at }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $transaction->amount }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $transaction->type }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $transaction->details }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $transaction->balance }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-3 text-gray-500 border-b-2 border-gray-200">
                    {{ $statement->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
