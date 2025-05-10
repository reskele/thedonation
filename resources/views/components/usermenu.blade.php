      @php
          $role = Auth::user()->role;
      @endphp
      <!-- User Area -->
      <div
        class="relative z-999"
        x-data="{ dropdownOpen: false }"
        @click.outside="dropdownOpen = false"
      >
        <a
          class="flex items-center text-slate-200"
          href="#"
          @click.prevent="dropdownOpen = ! dropdownOpen"
        >
          <span class="mr-3 h-11 w-11 overflow-hidden rounded-full">
            <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('storage/images/profiles/default.jpg') }}"/>
        </span>

        </a>

        <!-- Dropdown Start -->
        <div
          x-show="dropdownOpen"
          class="shadow-lg absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-slate-200 bg-slate-800 p-3"
        >
          <div>
            <span
              class="text-sm block font-medium text-slate-400 "
            >
                {{ Auth::user()->name }}
            </span>
            <span
              class="text-xs mt-0.5 block text-slate-400 "
            >
                {{ Auth::user()->email }}            
            </span>
          </div>

          <ul
            class="flex flex-col gap-1 border-b border-slate-200 pt-4 pb-3 "
          >
            @if ($role === 'admin')
                <li>
                    <a
                    href=" {{ route('admin.dashboard')}} "
                    class="group text-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-slate-400 hover:bg-white/5 hover:text-slate-300"
                    >
                        <i class="fa-solid fa-sign-out-alt mr-3"></i>

                        Dashboard
                    </a>
                </li>
            @endif
            @if ($role === 'donor')
                <li>
                    <a
                    href=" {{ route('donor.dashboard')}} "
                    class="group text-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-slate-400 hover:bg-white/5 hover:text-slate-300"
                    >
                        <i class="fa-solid fa-sign-out-alt mr-3"></i>

                        Dashboard
                    </a>
                </li>
            @endif
            @if ($role === 'recipient')
                <li>
                    <a
                    href=" {{ route('recipient.dashboard')}} "
                    class="group text-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-slate-400 hover:bg-white/5 hover:text-slate-300"
                    >
                        <i class="fa-solid fa-sign-out-alt mr-3"></i>

                        Dashboard
                    </a>
                </li>
            @endif
            
            <li>
              <a
                href=" {{ route('profile.edit')}} "
                class="group text-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-slate-400 hover:bg-white/5 hover:text-slate-300"
                >
                <i class="fa-solid fa-sign-out-alt mr-3"></i>

                Profile Settings
              </a>
            </li>
            
          </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="group w-full text-sm mt-3 flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-slate-400 hover:bg-white/5 hover:text-slate-300"
                >
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>


                    Sign out
                </button>
            </form>
        </div>
        <!-- Dropdown End -->
      </div>
      <!-- User Area -->