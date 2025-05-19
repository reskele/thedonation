@php $role = Auth::check() ? Auth::user()->role : null; @endphp

<aside class="w-60 flex flex-col bg-slate-800 text-gray-200 h-full min-h-screen sticky -mt-15 top-0 p-4 space-y-4">
    <a href="{{ route('home') }}" class="text-xl font-bold text-green-300">ClothShare</a>

    <ul class="space-y-2 flex-1 text-sm mt-8">

        @if($role === 'admin')
            <li><a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>
                    Manage Users
                </a>
            </li>
            <li><a href="{{ route('donation-requests.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                <i class="fa-solid fa-sign-out-alt mr-3"></i>
                Requests
            </a>
            <li><a href="{{ route('donation-posts.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                <i class="fa-solid fa-sign-out-alt mr-3"></i>
                Donation Posts
            </a>
        </li>
        </li>
        @endif

        @if($role === 'donor')
            <li><a href="{{ route('donor.dashboard') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="{{ route('donation-posts.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>
                    My Donation Posts
                </a>
            </li>
            
        @endif

        @if($role === 'recipient')
            <li><a href="{{ route('recipient.dashboard') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="{{ route('donation-requests.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>
                    My Requests
                </a>
            </li>
            <li><a href="{{ route('stories.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                    <i class="fa-solid fa-sign-out-alt mr-3"></i>
                    My Stories
                </a>
            </li>
        @endif

        <li><a href="{{ route('clothing-items.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                <i class="fa-solid fa-sign-out-alt mr-3"></i>
                My Clothes
            </a>
        </li>
        <li><a href="{{ route('outfit-plans.index') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                <i class="fa-solid fa-sign-out-alt mr-3"></i>
                Outfit Planner
            </a>
        </li>
        <li><a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 rounded-md transition-all duration-200 ease-in-out hover:bg-slate-900">
                <i class="fa-solid fa-sign-out-alt mr-3"></i>
                Profile Settings
            </a>
        </li>
    </ul>

    <form method="POST" action="{{ route('logout') }}" class="">
        @csrf
        <button type="submit" class="flex w-full items-center -ml-1 p-2 font-medium text-slate-200 bg-slate-700 mb-4 mx-4 rounded-lg hover:bg-slate-900 transition duration-200 ease-in-out">
            <i class="fa-solid fa-sign-out-alt mr-3"></i>
            <span>Logout</span>
        </button>
    </form>

</aside>
