<x-app-layout>

    <script></script>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Cadastro de {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success d-flex justify-content-center">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger d-flex justify-content-center">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex mb-3 flex-row-reverse">
                        <a href="{{ $routeCreate }}" class="btn btn-primary col-3 font-semibold">
                            Novo Registro
                        </a>
                    </div>
                    <table id="tablelist" class="table-bordered data-table table">
                        <thead>
                            <tr>
                                @foreach ($columns as $column)
                                    <th class="text-center">{{ $column }}</th>
                                @endforeach
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    var htmlPermission;
    var levelPermission = $("#levelpermission").val();
    var levelPermission = 4;
    var coloredFields = [];
    var urlGetIndex = "{{ $routeIndex }}";
    var urlGetShow = "{{ $routeShow }}";
    var urlGetEdit = "{{ $routeEdit }}";
    var urlGetDestroy = "{{ $routeDestroy }}";

    var tableOrderDefault = [
        [0, "asc"]
    ];

    htmlPermission = `<a href="urlBase"><i class="fa fa-eye"></i></a>`;
    htmlPermission = htmlPermission.replace('urlBase', urlGetShow.replace('-9', 'sData'));
    if (levelPermission >= 2) {
        htmlPermission = htmlPermission + ` | <a href="urlBase"><i class="fa fa-pencil-square-o"></i> </a>`;
        htmlPermission = htmlPermission.replace('urlBase', urlGetEdit.replace('-9', 'sData'));
    }
    if (levelPermission >= 3) {
        htmlPermission = htmlPermission +
            ` | <a id="sData" class="deleteRow"><i class="fa fa-trash" style="color: red;"></i></a>`;
    }

    var jqXhr = $.ajax({
        url: '{{ $routeList }}',
        method: 'GET',
        dataType: 'json'
    });

    jqXhr.done(function(data) {
        var dataObject = data;
        dataObject.columns.push({
            data: 'id',
            fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                let btn = htmlPermission;
                btn = btn.replace(/sData/g, sData);
                $(nTd).html(btn);
                $(nTd).addClass('col-sd-1 dt-center');
            }
        });

        $('#tablelist').DataTable({
            "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'
            },
            "rowCallback": function(row, data, index) {
                for (i = 0; i < coloredFields.length; i++) {
                    let campo = coloredFields[i];
                    let posicao = coloredColumns[i];
                    let idLegenda = coloredLegend[i];
                    $(row).find('td:eq(' + posicao + ')').css('background-color', data[campo]);
                    $(row).find('td:eq(' + posicao + ')').css('color', data[campo]);
                    $(row).find('td:eq(' + posicao + ')').click(function() {
                        $('#' + idLegenda).modal('show');
                    });
                }
            },
            "data": dataObject.data,
            "columns": dataObject.columns,
            "order": tableOrderDefault,
            "lengthMenu": [
                [50, 25, 100, -1],
                [50, 25, 100, "Tudo"]
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false
            }, ],
            "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "buttons": [{
                    extend: 'copy',
                    text: 'Copiar',
                    title: document.title,
                    'exportOptions': {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    text: 'Excel CSV',
                    title: document.title,
                    'exportOptions': {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    title: document.title,
                    'exportOptions': {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    title: document.title,
                    'exportOptions': {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    text: 'Colunas visíveis'
                }
            ]
        });

    });

    $('#tablelist tbody').on('click', '.deleteRow', function() {
        var btn = this;

        Swal.fire({
            title: 'Excluir registro ?',
            text: "Você está tentando excluir um registro",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                        type: 'DELETE',
                        url: urlGetDestroy.replace('-9', btn.id),
                        dataType: 'html',
                        data: {
                            _token: $("input[name=_token]").val()
                        }
                    })
                    .done(function(data) {
                        let type, title;
                        let retorno = JSON.parse(data);
                        if (retorno.success) {
                            title = 'OK';
                            type = 'success';
                        } else {
                            title = 'Error !';
                            type = 'error';
                        }
                        Swal.fire(
                            title,
                            retorno.message,
                            type
                        ).then(function() {
                            window.location.href = urlGetIndex;
                        });
                    });
            }
        })
    });
</script>
