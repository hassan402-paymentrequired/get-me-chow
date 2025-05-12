 <div
     class= "inline-block text-left bg-gray-100 rounded-lg overflow-hidden align-bottom transition-all transform
        shadow-2xl sm:my-8 sm:align-middle sm:max-w-xl sm:w-full grid">

                 <div class="flex flex-col items-center pt-6 pr-6 pb-6 pl-6">
                    <div class="flex bg-gray-50 text-base tracking-wide uppercase text-black items-center justify-center border-2 border-gray-200 size-16  mr-auto -mb-8 ml-auto rounded-full">
                        <span x-text="selectedUser.name.substr(0, 2)"></span>
                    </div>
                     <p class="mt-8 text-2xl font-semibold leading-none text-black tracking-tighter lg:text-3xl"
                         x-text="selectedUser.name"></p>
                     <p class="mt-3 text-base leading-relaxed text-center text-black">
                         You came to see <span x-text="selectedUser.checkins[0].user.first_name"></span> on <time
                             :datetime="selectedUser.checkins[0].created_at"
                             x-text="formatDate(selectedUser.checkins[0].created_at)"></time>. Would you
                         like to send a new request?
                     </p>
                     <form action="{{ route('visitor.resend.visit.request') }}" method="POST" class="w-full gap-4 grid mt-6">
                         @csrf
                       <input type="hidden" name="visitor_id" :value="selectedUser.id">


                        <div class="grid w-full">
                            <x-input-label>Who are you looking for?</x-input-label>
                             <x-select name="employee_id">
                             @foreach ($users as $user)
                                 <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}
                                 </option>
                             @endforeach
                         </x-select>
                        </div>

                         <textarea placeholder='You have any reason to visit us?' name="reason" rows="4" class="w-full resize-none text-black bg-transparent rounded-md px-4 border border-gray-300 text-sm pt-2.5 outline-0 focus:border-black"></textarea>
                         <x-primary-button>Send Request</x-primary-button>
                     </form>
                 </div>
       
 </div>
