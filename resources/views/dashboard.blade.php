<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Tabs -->
                <div class="mb-4 border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="mr-2">
                            <a href="#companies" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Companies</a>
                        </li>
                        <li class="mr-2">
                            <a href="#employees" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Employees</a>
                        </li>
                    </ul>
                </div>

                <!-- Companies List -->
                <div id="companies" class="tab-content">
                    <div class="bg-white border-b border-gray-200 p-4">
                        <h3 class="text-lg font-semibold mb-4">Companies list</h3>

                        <!-- for storing the company-->
                        <div class="mb-4">
                            <a href="{{ route('companies.create') }}"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Create new company
                            </a>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Logo</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Website</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $company->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $company->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($company->logo)
                                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                                    class="h-16 w-16 object-cover border border-gray-300">
                                            @else
                                                No Logo
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $company->website }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('companies.edit', $company->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Edit</a>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4 flex justify-between">
                            <span class="text-gray-500">Showing {{ $companies->count() }} of {{ $companies->total() }} entries</span>
                            <div>
                                <button class="text-blue-500" onclick="window.location.href='{{ url()->previous() }}'">Previous</button>
                                <button class="text-blue-500" onclick="window.location.href='{{ url()->current() }}?page={{ request()->get('page', 1) + 1 }}'">Next</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Employees List -->
                <div id="employees" class="tab-content hidden">
                    <div class="bg-white border-b border-gray-200 p-4 mt-8">
                        <h3 class="text-lg font-semibold mb-4">Employees list</h3>

                        <div class="mb-4">
                            <a href="{{ route('employees.create') }}"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Add new employee
                            </a>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        First Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Last Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Phone</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Company</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $employee->first_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $employee->last_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $employee->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $employee->phone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $employee->company->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('employees.edit', $employee->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4 flex justify-between">
                            <span class="text-gray-500">Showing {{ $employees->count() }} of {{ $employees->total() }} entries</span>
                            <div>
                                <button class="text-blue-500" onclick="window.location.href='{{ url()->previous() }}'">Previous</button>
                                <button class="text-blue-500" onclick="window.location.href='{{ url()->current() }}?page={{ request()->get('page', 1) + 1 }}'">Next</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab-content');
            const tabLinks = document.querySelectorAll('a[href^="#"]');

            tabLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));

                    tabs.forEach(tab => tab.classList.add('hidden'));
                    target.classList.remove('hidden');

                    tabLinks.forEach(link => link.classList.remove('border-blue-500', 'text-blue-500'));
                    this.classList.add('border-blue-500', 'text-blue-500');
                });
            });

            // Show the first tab by default
            tabLinks[0].click();
        });
    </script>
</x-app-layout>
