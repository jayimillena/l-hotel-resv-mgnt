<x-guest-layout>
    <section class="min-h-[80vh] flex items-center justify-center py-12 px-6 bg-gray-50">
        <div class="max-w-4xl w-full bg-white rounded-lg shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
            
            <div class="md:w-5/12 bg-[#003580] text-white p-10 flex flex-col justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto mb-6 self-start">
                <h2 class="text-3xl font-bold mb-4">Start Your Journey With Us.</h2>
                <p class="text-blue-100 opacity-90 leading-relaxed">
                    Create an account to enjoy seamless bookings, personalized travel recommendations, and exclusive member rewards.
                </p>
                <div class="mt-8 pt-8 border-t border-blue-400/30">
                    <p class="text-sm italic">"Your gateway to unforgettable stays starts here."</p>
                </div>
            </div>

            <div class="md:w-7/12 p-10">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800">Create your account</h3>
                    <p class="text-gray-500 text-sm mt-1">Join La Roca Veranda today.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus
                            class="w-full px-4 py-2.5 rounded-md border border-gray-300 focus:ring-2 focus:ring-[#0071c2] focus:border-[#0071c2] outline-none transition @error('name') border-red-500 @enderror">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required
                            class="w-full px-4 py-2.5 rounded-md border border-gray-300 focus:ring-2 focus:ring-[#0071c2] focus:border-[#0071c2] outline-none transition @error('email') border-red-500 @enderror">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                            <input type="password" name="password" placeholder="••••••••" required
                                class="w-full px-4 py-2.5 rounded-md border border-gray-300 focus:ring-2 focus:ring-[#0071c2] focus:border-[#0071c2] outline-none transition @error('password') border-red-500 @enderror">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required
                                class="w-full px-4 py-2.5 rounded-md border border-gray-300 focus:ring-2 focus:ring-[#0071c2] focus:border-[#0071c2] outline-none transition">

                            <input type="hidden" name="user_type" required value="user" />
                        </div>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                    <data name="user_type" value="user"></data>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-[#0071c2] hover:bg-blue-700 text-white font-bold py-3 rounded-md shadow-md transition-all transform active:scale-[0.98]">
                            Create Account
                        </button>
                    </div>

                    <div class="relative flex py-2 items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink mx-4 text-gray-400 text-xs uppercase tracking-wider">or sign up with</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button type="button" class="flex items-center justify-center gap-2 border border-gray-300 py-2.5 rounded-md hover:bg-gray-50 transition text-sm font-medium">
                            <img src="https://www.svgrepo.com/show/355037/google.svg" class="h-4 w-4" alt="Google">
                            Google
                        </button>
                        <button type="button" class="flex items-center justify-center gap-2 border border-gray-300 py-2.5 rounded-md hover:bg-gray-50 transition text-sm font-medium">
                            <span class="text-blue-600 font-bold">f</span>
                            Facebook
                        </button>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-[#0071c2] font-bold hover:underline">Sign in</a>
                </p>
            </div>
        </div>
    </section>
</x-guest-layout>