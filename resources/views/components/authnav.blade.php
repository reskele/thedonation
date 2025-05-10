@auth
    @php $role = Auth::user()->role; @endphp
@endauth

<nav class="bg-slate-800 shadow-lg ml-60">
    <div class="px-4 py-2 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <p class="text-lg font-bold text-white">X</p>
        </div>
        @auth
            <x-usermenu/>
        @endauth

    </div>
</nav>
