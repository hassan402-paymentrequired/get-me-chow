  <table class="w-full text-left">
      <tbody>
          <tr class="text-sm/6 text-gray-900">
              <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                  <time datetime="2023-03-22">Users</time>
                  <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
                  </div>
                  <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50">
                  </div>
              </th>
          </tr>
          @forelse ($users['users'] as $user)
              <tr>
                  <td class="relative py-5 pr-6">
                      <div class="flex gap-x-6">
                          <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20"
                              fill="currentColor" aria-hidden="true" data-slot="icon">
                              <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm-.75-4.75a.75.75 0 0 0 1.5 0V8.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0L6.2 9.74a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                  clip-rule="evenodd" />
                          </svg>
                          <div class="flex-auto">
                              <div class="flex items-start gap-x-3">
                                  <div class="text-sm/6 font-medium text-gray-900">
                                      {{ $user['first_name'] . ' ' . $user['last_name'] }}
                                  </div>
                                  <div
                                      class="rounded-md  px-2 py-1 text-xs font-medium @if ($user['is_active']) text-green-700 ring-green-600/20 bg-green-50
                                      @else
                                          text-red-700 ring-red-600/20 bg-red-50 @endif ring-1  ring-inset">
                                      {{ $user['is_active'] ? 'Active' : 'Inactive' }}
                                  </div>
                              </div>
                              <div class="mt-1 text-xs/5 text-gray-500">{{ $user['phone_no'] }}</div>
                          </div>
                      </div>
                      <div class="absolute right-full bottom-0 h-px w-screen bg-gray-100"></div>
                      <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                  </td>
                  <td class="hidden py-5 pr-6 sm:table-cell">
                      <div class="text-sm/6 text-gray-900">Order Made</div>
                      <div class="mt-1 text-xs/5 text-gray-500">{{ $user['orders_count'] }}</div>
                  </td>
                  <td class="py-5 text-right">
                      <div class="flex justify-end">
                          <a href="{{ route('admin.user.show', ['user' => $user['id']]) }}"
                              class="text-sm/6 font-medium text-black underline hover:text-neutral-500">View<span
                                  class="hidden sm:inline">
                                  {{ $user['first_name'] . ' ' . $user['last_name'] }}</span></a>
                      </div>
                      <div class="mt-1 text-xs/5 text-gray-500">Email:: <span
                              class="text-gray-900">{{ $user['email'] }}</span></div>
                  </td>
              </tr>
          @empty
              <tr colspan="3" class="text-sm/6 text-gray-900">
                  <td class="py-5 text-center" colspan="3">No users found</td>
              </tr>
          @endforelse


          <tr class="text-sm/6 text-gray-900">
              <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                  <time datetime="2023-03-21">Workers</time>
                  <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
                  </div>
                  <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50">
                  </div>
              </th>
          </tr>
          @forelse ($users['buyers'] as $user)
              <tr>
                  <td class="relative py-5 pr-6">
                      <div class="flex gap-x-6">
                          <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20"
                              fill="currentColor" aria-hidden="true" data-slot="icon">
                              <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm-.75-4.75a.75.75 0 0 0 1.5 0V8.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0L6.2 9.74a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                  clip-rule="evenodd" />
                          </svg>
                          <div class="flex-auto">
                              <div class="flex items-start gap-x-3">
                                  <div class="text-sm/6 font-medium text-gray-900">
                                      {{ $user['first_name'] . ' ' . $user['last_name'] }}
                                  </div>
                                  <div
                                      class="rounded-md  px-2 py-1 text-xs font-medium @if ($user['is_active']) text-green-700 ring-green-600/20 bg-green-50
                                      @else
                                          text-red-700 ring-red-600/20 bg-red-50 @endif ring-1  ring-inset">
                                      {{ $user['is_active'] ? 'Active' : 'Inactive' }}
                                  </div>
                              </div>
                              <div class="mt-1 text-xs/5 text-gray-500">{{ $user['phone_no'] }}</div>
                          </div>
                      </div>
                      <div class="absolute right-full bottom-0 h-px w-screen bg-gray-100"></div>
                      <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                  </td>
                  <td class="hidden py-5 pr-6 sm:table-cell">
                      <div class="text-sm/6 text-gray-900">Order Took</div>
                      <div class="mt-1 text-xs/5 text-gray-500">{{ $user['orders_count'] }}</div>
                  </td>
                  <td class="py-5 text-right">
                      <div class="flex justify-end">
                          <a href="#"
                              class="text-sm/6 font-medium text-black underline hover:text-neutral-500">View<span
                                  class="hidden sm:inline">
                                  {{ $user['first_name'] . ' ' . $user['last_name'] }}</span></a>
                      </div>
                      <div class="mt-1 text-xs/5 text-gray-500">Email:: <span
                              class="text-gray-900">{{ $user['email'] }}</span></div>
                  </td>
              </tr>
          @empty
              <tr colspan="3" class="text-sm/6 text-gray-900">
                  <td class="py-5 text-center" colspan="3">No workers found</td>
              </tr>
          @endforelse
      </tbody>
  </table>
