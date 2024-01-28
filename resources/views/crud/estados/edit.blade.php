<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de Estados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $routeIndex = route('estados.index');
                        $disabled = $crud == 'show';
                        $action = route('estados.index');
                        $method = 'get';
                        if ($crud == 'edit') {
                            $action = route('estados.update', $data->id);
                            $method = 'patch';
                        }
                        if ($crud == 'create') {
                            $action = route('estados.store');
                            $method = 'post';
                        }
                    @endphp

                    <form method="post" action="{{ $action }}" class="mt-6 space-y-6">
                        @csrf
                        @method($method)

                        <div class="row">
                            <div class="col-3">
                                <x-input-label for="id" :value="'ID'" />
                                <x-text-input id="id" name="id" :canEdit="$disabled" type="text"
                                    class="mt-1 block w-full" :value="old('id', $data->id)" autocomplete="id" />
                                <x-input-error class="mt-2" :messages="$errors->get('id')" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <x-input-label for="nome" :value="'Descrição'" />
                                <x-text-input id="nome" name="nome" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('nome', $data->nome)" required autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <x-input-label for="sigla" :value="'Sigla'" />
                                <x-text-input id="sigla" name="sigla" type="text" :canEdit="$disabled"
                                    class="mt-1 block w-full" :value="old('sigla', $data->sigla)" required autocomplete="sigla" />
                                <x-input-error class="mt-2" :messages="$errors->get('sigla')" />
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
    $(document).ready(function() {
        $('#estado_id').select2({
            language: "br",
            theme: "bootstrap-5",
            selectionCssClass: "select2--large",
            dropdownCssClass: "select2--large",
            placeholder: 'Selecione...',
            delay: 500,
            minimumInputLength: 2,
            ajax: {
                url: "{{ route('estados.select2') }}",
                dataType: 'json'
            }
        });
    });
</script>
