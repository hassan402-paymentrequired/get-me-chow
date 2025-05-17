@extends('layouts.visitor.app')
@section('contents')
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border border-gray-200 divide-y divide-gray-200">
                    <div class="py-3 px-4">
                        <form method="GET" action="{{ route('admin.visitors.index') }}"
                            class="flex items-center justify-between">
                            <div class="relative max-w-xs flex items-center gap-3">
                                <input type="text" name="search" id="hs-table-with-pagination-search"
                                    class="py-1.5 sm:py-2 px-3 ps-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Search for items" value="{{ request('search') }}">

                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                    <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                </div>
                                <x-danger-button>Clear Filter</x-danger-button>
                            </div>
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <button type="button"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    @click="open = !open" aria-expanded="open" aria-haspopup="true">
                                    Sort
                                    <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    class="absolute right-10 z-50 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black/5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('admin.visitors.index', ['sort_by' => 'check_out']) }}"
                                            class="block px-4 py-2 text-sm  text-gray-500" role="menuitem"
                                            @class(['text-gray-900', 'font-medium' => true]) tabindex="-1" id="menu-item-0">Check out</a>
                                        <a href="{{ route('admin.visitors.index', ['sort_by' => 'check_in']) }}"
                                            class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                            id="menu-item-1">Check in</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Phone</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Host</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check in
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check out
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($visitors as $visitor)
                                    <tr class="group">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $visitor->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $visitor->phone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $visitor->email ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $visitor->latestCheckin->user->first_name ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $visitor->latestCheckin->check_in_time ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $visitor->latestCheckin->check_out_time ?? '-#-' }}</td>
                                        <td class="px-6 py-4 z-10  relative whitespace-nowrap text-end text-sm font-medium">
                                            <div class="relative ">
                                                <a href="{{ route('visitor.show', ['visitor' => $visitor]) }}"
                                                    class="inline-flex items-center  text-xs underline border border-transparent text-black hover:text-neutral-500 ">
                                                    View
                                                </a>

                                                @if ($visitor->latestCheckin->check_out_time == null)
                                                    <form action="{{ route('admin.visitors.checkout', $visitor) }}"
                                                        method="POST" class="inline-flex items-center">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="inline-flex items-center text-xs underline border border-transparent text-red-500 hover:text-neutral-500 ">
                                                            Check out
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                                            colspan="7">
                                            No Data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
