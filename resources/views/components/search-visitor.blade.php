 <template x-for="visitor in searchResults">
     <div>
         <input type="radio" id="job-3" name="job" value="job-3" class="hidden peer">
         <label for="job-3"
             class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-gray-100 border border-gray-200 rounded-lg cursor-pointer ">
             <div class="block">
                 <div class="w-full text-lg font-semibold" x-text="visitor.name"></div>
                 <div class="w-full text-gray-500 dark:text-gray-400">Host</div>
                 <div class="w-full text-gray-500 dark:text-gray-400" x-text="visitor.user.first_name"></div>
             </div>
             <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M1 5h12m0 0L9 1m4 4L9 9" />
             </svg>
         </label>
     </div>
 </template>
