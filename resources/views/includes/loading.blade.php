@if ($searchEnabled && $loadingIndicator)
    <div class="mx-auto my-auto py-20" wire:loading wire:target="search">
        <svg focusable="false" stroke="currentColor" class="w-24 h-24" viewBox="0 0 57 57" xmlns="http://www.w3.org/2000/svg"
            class="q-spinner text-red">
            <g transform="translate(1 1)" stroke-width="2" fill="none" fill-rule="evenodd">
                <circle cx="16.3651" cy="50" r="5">
                    <animate attributeName="cy" begin="0s" dur="2.2s" values="50;5;50;50" calcMode="linear"
                        repeatCount="indefinite"></animate>
                    <animate attributeName="cx" begin="0s" dur="2.2s" values="5;27;49;5" calcMode="linear"
                        repeatCount="indefinite"></animate>
                </circle>
                <circle cx="21.3175" cy="16.6234" r="5">
                    <animate attributeName="cy" begin="0s" dur="2.2s" from="5" to="5" values="5;50;50;5" calcMode="linear"
                        repeatCount="indefinite"></animate>
                    <animate attributeName="cx" begin="0s" dur="2.2s" from="27" to="27" values="27;49;5;27" calcMode="linear"
                        repeatCount="indefinite"></animate>
                </circle>
                <circle cx="43.3175" cy="38.3766" r="5">
                    <animate attributeName="cy" begin="0s" dur="2.2s" values="50;50;5;50" calcMode="linear"
                        repeatCount="indefinite"></animate>
                    <animate attributeName="cx" from="49" to="49" begin="0s" dur="2.2s" values="49;5;27;49" calcMode="linear"
                        repeatCount="indefinite"></animate>
                </circle>
            </g>
        </svg>
    </div>
@endif
