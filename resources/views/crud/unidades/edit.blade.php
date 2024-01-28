<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de Unidades
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $routeIndex = route('unidades.index');
                        $disabled = $crud == 'show';
                        $action = route('unidades.index');
                        $method = 'get';
                        if ($crud == 'edit') {
                            $action = route('unidades.update', $data->id);
                            $method = 'patch';
                        }
                        if ($crud == 'create') {
                            $action = route('unidades.store');
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
                            <div class="col-3">
                                <x-input-label for="unidade" :value="'Unidade'" />
                                <x-text-input id="unidade" name="unidade" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('unidate', $data->unidade)" required autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('unidade')" />
                            </div>
                            <div class="col-5">
                                <x-input-label for="cidade" :value="'Cidade'" />
                                <x-text-input id="cidade" name="cidade" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('cidate', $data->cidade)" required autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                            </div>
                            <div class="col-2">
                                <x-input-label for="uf" :value="'UF'" />
                                <x-text-input id="uf" name="uf" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('uf', $data->uf)" required autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('uf')" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <x-input-label for="tipo" :value="'Tipo'" />
                                <select name="tipo" id="tipo" class="col-12">
                                    @foreach (\App\Enum\Unidade\TipoEnum::cases() as $tipo)
                                        <option value="{{ $tipo->value }}"
                                            {{ $tipo->value == $data->tipo->value ? 'selected' : null }}>
                                            {{ $tipo->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('tipo')" />
                            </div>
                            <div class="col-3">
                                <x-input-label for="cep" :value="'CEP'" />
                                <x-text-input id="cep" name="cep" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('cep', $data->cep)" required autocomplete="sigla" />
                                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
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
