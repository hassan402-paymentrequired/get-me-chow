<div class="flex items-center space-x-5">
                                <div class="flex items-center">
                                    <button type="button"
                                        class="-m-2.5 flex size-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                        <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Attach a file</span>
                                    </button>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <label id="listbox-label" class="sr-only">Your mood</label>
                                        <div class="relative">
                                            <button type="button"
                                                class="relative -m-2.5 flex size-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500"
                                                aria-haspopup="listbox" aria-expanded="true"
                                                aria-labelledby="listbox-label">
                                                <span class="flex items-center justify-center">
                                                    <!-- Placeholder label, show/hide based on listbox state. -->
                                                    <span>
                                                        <svg class="size-5 shrink-0" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.536-4.464a.75.75 0 1 0-1.061-1.061 3.5 3.5 0 0 1-4.95 0 .75.75 0 0 0-1.06 1.06 5 5 0 0 0 7.07 0ZM9 8.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S7.448 7 8 7s1 .672 1 1.5Zm3 1.5c.552 0 1-.672 1-1.5S12.552 7 12 7s-1 .672-1 1.5.448 1.5 1 1.5Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="sr-only">Add your mood</span>
                                                    </span>
                                                    <!-- Selected item label, show/hide based on listbox state. -->
                                                    <span>
                                                        <span
                                                            class="flex size-8 items-center justify-center rounded-full bg-red-500">
                                                            <svg class="size-5 shrink-0 text-white"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true" data-slot="icon">
                                                                <path fill-rule="evenodd"
                                                                    d="M13.5 4.938a7 7 0 1 1-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 0 1 .572-2.759 6.026 6.026 0 0 1 2.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0 0 13.5 4.938ZM14 12a4 4 0 0 1-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 0 0 1.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 0 1 1.315-4.192.447.447 0 0 1 .431-.16A4.001 4.001 0 0 1 14 12Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                        <span class="sr-only">Excited</span>
                                                    </span>
                                                </span>
                                            </button>

                                            <!--
                        Select popover, show/hide based on select state.

                        Entering: ""
                          From: ""
                          To: ""
                        Leaving: "transition ease-in duration-100"
                          From: "opacity-100"
                          To: "opacity-0"
                      -->
                                            <ul class="absolute bottom-10 z-10 -ml-6 w-60 rounded-lg bg-white py-3 text-base shadow ring-1 ring-black/5 focus:outline-none sm:ml-auto sm:w-64 sm:text-sm"
                                                tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                                aria-activedescendant="listbox-option-5">
                                                <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                                <li class="relative cursor-default select-none bg-white px-3 py-2"
                                                    id="listbox-option-0" role="option">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex size-8 items-center justify-center rounded-full bg-red-500">
                                                            <svg class="size-5 shrink-0 text-white"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true" data-slot="icon">
                                                                <path fill-rule="evenodd"
                                                                    d="M13.5 4.938a7 7 0 1 1-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 0 1 .572-2.759 6.026 6.026 0 0 1 2.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0 0 13.5 4.938ZM14 12a4 4 0 0 1-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 0 0 1.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 0 1 1.315-4.192.447.447 0 0 1 .431-.16A4.001 4.001 0 0 1 14 12Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <span class="ml-3 block truncate font-medium">Excited</span>
                                                    </div>
                                                </li>
                                                <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                                <li class="relative cursor-default select-none bg-white px-3 py-2"
                                                    id="listbox-option-1" role="option">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex size-8 items-center justify-center rounded-full bg-pink-400">
                                                            <svg class="size-5 shrink-0 text-white"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true" data-slot="icon">
                                                                <path
                                                                    d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                                                            </svg>
                                                        </div>
                                                        <span class="ml-3 block truncate font-medium">Loved</span>
                                                    </div>
                                                </li>
                                                <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                                <li class="relative cursor-default select-none bg-white px-3 py-2"
                                                    id="listbox-option-2" role="option">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex size-8 items-center justify-center rounded-full bg-green-400">
                                                            <svg class="size-5 shrink-0 text-white"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true" data-slot="icon">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.536-4.464a.75.75 0 1 0-1.061-1.061 3.5 3.5 0 0 1-4.95 0 .75.75 0 0 0-1.06 1.06 5 5 0 0 0 7.07 0ZM9 8.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S7.448 7 8 7s1 .672 1 1.5Zm3 1.5c.552 0 1-.672 1-1.5S12.552 7 12 7s-1 .672-1 1.5.448 1.5 1 1.5Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <span class="ml-3 block truncate font-medium">Happy</span>
                                                    </div>
                                                </li>
                                                <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                                <li class="relative cursor-default select-none bg-white px-3 py-2"
                                                    id="listbox-option-3" role="option">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex size-8 items-center justify-center rounded-full bg-yellow-400">
                                                            <svg class="size-5 shrink-0 text-white"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true" data-slot="icon">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm-3.536-3.475a.75.75 0 0 0 1.061 0 3.5 3.5 0 0 1 4.95 0 .75.75 0 1 0 1.06-1.06 5 5 0 0 0-7.07 0 .75.75 0 0 0 0 1.06ZM9 8.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S7.448 7 8 7s1 .672 1 1.5Zm3 1.5c.552 0 1-.672 1-1.5S12.552 7 12 7s-1 .672-1 1.5.448 1.5 1 1.5Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <span class="ml-3 block truncate font-medium">Sad</span>
                                                    </div>
                                                </li>
                                                <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                                <li class="relative cursor-default select-none bg-white px-3 py-2"
                                                    id="listbox-option-4" role="option">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex size-8 items-center justify-center rounded-full bg-blue-500">
                                                            <svg class="size-5 shrink-0 text-white"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true" data-slot="icon">
                                                                <path
                                                                    d="M1 8.25a1.25 1.25 0 1 1 2.5 0v7.5a1.25 1.25 0 1 1-2.5 0v-7.5ZM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0 1 14 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 0 1-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 0 1-1.341-.317l-2.734-1.366A3 3 0 0 0 6.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 0 1 2.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388Z" />
                                                            </svg>
                                                        </div>
                                                        <span class="ml-3 block truncate font-medium">Thumbsy</span>
                                                    </div>
                                                </li>
                                                <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                                <li class="relative cursor-default select-none bg-white px-3 py-2"
                                                    id="listbox-option-5" role="option">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex size-8 items-center justify-center rounded-full bg-transparent">
                                                            <svg class="size-5 shrink-0 text-gray-400"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true" data-slot="icon">
                                                                <path
                                                                    d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                                                            </svg>
                                                        </div>
                                                        <span class="ml-3 block truncate font-medium">I feel
                                                            nothing</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>