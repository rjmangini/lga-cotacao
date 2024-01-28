<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de Pesos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $routeIndex = route('pesos.index');
                        $disabled = $crud == 'show';
                        $action = route('pesos.index');
                        $method = 'get';
                        if ($crud == 'edit') {
                            $action = route('pesos.update', $data->id);
                            $method = 'patch';
                        }
                        if ($crud == 'create') {
                            $action = route('pesos.store');
                            $method = 'post';
                        }
                    @endphp

                    <form method="post" action="{{ $action }}" class="mt-6 space-y-6">
                        @csrf
                        @method($method)

                        <div class="row">
                            <div class="col-3">
                                <x-input-label for="id" :value="'ID'" />
                                <x-text-input id="id" name="id" disabled type="text"
                                    class="mt-1 block w-full" :value="old('id', $data->id)" autocomplete="id" />
                                <x-input-error class="mt-2" :messages="$errors->get('id')" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <x-input-label for="descricao" :value="'Descrição'" />
                                <x-text-input id="descricao" name="descricao" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('descricao', $data->descricao)" required autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <x-input-label for="peso" :value="'Peso'" />
                                <x-text-input id="peso" name="peso" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('peso', $data->peso)" required autocomplete="sigla" />
                                <x-input-error class="mt-2" :messages="$errors->get('peso')" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            @if (!$disabled)
                                <x-save-button>{{ __('Save') }}</x-save-button>
                            @endif

                            <x-cancel-button :routeIndex="$routeIndex">{{ __('Cancel') }}</x-cancel-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(document).ready(function() {});
</script>
