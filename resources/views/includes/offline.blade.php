{{-- @if ($offlineIndicator) --}}
<div x-data="{open: true}" x-show="open" wire:offline class="relative bg-aurora-red">
    <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="pr-16 sm:text-center sm:px-16">
            <p class="font-medium text-white">
               @svg('light/sad-tear', 'w-5 h-5 mr-2') {{ $offlineMessage }}
            </p>
        </div>
        <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
            <button x-on:click.stop="open=false" type="button" class="flex p-2 rounded-md bg-aurora-red hover:bg-aurora-orange focus:outline-none focus:bg-aurora-orange transition ease-in-out duration-150" aria-label="Dismiss">
                @svg('light/times', 'h-6 w-6 text-white')
            </button>
        </div>
    </div>
</div>
{{-- @endif --}}
