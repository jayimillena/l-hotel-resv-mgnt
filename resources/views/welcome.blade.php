<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Hotel Reservation Management') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </head>
    <body>
        <section class="bg-[#003580] text-white pt-12 pb-24 px-6">
            <div class="max-w-6xl mx-auto">
                <div class="mb-8">
                    <img src="{{ asset('images/logo.png') }}" 
                        alt="La Roca Veranda Logo" 
                        class="h-16 md:h-24 w-auto object-contain">
                </div>

                <h1 class="text-5xl font-bold mb-4 leading-tight">
                    Elevating Every Moment of Your Journey.
                </h1>
                
                <p class="text-xl mb-8 max-w-3xl opacity-90">
                    "Welcome to La Roca Veranda Suites and Restaurant, where our commitment to seamless service ensures your stay is as effortless as it is memorable. We are delighted to have you with us and look forward to providing you with an exceptional experience defined by true hospitality."
                </p>

                <div class="flex gap-4">
                    <a href="{{ route('login') }}">
                        <button class="bg-[#0071c2] hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-sm transition shadow-md">
                            Sign in or register
                        </button>    
                    </a>
                    <button class="border border-white hover:bg-white hover:text-[#003580] text-white font-semibold py-3 px-8 rounded-sm transition">
                        Book a Room
                    </button>
                </div>
            </div>
        </section>
        <div class="max-w-6xl mx-auto px-6 -mt-8">
            <form class="p-1 rounded-lg shadow-lg flex flex-col md:flex-row gap-1">
                <div class="flex-1 bg-white flex items-center px-4 py-3 relative cursor-pointer" 
                    x-data="datePicker()" 
                    @click.outside="open = false">
                    
                    <div class="flex items-center w-full" @click="open = !open">
                        <span class="text-gray-400 mr-3">📅</span>
                        <span class="text-gray-800" x-text="displayDate || 'Check-in date — Check-out date'"></span>
                    </div>

                    <div x-show="open" 
                        x-transition 
                        class="absolute top-full left-0 mt-2 bg-white rounded-lg shadow-2xl border border-gray-200 p-4 w-[320px] md:w-[550px] z-[100] text-gray-900">
                        
                        <div class="flex border-b border-gray-100 mb-4">
                            <button type="button" @click="setMode('overnight')" 
                                :class="mode === 'overnight' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                                class="flex-1 py-2 font-semibold text-sm transition">Overnight</button>
                            
                            <button type="button" @click="setMode('day_use')" 
                                :class="mode === 'day_use' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                                class="flex-1 py-2 font-semibold text-sm transition">Day Use</button>
                            
                            <button type="button" @click="setMode('flexible')" 
                                :class="mode === 'flexible' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                                class="flex-1 py-2 font-semibold text-sm transition">I'm Flexible</button>
                        </div>

                        <div x-show="mode !== 'flexible'" class="min-h-[300px]">
                            <div id="inline-calendar"></div>
                        </div>

                        <div x-show="mode === 'flexible'" class="py-6 px-2 text-center">
                            <p class="text-sm text-gray-500 mb-4">How long would you like to stay?</p>
                            <div class="grid grid-cols-3 gap-3">
                                <template x-for="option in ['3 Nights', '1 Week', '1 Month']">
                                    <button type="button" 
                                        @click="selectFlexible(option)"
                                        class="border rounded-md py-3 text-sm font-medium hover:border-blue-500 hover:bg-blue-50 transition">
                                        <span x-text="option"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 bg-white flex items-center px-4 py-3 relative cursor-pointer group" 
                    x-data="occupancySelector()" 
                    @click.outside="open = false">
                    
                    <div class="flex items-center w-full" @click="open = !open">
                        <span class="text-gray-400 mr-3 text-xl">👤</span>
                        <div class="flex flex-col">
                            <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Guests & Rooms</span>
                            <div class="flex items-center gap-1">
                                <span class="text-gray-800 font-bold text-sm" x-text="`${adults} adults`"></span>
                                <span class="text-gray-400 text-xs">•</span>
                                <span class="text-gray-800 font-bold text-sm" x-text="`${rooms} room` + (rooms > 1 ? 's' : '')"></span>
                            </div>
                        </div>
                        <span class="ml-auto text-gray-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''">▼</span>
                    </div>

                    <div x-show="open" 
                        x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        class="absolute top-full right-0 mt-4 bg-white rounded-lg shadow-2xl border border-gray-100 p-6 w-80 z-[120] text-gray-900">
                        
                        <div class="absolute -top-2 right-10 w-4 h-4 bg-white border-t border-l border-gray-100 rotate-45"></div>

                        <div class="flex justify-between items-center mb-6">
                            <div class="flex flex-col">
                                <p class="font-bold text-sm">Room</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="button" @click="decrement('rooms')" :disabled="rooms <= 1" :class="rooms <= 1 ? 'opacity-20 cursor-not-allowed' : 'hover:bg-blue-50'" class="w-8 h-8 border-2 border-blue-500 rounded-full text-blue-500 flex items-center justify-center transition">
                                    <span class="mb-1 text-xl">−</span>
                                </button>
                                <span x-text="rooms" class="w-4 text-center font-bold text-base text-gray-800"></span>
                                <button type="button" @click="increment('rooms')" class="w-8 h-8 border-2 border-blue-500 rounded-full text-blue-500 flex items-center justify-center hover:bg-blue-50 transition">
                                    <span class="mb-0.5 text-xl">+</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-6">
                            <div class="flex flex-col">
                                <p class="font-bold text-sm">Adults</p>
                                <p class="text-[10px] text-gray-400">Ages 18 or above</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="button" @click="decrement('adults')" :disabled="adults <= 1" :class="adults <= 1 ? 'opacity-20 cursor-not-allowed' : 'hover:bg-blue-50'" class="w-8 h-8 border-2 border-blue-500 rounded-full text-blue-500 flex items-center justify-center transition">
                                    <span class="mb-1 text-xl">−</span>
                                </button>
                                <span x-text="adults" class="w-4 text-center font-bold text-base text-gray-800"></span>
                                <button type="button" @click="increment('adults')" class="w-8 h-8 border-2 border-blue-500 rounded-full text-blue-500 flex items-center justify-center hover:bg-blue-50 transition">
                                    <span class="mb-0.5 text-xl">+</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex flex-col">
                                <p class="font-bold text-sm">Children</p>
                                <p class="text-[10px] text-gray-400">Ages 0-17</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="button" @click="decrement('children')" :disabled="children <= 0" :class="children <= 0 ? 'opacity-20 cursor-not-allowed' : 'hover:bg-blue-50'" class="w-8 h-8 border-2 border-blue-500 rounded-full text-blue-500 flex items-center justify-center transition">
                                    <span class="mb-1 text-xl">−</span>
                                </button>
                                <span x-text="children" class="w-4 text-center font-bold text-base text-gray-800"></span>
                                <button type="button" @click="increment('children')" class="w-8 h-8 border-2 border-blue-500 rounded-full text-blue-500 flex items-center justify-center hover:bg-blue-50 transition">
                                    <span class="mb-0.5 text-xl">+</span>
                                </button>
                            </div>
                        </div>
                    </div>
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
        <script>
            function datePicker() {
                return {
                    open: false,
                    mode: 'overnight', // overnight, day_use, flexible
                    displayDate: '',
                    fp: null,

                    init() {
                        this.$nextTick(() => this.initFlatpickr());
                    },

                    initFlatpickr() {
                        if (this.fp) this.fp.destroy();

                        const config = {
                            inline: true,
                            minDate: "today",
                            mode: this.mode === 'overnight' ? "range" : "single",
                            showMonths: window.innerWidth > 768 ? 2 : 1,
                            onChange: (selectedDates) => {
                                if (this.mode === 'overnight' && selectedDates.length === 2) {
                                    this.displayDate = `${selectedDates[0].toLocaleDateString()} - ${selectedDates[1].toLocaleDateString()}`;
                                    this.open = false;
                                } else if (this.mode === 'day_use' && selectedDates.length === 1) {
                                    this.displayDate = `Day Use: ${selectedDates[0].toLocaleDateString()}`;
                                    this.open = false;
                                }
                            }
                        };
                        
                        // Only init if not in flexible mode
                        if(this.mode !== 'flexible') {
                            this.fp = flatpickr("#inline-calendar", config);
                        }
                    },

                    setMode(newMode) {
                        this.mode = newMode;
                        this.$nextTick(() => this.initFlatpickr());
                    },

                    selectFlexible(option) {
                        this.displayDate = `Flexible: ${option}`;
                        this.open = false;
                    }
                }
            }

            function occupancySelector() {
                return {
                    open: false,
                    rooms: 1, // Default from source
                    adults: 2, // Default from source
                    children: 0, // Default from source

                    increment(type) {
                        if (this[type] < 10) this[type]++;
                    },
                    decrement(type) {
                        const min = (type === 'children' ? 0 : 1);
                        if (this[type] > min) this[type]--;
                    }
                }
            }
        </script>
    </body>
</html>
