<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de Parâmetros
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $routeIndex = route('parametros.edit', 1);
                        
                        $disabled = $crud == 'show';
                        $action = route('parametros.edit');
                        $method = 'get';
                        if ($crud == 'edit') {
                            $action = route('parametros.update', $data->id);
                            $method = 'patch';
                        }
                    @endphp

                    <form method="post" action="{{ $action }}" class="mt-6 space-y-6">
                        @csrf
                        @method($method)

                        <div class="row mt-3">
                            <div class="col-3">
                                <x-input-label for="id" :value="'ID'" />
                                <x-text-input id="id" name="id" type="text" class="mt-1 block w-full"
                                    disabled :value="old('id', $data->id)" autocomplete="id" />
                                <x-input-error class="mt-2" :messages="$errors->get('id')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3">
                                <x-input-label for="capatazia_min" :value="'Capatazia KG min'" />
                                <x-text-input id="capatazia_min" name="capatazia_min" type="text"
                                    class="mt-1 block w-full" :value="old('capatazia_min', $data->capatazia_min)" required autofocus
                                    autocomplete="capatazia_min" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('capatazia_min')" />
                            </div>

                            <div class="col-3">
                                <x-input-label for="capatazia_val" :value="'Fator Capatazia'" />
                                <x-text-input id="capatazia_val" name="capatazia_val" type="text"
                                    class="mt-1 block w-full" :value="old('capatazia_val', $data->capatazia_val)" required autofocus
                                    autocomplete="capatazia_val" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('capatazia_val')" />
                            </div>

                            <div class="col-3">
                                <x-input-label for="taxa1" :value="'Taxa Emissão'" />
                                <x-text-input id="taxa1" name="taxa1" type="text" class="mt-1 block w-full"
                                    :value="old('taxa1', $data->taxa1)" required autofocus autocomplete="taxa1" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('taxa1')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <x-input-label for="taxanf_capital" :value="'% Capital'" />
                                <x-text-input id="taxanf_capital" name="taxanf_capital" type="text"
                                    :canEdit="$disabled" class="mt-1 block w-full" :value="old('taxanf_capital', $data->taxanf_capital)" required
                                    autocomplete="taxanf_capital" />
                                <x-input-error class="mt-2" :messages="$errors->get('taxanf_capital')" />
                            </div>

                            <div class="col-2">
                                <x-input-label for="taxanf_interior" :value="'% Interior'" />
                                <x-text-input id="taxanf_interior" name="taxanf_interior" type="text"
                                    :canEdit="$disabled" class="mt-1 block w-full" :value="old('taxanf_interior', $data->taxanf_interior)" required
                                    autocomplete="taxanf_interior" />
                                <x-input-error class="mt-2" :messages="$errors->get('taxanf_interior')" />
                            </div>

                            <div class="col-2">
                                <x-input-label for="taxanf_capital2" :value="'% Capital #2'" />
                                <x-text-input id="taxanf_capital2" name="taxanf_capital2" type="text"
                                    :canEdit="$disabled" class="mt-1 block w-full" :value="old('taxanf_capital2', $data->taxanf_capital2)" required
                                    autocomplete="taxanf_capital2" />
                                <x-input-error class="mt-2" :messages="$errors->get('taxanf_capital2')" />
                            </div>

                            <div class="col-2">
                                <x-input-label for="taxanf_interior2" :value="'% Interior #2'" />
                                <x-text-input id="taxanf_interior2" name="taxanf_interior2" type="text"
                                    :canEdit="$disabled" class="mt-1 block w-full" :value="old('taxanf_interior2', $data->taxanf_capital2)" required
                                    autocomplete="taxanf_interior2" />
                                <x-input-error class="mt-2" :messages="$errors->get('taxanf_interior2')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3">
                                <x-input-label for="valornf" :value="'Valor Base NF'" />
                                <x-text-input id="valornf" name="valornf" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('valornf', $data->valornf)" required autocomplete="valornf" />
                                <x-input-error class="mt-2" :messages="$errors->get('valornf')" />
                            </div>

                            <div class="col-3">
                                <x-input-label for="frap_valor" :value="'Taxa FRAP'" />
                                <x-text-input id="frap_valor" name="frap_valor" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('frap_valor', $data->frap_valor)" required autocomplete="frap_valor" />
                                <x-input-error class="mt-2" :messages="$errors->get('frap_valor')" />
                            </div>

                            <div class="col-3">
                                <x-input-label for="pesomax" :value="'Peso Limite (Kg)'" />
                                <x-text-input id="pesomax" name="pesomax" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('pesomax', $data->pesomax)" required autocomplete="pesomax" />
                                <x-input-error class="mt-2" :messages="$errors->get('pesomax')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3">
                                <x-input-label for="valormax_capital" :value="'Valor Máximo Capital'" />
                                <x-text-input id="valormax_capital" name="valormax_capital" type="text"
                                    :canEdit="$disabled" class="mt-1 block w-full" :value="old('valormax_capital', $data->valormax_capital)" required
                                    autocomplete="valormax_capital" />
                                <x-input-error class="mt-2" :messages="$errors->get('valormax_capital')" />
                            </div>

                            <div class="col-3">
                                <x-input-label for="valormax_interior" :value="'Valor Máximo Interior'" />
                                <x-text-input id="valormax_interior" name="valormax_interior" type="text"
                                    :canEdit="$disabled" class="mt-1 block w-full" :value="old('valormax_interior', $data->valormax_interior)" required
                                    autocomplete="valormax_interior" />
                                <x-input-error class="mt-2" :messages="$errors->get('valormax_interior')" />
                            </div>

                            <div class="col-3">
                                <x-input-label for="valormax_aeroporto" :value="'Valor Máximo Aeroporto'" />
                                <x-text-input id="valormax_aeroporto" name="valormax_aeroporto" type="text"
                                    :canEdit="$disabled" class="mt-1 block w-full" :value="old('valormax_aeroporto', $data->valormax_aeroporto)" required
                                    autocomplete="valormax_aeroporto" />
                                <x-input-error class="mt-2" :messages="$errors->get('valormax_aeroporto')" />
                            </div>
                        </div>

                        <div class="mt-3 flex items-center gap-4">
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
    $(document).ready(function() {

    });
</script>
