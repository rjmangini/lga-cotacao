<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de Usuários
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $routeIndex = route('users.index');
                        $selCliente_id = $data->cliente->id ?? null;
                        $selCliente_text = $data->cliente->razaosocial ?? null;
                        $disabled = $crud == 'show';
                        $action = route('users.index');
                        $method = 'get';
                        if ($crud == 'edit') {
                            $action = route('users.update', $data->id);
                            $method = 'patch';
                        }
                        if ($crud == 'create') {
                            $action = route('users.store');
                            $method = 'post';
                        }
                        $listLevel = [
                            1 => 'Usuário',
                            5 => 'Coordenador',
                            9 => 'Gerência',
                            99 => 'Adminstrador'
                        ];
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
                            <div class="col-7">
                                <x-input-label for="name" :value="'Usuário'" />
                                <x-text-input id="name" name="name" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('name', $data->name)" required autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <x-input-label for="email" :value="'e-mail'" />
                                <x-text-input id="email" name="email" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('email', $data->email)" required autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <x-input-label for="frap" :value="'Nível de Acesso'" />
                                <select name="frap" id="frap" class="col-12" {{ ($disabled ? "disabled" : "") }}>
                                    @foreach ($listLevel as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $key == $data->level ? 'selected' : null }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('level')" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <input type="hidden" id="sel2_cliente_id" value="{{ $data->cliente_id }}" />
                                <x-input-label for="cliente_id" :value="'Cliente'" />
                                <x-select2-input :name="'cliente_id'" :canEdit="$disabled" />
                                <x-input-error class="mt-2" :messages="$errors->get('cliente_id')" />
                            </div>
                        </div>

                        @if (! $disabled)
                            <!-- Password -->
                            <div>
                                <div class="row">
                                    <div class="col-3">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                                            autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="row">
                                    <div class="col-3">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                                            name="password_confirmation" autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="mt-4 alert alert-danger justify-content-center" id="box_password">
                                    <p>Senhas estão diferentes, favor verificar !</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-center gap-4">
                            @if (!$disabled)
                                <x-save-button :id="'btn-save'">{{ __('Save') }}</x-save-button>
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
        $("#box_password").css('display', 'none');

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
                dataType: 'json',
            },
        });
        $('#cliente_id')
            .empty() //empty select
            .append($("<option/>") //add option tag in select
                .val("{{ $selCliente_id }}") //set value for option to post it
                .text("{{ $selCliente_text }}") //set a text for show in select
            )
            .val("{{ $selCliente_id }}") //select option of select2
            .trigger("change"); //apply to select2
    
        function checkPassword() {
            let pass = $("#password").val();
            let cpass = $("#password_confirmation").val();
            if (pass == cpass) {
                $("#btn-save").attr("disabled", false);
                $("#box_password").css('display', 'none');
            }
            if (pass != cpass) {
                $("#btn-save").attr("disabled", true);
                $("#box_password").css('display', 'block');
            }
            return true;
        };
        
        $("#password").focusout(function () {
            checkPassword();
        });

        $("#password_confirmation").focusout(function () {
            checkPassword();
        });
    });

</script>
