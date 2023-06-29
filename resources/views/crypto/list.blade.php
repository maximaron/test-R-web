<x-app>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto py-8 text-center dark-mode:bg-gray-900 dark-mode:text-white">
        <h1 class="text-2xl font-bold mb-4">Top 100 Cryptocurrencies</h1>
        <div class="dark-mode-toggle">
            <input type="checkbox" id="darkModeToggle" />
            <label for="darkModeToggle"></label>
        </div>
        <table class="border-collapse border border-gray-300 dark-mode:border-gray-600 w-full">
            <thead>
                <tr>
                    <th class="p-2 border border-gray-300">ID</th>
                    <th class="p-2 border border-gray-300">Name</th>
                    <th class="p-2 border border-gray-300">Price</th>
                    <th class="p-2 border border-gray-300">Top 24h</th>
                    <th class="p-2 border border-gray-300">Bottom 24h</th>
                    <th class="p-2 border border-gray-300">Market Cap</th>
                </tr>
            </thead>
            <tbody id="crypto-table-body">
                @foreach ($cryptos as $crypto)
                    <tr class="border border-gray-300 crypto-row" data-url="{{ route('crypto.details', $crypto['id']) }}">
                        <td class="p-2 border border-gray-300">{{ $crypto['market_cap_rank'] }}</td>
                        <td class="p-2 border border-gray-300">
                            <div class="flex items-center">
                                <img src="{{ $crypto['image'] }}" class="w-7 h-7 mr-2" />
                                <a href="{{ route('crypto.details', $crypto['id']) }}">{{ $crypto['name'] }} - {{ $crypto['symbol'] }}</a>
                            </div>
                        </td>
                        <td class="p-2 border border-gray-300">${{ number_format($crypto['current_price'], 4) }}</td>
                        <td class="p-2 border border-gray-300">{{ $crypto['price_change_percentage_24h'] }}%</td>
                        <td class="p-2 border border-gray-300">{{ $crypto['price_change_percentage_24h'] }}%</td>
                        <td class="p-2 border border-gray-300">${{ number_format($crypto['market_cap']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.crypto-row').click(function () {
                var url = $(this).data('url');
                window.location.href = url;
            });
            $('#darkModeToggle').change(function () {
                if ($(this).is(':checked')) {
                    $('body').addClass('dark-mode');
                } else {
                    $('body').removeClass('dark-mode');
                }
            });
        });
    </script>
</x-app>
