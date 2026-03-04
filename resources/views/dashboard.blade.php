<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <main :class="sidebarOpen ? 'ml-64' : 'ml-20'" class="transition-all duration-300 min-h-screen">
                    <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">
                        <h2 class="text-xl font-bold text-gray-800">Property Overview</h2>
                    </header>

                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                                <p class="text-sm text-gray-500 font-medium">Total Revenue</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">₱124,500</h3>
                                <span class="text-xs text-green-500 font-bold">↑ 12% from last month</span>
                            </div>
                            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                                <p class="text-sm text-gray-500 font-medium">Current Occupancy</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">0%</h3>
                                <div class="w-full bg-gray-100 h-2 rounded-full mt-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                                <p class="text-sm text-gray-500 font-medium">Today's Arrivals</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">12 Guests</h3>
                                <span class="text-xs text-blue-500 font-bold">4 Pending check-in</span>
                            </div>
                            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                                <p class="text-sm text-gray-500 font-medium">Restaurant Orders</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">8 Active</h3>
                                <span class="text-xs text-orange-500 font-bold">Avg. wait: 15 mins</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center">
                                <h4 class="font-bold text-gray-800">Recent Room Bookings</h4>
                                <button class="text-blue-600 text-sm font-bold hover:underline">View All</button>
                            </div>
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 text-gray-400 text-xs uppercase font-bold">
                                    <tr>
                                        <th class="px-6 py-3">Guest</th>
                                        <th class="px-6 py-3">Room</th>
                                        <th class="px-6 py-3">Stay Dates</th>
                                        <th class="px-6 py-3">Status</th>
                                        <th class="px-6 py-3 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 text-sm">
                                    <tr>
                                        <td class="px-6 py-4 font-medium">Juan Dela Cruz</td>
                                        <td class="px-6 py-4 text-gray-500">Deluxe Suite 101</td>
                                        <td class="px-6 py-4 text-gray-500">Mar 04 - Mar 06</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md text-[10px] font-bold uppercase">Confirmed</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="text-gray-400 hover:text-blue-600 font-bold text-xs">Manage</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium">Maria Clara</td>
                                        <td class="px-6 py-4 text-gray-500">Standard Room 204</td>
                                        <td class="px-6 py-4 text-gray-500">Mar 05 - Mar 05</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-tight">Day Use</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="text-gray-400 hover:text-blue-600 font-bold text-xs">Manage</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
