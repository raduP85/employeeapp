<div x-data="{ show: false, message: '', type: '' }"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90"
     x-init="window.addEventListener('notify', (event) => { show = true; message = event.detail.message; type = event.detail.type; setTimeout(() => { show = false }, 5000) })"
     :class="{
         'bg-green-500/40': type === 'success',
         'bg-red-500/40': type === 'error',
         'bg-yellow-500/40': type === 'warning',
         'bg-blue-500/40': type === 'info'
     }"
     class="fixed bottom-5 right-5 z-50 px-4 py-2 rounded-md text-slate-900 shadow-lg">
    <span x-text="message"></span>
</div>