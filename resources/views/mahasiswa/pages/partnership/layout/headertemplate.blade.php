<div class="mt-24 max-w-[1240px] mx-auto">
    <h2 class="sr-only">Steps</h2>
    <div class="relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-gray-100">
        <ol class="relative z-10 flex justify-between text-sm font-medium text-gray-500">
            <li class="flex items-center gap-2 p-2">
                <span class="h-6 w-6 rounded-full @if($page === 'pending') bg-blue-600 text-white @else bg-white @endif text-center text-[10px]/6 font-bold ">
                    1
                </span>

                <span class="hidden sm:block"> Details </span>
            </li>

            <li class="flex items-center gap-2 p-2">
                <span class="h-6 w-6 rounded-full @if($page === 'accepted' && $partnership->lpj == null) bg-blue-600 text-white @else bg-white @endif text-center text-[10px]/6 font-bold ">
                    2
                </span>

                <span class="hidden sm:block"> Address </span>
            </li>

            <li class="flex items-center gap-2 p-2">
                <span class="h-6 w-6 rounded-full @if($page === 'accepted' && $partnership->lpj != null) bg-blue-600 text-white @else bg-white @endif text-center text-[10px]/6 font-bold">
                    3
                </span>

                <span class="hidden sm:block"> Payment </span>
            </li>
        </ol>
    </div>