<x-app-layout>
    <div x-data="{ open: false }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if(session('success'))
                    <div style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 15px;">
                        {{ session('success') }}
                    </div>
                @endif

                <div x-show="open" 
                     class="fixed inset-0 z-50 overflow-y-auto" 
                     style="display: none;" 
                     x-cloak>
                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="open = false"></div>

                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <form id="addstaffForm" method="POST" action="{{ route('staffs.store') }}" class="p-6">
                                @csrf
                                <h3 class="text-lg font-bold text-gray-900 mb-4">Add New </h3>
                                
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Staff Name</label>
                                    <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="e.g. staff 302">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Role</label>
                                    <select name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="General Staff">General Staff</option>
                                        <option value="Room Maintainance">Room Maintainance</option>
                                        <option value="Restaurant Server">Restaurant Server</option>
                                        <option value="General Manager">General Manager</option>
                                        <option value="Hotel Chef">Hotel Chef</option>
                                        <option value="Food Taster">Food Taster</option>
                                    </select>
                                </div>

                                <div class="mt-5 sm:mt-6 flex justify-end gap-3">
                                    <button type="button" @click="open = false" class="bg-white px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</button>
                                    <input type="submit" class="bg-blue-600 px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700" value="Save Staff"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <main :class="sidebarOpen ? 'ml-64' : 'ml-20'" class="transition-all duration-300 min-h-screen">
                    <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">
                        <h2 class="text-xl font-bold text-gray-800">Staffs Settings</h2>
                    </header>

                    <div class="p-8">
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center">
                                <h4 class="font-bold text-gray-800">Available Staffs</h4>
                                <button @click="open = true" class="text-blue-600 text-sm font-bold hover:underline">
                                    Add Staffs
                                </button>
                            </div>
                            
                            <table class="w-full text-left">
                                <tbody class="divide-y divide-gray-50 text-sm">
                                    @foreach($staffs as $staff)
                                    <tr>
                                        <td class="px-6 py-4 text-gray-500">{{ $staff->name }}</td>
                                        <td class="px-6 py-4">
                                            @if ($staff->role)
                                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md text-[10px] font-bold uppercase">{{ $staff->role }}</span>
                                            @else 
                                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded-md text-[10px] font-bold uppercase">{{ __('Unassigned') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="text-gray-400 hover:text-blue-600 font-bold text-xs">Manage</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $staffs->links() }}
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>