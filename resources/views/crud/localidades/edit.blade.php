<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de Localidades
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $routeIndex = route('localidades.index');
                        
                        $listUF = [
                            'AC' => 'Acre',
                            'AL' => 'Alagoas',
                            'AP' => 'Amapá',
                            'AM' => 'Amazonas',
                            'BA' => 'Bahia',
                            'CE' => 'Ceará',
                            'DF' => 'Distrito Federal',
                            'ES' => 'Espírito Santo',
                            'GO' => 'Goiás',
                            'MA' => 'Maranhão',
                            'MT' => 'Mato Grosso',
                            'MS' => 'Mato Grosso do Sul',
                            'MG' => 'Minas Gerais',
                            'PA' => 'Pará',
                            'PB' => 'Paraíba',
                            'PR' => 'Paraná',
                            'PE' => 'Pernambuco',
                            'PI' => 'Piauí',
                            'RJ' => 'Rio de Janeiro',
                            'RN' => 'Rio Grande do Norte',
                            'RS' => 'Rio Grande do Sul',
                            'RO' => 'Rondonia',
                            'RR' => 'Roraima',
                            'SC' => 'Santa Catarina',
                            'SP' => 'São Paulo',
                            'SE' => 'Sergipe',
                            'TO' => 'Tocantins',
                        ];
                        $listFRAP = [
                            0 => 'Não',
                            1 => 'Sim',
                        ];
                        
                        $disabled = $crud == 'show';
                        $action = route('localidades.index');
                        $method = 'get';
                        if ($crud == 'edit') {
                            $action = route('localidades.update', $data->id);
                            $method = 'patch';
                        }
                        if ($crud == 'create') {
                            $action = route('localidades.store');
                            $method = 'post';
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
                                <x-input-label for="uf" :value="'UF'" />
                                <select name="uf" id="uf" class="col-12">
                                    @foreach ($listUF as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $data->uf ? 'selected' : null }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('uf')" />
                            </div>

                            <div class="col-5">
                                <x-input-label for="descricao" :value="'Descrição'" />
                                <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block w-full"
                                    :value="old('descricao', $data->descricao)" required autofocus autocomplete="descricao" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <x-input-label for="cep1" :value="'CEP Inicial'" />
                                <x-text-input id="cep1" name="cep1" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('cep1', $data->cep1)" required autocomplete="cep1" />
                                <x-input-error class="mt-2" :messages="$errors->get('cep1')" />
                            </div>
                            <div class="col-2">
                                <x-input-label for="cep2" :value="'CEP Final'" />
                                <x-text-input id="cep2" name="cep2" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('cep2', $data->cep2)" required autocomplete="cep2" />
                                <x-input-error class="mt-2" :messages="$errors->get('cep2')" />
                            </div>
                            <div class="col-2">
                                <x-input-label for="roteirizacao" :value="'Roteirização'" />
                                <x-text-input id="roteirizacao" name="roteirizacao" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('roteirizacao', $data->roteirizacao)" required autocomplete="roteirizacao" />
                                <x-input-error class="mt-2" :messages="$errors->get('roteirizacao')" />
                            </div>
                            <div class="col-3">
                                <x-input-label for="unidade" :value="'Unidade'" />
                                <x-text-input id="unidade" name="unidade" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('unidade', $data->unidade)" required autocomplete="unidade" />
                                <x-input-error class="mt-2" :messages="$errors->get('unidade')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <x-input-label for="tabela" :value="'Tabela'" />
                                <x-text-input id="tabela" name="tabela" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('tabela', $data->tabela)" required autocomplete="tabela" />
                                <x-input-error class="mt-2" :messages="$errors->get('tabela')" />
                            </div>
                            <div class="col-3">
                                <x-input-label for="tarifa" :value="'Tarifa'" />
                                <select name="tarifa" id="tarifa" class="col-12">
                                    @foreach (\App\Enum\Localidade\TarifaEnum::cases() as $tarifa)
                                        <option value="{{ $tarifa->value }}"
                                            {{ $tarifa->value == $data->tarifa->value ? 'selected' : null }}>
                                            {{ $tarifa->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('tarifa')" />
                            </div>
                            <div class="col-3">
                                <x-input-label for="grupo" :value="'Grupo'" />
                                <select name="grupo" id="grupo" class="col-12">
                                    @foreach (\App\Enum\Localidade\GrupoEnum::cases() as $grupo)
                                        <option value="{{ $grupo->value }}"
                                            {{ $grupo->value == $data->grupo->value ? 'selected' : null }}>
                                            {{ $grupo->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('grupo')" />
                            </div>
                            <div class="col-3">
                                <x-input-label for="frap" :value="'FRAP'" />
                                <select name="frap" id="frap" class="col-12">
                                    @foreach ($listFRAP as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $key == $data->frap ? 'selected' : null }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('frap')" />
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

<script src="{{ asset('js/cpfcnpj.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
