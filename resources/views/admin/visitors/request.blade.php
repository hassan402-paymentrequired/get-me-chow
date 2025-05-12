@extends('layouts.visitor.app')
@section('contents')
    <div class="p-3 grid sm:grid-cols-2 md:grid-cols-3 gap-2">
        @forelse ($visitors as $visitor)
            <div class="flex max-w-sm bg-gray-50 border border-gray-200 rounded transition-all duration-150 ease-in-out">
                <div class="date-time-container">
                    <time class="date-time" datetime="{{ $visitor->created_at->toDateString() }}">
                        <span>{{ $visitor->created_at->format('M d') }}</span>
                        <span class="separator"></span>
                        <span>{{ $visitor->created_at->format('gA') }}</span>
                    </time>
                </div>
                <div class="flex flex-col justify-between flex-1">
                    <div class="border-l border-gray-200 p-4">
                        <a href="#">
                            <span class="font-bold uppercase text-lg text-gray-900">
                                {{ $visitor->name }}
                            </span>
                        </a>

                        <p class="overflow-hidden my-2 text-sm leading-5 text-gray-700 line-clamp-5">
                            {{ $visitor->reason ?? 'No reason specified' }}
                        </p>

                        <div class="flex items-start flex-col">
                            <span class="text-xs font-semibold">Host</span>
                            <span class="text-sm ">{{ $visitor->latestCheckin->user->first_name . ' ' . $visitor->latestCheckin->user->last_name }}</span>
                        </div>
                    </div>

                  
                        <form method="POST" action="{{ route('admin.visitors.request.accept', ['visitor' =>$visitor->id]) }}"
                            class="w-full flex items-center ">
                            @csrf
                            @method('PATCH')
                            <x-primary-button  style="color: black" class="w-full bg-transparent border rounded-none" type="submit" name="action" value="reject">
                                Reject
                            </x-primary-button>
                            <x-primary-button class="w-full rounded-none" type="submit" name="action" value="accept">
                                Accept
                            </x-primary-button>
                        </form>
                  
                </div>
            </div>
        @empty
            <div class="flex justify-center items-center h-full">
                <p class="text-gray-500">No visitors request yet.</p>
            </div>
        @endforelse
    </div>
@endsection
