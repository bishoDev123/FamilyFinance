<x-layout>
    <x-section header="All transactions">
        <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Username</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @foreach($transactions as $transaction)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-400">#{{ $transaction->id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $transaction->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction->created_at }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction->description }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-left">${{ $transaction->amount }}</td>
                        @if($transaction->type == 'withdraw')
                            <td class="px-6 py-4 text-sm font-medium text-red-500 text-left">{{ $transaction->type }}</td>
                        @elseif($transaction->type == 'deposit')
                            <td class="px-6 py-4 text-sm font-medium text-green-500 text-left">{{ $transaction->type }}</td>
                        @endif
                        <td class="px-6 py-4 text-center">
                            <x-menu></x-menu>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
</x-layout>
