<div>


    <div class="bg-gray-50 rounded-xl shadow-lg p-4 w-full mb-4 h-[200px] flex flex-col">
        <div class="flex-1 overflow-y-auto space-y-4 px-2 py-1">
            @foreach($messages as $message)
            <div class="flex {{ $message->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="flex items-center {{ $message->user_id === auth()->id() ? 'flex-row-reverse' : '' }}">

                    <img class="h-10 w-10 rounded-full object-cover object-center"
                        src="{{ $message->user->profile_photo_url }}" alt="Avatar">

                    <div class="mx-2 px-5 py-3 rounded-2xl max-w-xs break-words
                                {{ $message->user_id === 3 
                                    ? 'bg-purple-200 text-purple-900 rounded-br-none shadow-sm' 
                                    : 'bg-green-100 text-green-900 rounded-bl-none shadow-sm' }}">
                        <p class="text-sm">{{ $message->content }}</p>
                        <span class="text-xs text-gray-500 block mt-1 text-right">
                            {{ $message->created_at->diffForHumans() }}
                        </span>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    <form class="bg-white rounded-lg shadow-lg p-6 w-full mb-4" wire:submit.prevent="save">

        <x-validation-errors />

        <div class="mb-4" class="mb-4">
            <x-label class="mb-1">
                Mensagem
            </x-label>
            <x-textarea wire:model="content" class="w-full h-32" placeholder="" />
        </div>

        <div class="flex justify-end">
            <x-button>
                Enviar
            </x-button>
        </div>

    </form>



</div>