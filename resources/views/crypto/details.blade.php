<x-app>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <div class="container mx-auto py-8">
        <div class="flex items-center">
            <div class="w-1/2">
                <div class="flex items-center">
                    <img src="{{ $crypto['image']['large'] }}" class="w-10 h-10 mr-2" />
                    <h1 class="text-2xl font-bold mb-4">{{ $crypto['name'] }}</h1>
                </div>
                <div class="flex items-center mb-4">
                    <h2 class="text-4xl font-bold mr-2">${{ number_format($crypto['market_data']['current_price']['usd'], 2) }}</h2>
                </div>
                <p class="mb-4">Market Cap: ${{ number_format($crypto['market_data']['market_cap']['usd']) }}</p>
            </div>
            <div class="w-1/2">
                <h2 class="text-xl font-bold mb-2">Comparison to Other Currencies:</h2>
                <div class="flex items-center">
                    <div>
                        <h3 class="text-lg font-bold mb-2">Bitcoin (BTC):</h3>
                        <p>Price: {{ number_format($crypto['market_data']['current_price']['btc'], 8) }} BTC</p>
                        <p>Market Cap: {{ number_format($crypto['market_data']['market_cap']['btc'], 0) }} BTC</p>
                    </div>
                    <div class="ml-8">
                        <h3 class="text-lg font-bold mb-2">Ethereum (ETH):</h3>
                        <p>Price: {{ number_format($crypto['market_data']['current_price']['eth'], 8) }} ETH</p>
                        <p>Market Cap: {{ number_format($crypto['market_data']['market_cap']['eth'], 0) }} ETH</p>
                    </div>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-bold mb-2">Other Currencies:</h3>
                    <p>Price in USD: ${{ number_format($crypto['market_data']['current_price']['usd'], 2) }}</p>
                    <p>Price in EUR: €{{ number_format($crypto['market_data']['current_price']['eur'], 2) }}</p>
                    <p>Price in JPY: ¥{{ number_format($crypto['market_data']['current_price']['jpy'], 2) }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8">
            <a href="{{ route('crypto.list') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
        </div>
    </div>

</x-app>
