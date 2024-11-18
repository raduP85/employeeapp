<a {{ $attributes->merge(['class' => 'flex select-none items-center gap-2 rounded border border-slate-300 bg-transparent py-2.5 px-4 text-xs font-semibold text-gray-700 shadow-md transition-all hover:bg-gray-100 focus:opacity-[0.85] active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50']) }}>
  @if($slot->isEmpty())
    <i class="fa-solid fa-xmark"></i> {{ __('employees.cancel') }}
  @else
    {{ $slot }}
  @endif
</a>