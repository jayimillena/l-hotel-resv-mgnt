<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Hotel Reservation Management') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <section class="bg-[#003580] text-white pt-16 pb-24 px-6">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-5xl font-bold mb-4">Unlock Flights savings with members-only deals</h1>
                <p class="text-xl mb-8">Save more on flights marked with the Genius label.</p>
                <button class="bg-[#0071c2] hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-sm transition">
                    Sign in or register
                </button>
            </div>
        </section>

        <div class="max-w-6xl mx-auto px-6 -mt-8">
            <form class="bg-[#ffb700] p-1 rounded-lg shadow-lg flex flex-col md:flex-row gap-1">
                <div class="flex-1 bg-white flex items-center px-4 py-3 rounded-l-md md:rounded-l-sm">
                    <span class="text-gray-400 mr-3">🛏️</span>
                    <input type="text" placeholder="Where are you going?" class="w-full outline-none text-gray-800">
                </div>

                <div class="flex-1 bg-white flex items-center px-4 py-3">
                    <span class="text-gray-400 mr-3">📅</span>
                    <input type="text" placeholder="Check-in date — Check-out date" class="w-full outline-none text-gray-800">
                </div>

                <div class="flex-1 bg-white flex items-center px-4 py-3">
                    <span class="text-gray-400 mr-3">👤</span>
                    <select class="w-full outline-none text-gray-800 bg-transparent">
                        <option>2 adults · 0 children · 1 room</option>
                    </select>
                </div>

                <button type="submit" class="bg-[#0071c2] text-white px-8 py-3 rounded-r-md md:rounded-r-sm font-bold text-xl hover:bg-blue-700">
                    Search
                </button>
            </form>

            <section class="max-w-6xl mx-auto px-6 py-16">
                <h2 class="text-2xl font-bold mb-6">Why Booking.com?</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @php
                        $features = [
                            ['icon' => '📅', 'title' => 'Book now, pay at the property', 'desc' => 'FREE cancellation on most rooms'],
                            ['icon' => '👍', 'title' => '300M+ reviews from fellow travelers', 'desc' => 'Get trusted information from guests like you'],
                            ['icon' => '🌍', 'title' => '2+ million properties worldwide', 'desc' => 'Hotels, guest houses, apartments, and more...'],
                            ['icon' => '🎧', 'title' => 'Trusted 24/7 customer service', 'desc' => "We're always here to help"],
                        ];
                    @endphp

                    @foreach($features as $feature)
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100 flex flex-col items-start">
                            <span class="text-3xl mb-4">{{ $feature['icon'] }}</span>
                            <h3 class="font-bold text-sm mb-2">{{ $feature['title'] }}</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $feature['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
            
            <div class="mt-4 flex items-center gap-2">
                <input type="checkbox" id="flights" class="w-5 h-5">
                <label for="flights" class="text-gray-700">Add flights</label>
            </div>
        </div>
    </body>
</html>
