<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de Destinatários
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $routeIndex = route('destinatarios.index');
                        
                        $selCliente_id = $data->cliente->id ?? null;
                        $selCliente_text = $data->cliente->razaosocial ?? null;
                        $selCidade_id = $data->cidade->id ?? null;
                        $selCidade_text = $data->cidade->nome ?? null;
                        
                        $disabled = $crud == 'show';
                        $action = route('destinatarios.index');
                        $method = 'get';
                        if ($crud == 'edit') {
                            $action = route('destinatarios.update', $data->id);
                            $method = 'patch';
                        }
                        if ($crud == 'create') {
                            $action = route('destinatarios.store');
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

                            <div class="col-3">
                                <x-input-label for="cnpj" :value="'CNPJ'" />
                                <x-text-input id="cnpj" name="cnpj" type="text" class="mt-1 block w-full"
                                    :value="old('cnpj', $data->cnpj)" required autofocus autocomplete="cnpj" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('cnpj')" />
                            </div>

                            <div class="col-3">
                                <x-input-label for="iestadual" :value="'Inscrição Estadual'" />
                                <x-text-input id="iestadual" name="iestadual" type="text" class="mt-1 block w-full"
                                    :value="old('iestadual', $data->iestadual)" required autofocus autocomplete="iestadual" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('iestadual')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-5">
                                <x-input-label for="cliente_id" :value="'Cliente'" />
                                <x-select2-input :name="'cliente_id'" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('cliente_id')" />
                            </div>
                            <div class="col-5">
                                <x-input-label for="razaosocial" :value="'Razão Social'" />
                                <x-text-input id="razaosocial" name="razaosocial" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('razaosocial', $data->razaosocial)" required autocomplete="razaosocial" />
                                <x-input-error class="mt-2" :messages="$errors->get('razaosocial')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <x-input-label for="cep" :value="'CEP'" />
                                <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full"
                                    :canEdit="$disabled" :value="old('cep', $data->cep)" required autocomplete="cep" />
                                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                            </div>
                            <div class="col-6">
                                <x-input-label for="endereco" :value="'Endereço'" />
                                <x-text-input id="endereco" name="endereco" type="text" class="mt-1 block w-full"
                                    :value="old('endereco', $data->endereco)" required autocomplete="endereco" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
                            </div>
                            <div class="col-4">
                                <x-input-label for="numero" :value="'Número'" />
                                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full"
                                    :value="old('numero', $data->numero)" required autocomplete="numero" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3">
                                <x-input-label for="complemento" :value="'Complemento'" />
                                <x-text-input id="complemento" name="complemento" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('complemento', $data->complemento)" autocomplete="complemento" />
                                <x-input-error class="mt-2" :messages="$errors->get('complemento')" :canEdit="$disabled" />
                            </div>
                            <div class="col-4">
                                <x-input-label for="bairro" :value="'Bairro'" />
                                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full"
                                    :value="old('bairro', $data->bairro)" autocomplete="bairro" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
                            </div>
                            <div class="col-5">
                                <x-input-label for="cidade_id" :value="'Cidade'" />
                                <x-select2-input :name="'cidade_id'" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('cidade_id')" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <x-input-label for="fone1" :value="'Fone'" />
                                <x-text-input id="fone1" name="fone1" type="text" class="mt-1 block w-full"
                                    :value="old('fone1', $data->fone)" autocomplete="fone1" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('fone1')" />
                            </div>
                            <div class="col-4">
                                <x-input-label for="contato" :value="'Contato'" />
                                <x-text-input id="contato" name="contato" type="text" class="mt-1 block w-full"
                                    :value="old('contaot', $data->contato)" autocomplete="contato" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('contato')" />
                            </div>
                            <div class="col-4">
                                <x-input-label for="email" :value="'e-mail'" />
                                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                                    :value="old('email', $data->email)" autocomplete="email" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
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

        $('#cliente_id').select2({
            language: "br",
            theme: "bootstrap-5",
            selectionCssClass: "select2--medium",
            dropdownCssClass: "select2--large",
            placeholder: 'Selecione...',
            delay: 500,
            minimumInputLength: 2,
            ajax: {
                url: "{{ route('clientes.select2') }}",
                dataType: 'json'
            }
        });
        $('#cliente_id')
            .empty() //empty select
            .append($("<option/>") //add option tag in select
                .val("{{ $selCliente_id }}") //set value for option to post it
                .text("{{ $selCliente_text }}") //set a text for show in select
            )
            .val("{{ $selCliente_id }}") //select option of select2
            .trigger("change"); //apply to select2

        $('#cidade_id').select2({
            language: "br",
            theme: "bootstrap-5",
            selectionCssClass: "select2--medium",
            dropdownCssClass: "select2--large",
            placeholder: 'Selecione...',
            delay: 500,
            minimumInputLength: 2,
            ajax: {
                url: "{{ route('cidades.select2') }}",
                dataType: 'json'
            }
        });
        $('#cidade_id')
            .empty() //empty select
            .append($("<option/>") //add option tag in select
                .val("{{ $selCidade_id }}") //set value for option to post it
                .text("{{ $selCidade_text }}") //set a text for show in select
            )
            .val("{{ $selCidade_id }}") //select option of select2
            .trigger("change"); //apply to select2

        // consultar o CEP
        $('#cep').on('blur', function() {
            if ($.trim($("#endereco").val()) == "") {
                if ($.trim($("#cep").val()) != "") {
                    $.get("https://viacep.com.br/ws/" + $("#cep").val() + "/json", function(data) {
                        if (data) {
                            $("#endereco").val(unescape(data.logradouro.toUpperCase()));
                            $("#bairro").val(unescape(data.bairro.toUpperCase()));
                            $('#cidade_id')
                                .empty() //empty select
                                .append($("<option/>") //add option tag in select
                                    .val(data.ibge) //set value for option to post it
                                    .text(data.localidade + '/' + data.uf) //set a text select
                                )
                                .val(data.ibge) //select option of select2
                                .trigger("change"); //apply to select2
                        }
                    });
                }
            }
        });

        // consultar o CEP
        $('#cep').on('blur', function() {
            if ($.trim($("#endereco").val()) == "") {
                if ($.trim($("#cep").val()) != "") {
                    $.get("https://viacep.com.br/ws/" + $("#cep").val() + "/json", function(data) {
                        if (data) {
                            $("#endereco").val(unescape(data.logradouro.toUpperCase()));
                            $("#bairro").val(unescape(data.bairro.toUpperCase()));
                            $('#cidade_id')
                                .empty() //empty select
                                .append($("<option/>") //add option tag in select
                                    .val(data.ibge) //set value for option to post it
                                    .text(data.localidade + '/' + data
                                        .uf) //set a text for show in select
                                )
                                .val(data.ibge) //select option of select2
                                .trigger("change"); //apply to select2
                        }
                    });
                }
            }
        });

        // validar CPF?CNPJ
        $('#cnpj').on('focusout', function() {
            if (!validaCpfCnpj($('#cnpj').val())) {
                Swal.fire({
                    title: 'CNPJ/CPF inválido',
                    text: "CNPJ/CPF não é válido, tem certeza que deseja prosseguir?",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não'
                }).then((result) => {
                    if (!result.value) {
                        $('#cnpj').val('');
                        $('#cnpj').focus();
                    }
                });
            }
        });

    });
</script>
