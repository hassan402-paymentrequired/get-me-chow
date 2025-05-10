@extends('layouts.visitor.app')
@section('contents')
    <form class="space-y-4 grid w-full p-8" action="{{ route('admin.visitors.store') }}" method="POST">
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
            <textarea placeholder='Reason for visit' name="reason" rows="6"
                class="w-full resize-none text-slate-900 rounded-md px-4 border border-gray-300 text-sm pt-2.5 outline-0 focus:border-black">{{ old('reason') }}</textarea>
        </div>
        <x-primary-button class="w-full ">Send Request</x-primary-button>
    </form>
@endsection
