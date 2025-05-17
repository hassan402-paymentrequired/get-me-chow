@extends('layouts.visitor.guest')
@section('contents')
    <div class="p-4" x-data="{
        showModal: true,
        hasVisited: false,
        searchQuery: '',
        searchResults: [],
        selectedUser: null,
        selectedVisitor: null,
        otp: null,
        isVerified: false,
        isLoading: false,
        searchVisitors() {
            fetch('{{ route('visitor.search') }}?q=' + encodeURIComponent(this.searchQuery))
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    this.searchResults = data.visitors;
                });
        },
        formatDate(dateStr) {
            const date = new Date(dateStr);
            const options = { weekday: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
            return date.toLocaleString('en-US', options).replace(',', ' at');
        },
        sendOtp(visitor) {
            this.selectedUser = visitor;
            this.hasVisited = false;
            fetch('{{ route('visitor.send.otp', ['visitor' => ':id']) }}'.replace(':id', this.selectedUser.id), {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(res => res.json())
                .then(data => { console.log(data) })
        },
        verifyOtp() {
            this.isLoading = true;
            fetch('{{ route('visitor.verify.otp', ['visitor' => ':id']) }}'.replace(':id', this.selectedUser.id), {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ otp: this.otp })
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    this.isLoading = false;
                    this.isVerified = true;
                    this.hasVisited = false;
                    alert(data.message);
    
                });
        }
    }">
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 ">
            <div
                class="relative isolate transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex text-sm size-12 shrink-0 items-center justify-center rounded-full bg-gray-100 sm:mx-0 sm:size-10">
                            👋🏽
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-base font-semibold text-gray-900" id="modal-title">Hey There</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Welcome back! Have you checked in before? If so, you
                                    can simply search for your name to complete the process. If this is your first time,
                                    please ignore this message and fill out the information below to get started.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 flex items-center  gap-5 sm:px-6">
                    <x-primary-button class="w-full bg-transparent text-black border border-gray-300" style="color: black"
                        @click="hasVisited = false; showModal = false">No Thanks</x-primary-button>
                    <x-primary-button class="w-full" @click="hasVisited = true; showModal = false">Yes, I
                        have</x-primary-button>
                </div>
            </div>
        </div>

        <div x-show="selectedUser && isVerified"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 ">
            @include('components.click')
        </div>

        <div x-show="selectedUser && !isVerified"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 ">
            @include('components.send-visit-opt')
        </div>



        @include('components.has-visited')

        <div
            class="flex flex-col sm:w-[800px] items-start gap-5 p-4 mx-auto max-w-7xl bg-white [box-shadow:0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
           <div class="flex items-center justify-between w-full">
             <div>
                <h1 class="text-slate-900 text-3xl font-semibold">Hey there 👋🏻, Welcome to INITS Limited</h1>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed">
                    Looks like you are looking for someone here kindly Enter the following details
                </p>
            </div>
            <x-primary-button @click="hasVisited = true">Being here before</x-primary-button>
           </div>

            <form class="space-y-4 grid w-full" action="{{ route('visitor.send.visit.request') }}" method="POST">
                @csrf
                <div class=" grid sm:grid-cols-2 gap-5">
                    <x-text-input type='text' placeholder='Name' value="{{ old('name') }}" name="name"
                        icon="
                    <svg xmlns='http://www.w3.org/2000/svg' fill='#bbb' stroke='#bbb' class='w-[18px] h-[18px] absolute right-4' viewBox='0 0 24 24'>
                        <circle cx='10' cy='7' r='6' data-original='#000000'></circle>
                        <path d='M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z'
                            data-original='#000000'></path>
                    </svg>
                " />
                    <x-text-input type='text' placeholder='phone' name="phone" value="{{ old('phone') }}" />
                </div>
                <div class=" grid sm:grid-cols-2 gap-5 mt-3">
                    <x-text-input type='email' placeholder='Email(optional)' name="email" value="{{ old('email') }}" />
                    <x-select name="employee_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
                <div class=" grid ">
                    <textarea placeholder='You have any reason to visit us?' name="reason" rows="6"
                        class="w-full text-slate-900 rounded-md px-4 border border-gray-300 text-sm pt-2.5 outline-0 focus:border-black">
                        {{ old('reason') }}
                    </textarea>
                </div>
                <x-primary-button class="w-full ">Send Request</x-primary-button>
            </form>
        </div>
    </div>
@endsection
