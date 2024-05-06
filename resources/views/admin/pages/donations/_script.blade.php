@push('css')
    @css(aAdmin('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css'))
    @css(aAdmin('vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'))
    @css(aAdmin('vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css'))
@endpush

@push('js')
    @js(aAdmin('vendor/datatables.net/js/jquery.dataTables.min.js'))
    @js(aAdmin('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js'))
    @js(aAdmin('vendor/datatables.net-buttons/js/dataTables.buttons.min.js'))
    @js(aAdmin('vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'))
    @js(aAdmin('vendor/datatables.net-buttons/js/buttons.html5.min.js'))
    @js(aAdmin('vendor/datatables.net-buttons/js/buttons.flash.min.js'))
    @js(aAdmin('vendor/datatables.net-buttons/js/buttons.print.min.js'))
    @js(aAdmin('vendor/datatables.net-select/js/dataTables.select.min.js'))
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <script>$.fn.poshytip={defaults:null}</script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

    <script>
        const showTooltip = '{!! __('app.View') !!}';
        const showUrl = '{{ route('admin.donations.show', ['id' => ':slug']) }}';

        const editTooltip = '{!! __('app.Edit') !!}';
        const editUrl = '{{ route('admin.donations.edit', ['id' => ':slug']) }}';

        const deleteTooltip = '{!! __('app.Destroy') !!}';

        //const userType = '{!! auth()->user()->type !!}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $('.dataTable').dataTable({
            order: ['0', 'desc'],
            pageLength: 100,
            lengthMenu: [ 50, 100, 250],
            orderCellsTop: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            createdRow: function (row, data) {
                $(row).attr('data-id', data.id).addClass('item-row');
                if (data.seen == 0) {
                    $(row).attr('data-id', data.id).addClass('table-success');
                }
            },
            language: {
                // sProcessing: '<div class="spinner-border" role="status"><span class="sr-only">Loading...</span> </div>'
                //processing: "<div id='datatable-loader'></div>",
                paginate: {
                    next: '<i class="fas fa-angle-right" title="{{ __('app.List.Next') }}"></i>',
                    previous: '<i class="fas fa-angle-left title="{{ __('app.List.Previous') }}"></i>'
                }
            },
            columns: [
                // {
                //     data: 'id',
                //     name: 'id'
                // },
                {
                    data: 'sponsor_id',
                    name: 'sponsor_id',
                },
                // {
                //     data: 'fundraiser_id',
                //     name: 'fundraiser_id'
                // },
                // {
                //     data: 'gift_id',
                //     name: 'gift_id'
                // },
                {
                    data: 'project_type',
                    name: 'project_type'
                },
                // {
                //     data: 'is_binding',
                //     name: 'is_binding',
                // },

                {
                    data: 'children_id',
                    name: 'children_id',
                },
                {
                    data: 'amount',
                    name: 'amount',
                },
                {
                    data: 'card_type',
                    name: 'card_type',
                },
                // {
                //     data: 'fullname',
                //     name: 'fullname',
                // },
                /*{
                    data: 'message',
                    name: 'message',
                },
                {
                    data: 'message_admin',
                    name: 'message_admin',
                },*/
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                // {
                //     data: 'message',
                //     name: 'message',
                // },
                {
                    data: 'message_admin',
                    name: 'message_admin',
                },
                {
                    data: 'tools',
                    name: 'tools',
                    className: 'text-right',
                    orderable: false,
                    searchable: false,
                    render: function (id, q, row) {
                        let tools = '';
                        tools += '<a class="btn btn-sm btn-icon-only btn-outline-primary" ' +
                            'href="' + showUrl.replace(':slug', row.id) + '" ' +
                            'target="_blank"'+
                            'title="' + showTooltip +'">' +
                            '<i class="fas fa-eye"></i>' +
                            '</a>';

                        tools += '<a class="btn btn-sm btn-icon-only btn-outline-primary" ' +
                            'href="' + editUrl.replace(':slug', row.id) + '" ' +
                            'title="' + editTooltip +'">' +
                            '<i class="far fa-edit"></i>' +
                            '</a>';

                        // tools += '<a class="btn btn-sm btn-icon-only btn-outline-danger delete" ' +
                        //     'href="javascript:void(0)" ' +
                        //     'title="' + deleteTooltip +'" ' +
                        //     'data-toggle="modal" ' +
                        //     'data-target="#itemDeleteModal">' +
                        //     '<i class="fas fa-times"></i>' +
                        //     '</a>';

                        /*if (parseInt(userType) === parseInt('{{ \App\Constants\UserRole::ADMIN }}')) {
                            tools += '<span class="d-inline-block" style="margin-left:4px;" data-toggle="modal" data-target="#itemDeleteModal">' +
                                '<a href="javascript:void(0)" class="icon-btn delete" ' + deleteTooltip + '></a>' +
                            '</span>'
                        }*/

                        return tools;
                    }
                }
            ],
            //order: [],
            ajax: {
                url: '{{ route('admin.donations.listPortion') }}',
                type: 'POST',
                /*data: function (e) {
                    return getSearchParams(e)
                }*/
            },
            dom: 'lBfrtip',
            buttons: []
        });

        /**
         * Item status changer
         */
        $(document).on('click', '.status-changer span', function() {
            let value = $(this).parent().find('input').val();
            if (value == 1) {
                $(this).parent().find('input').val(0);
            } else {
                $(this).parent().find('input').val(1);
            }

            let url = "{!! route('admin.donations.status', ['id' => ':slug']) !!}";
            var thisItemId = $(this).parents('tr').data('id');

            $.ajax({
                url: url.replace(':slug', thisItemId),
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    itemId: thisItemId,
                    value: $(this).parent().find('input').val(),
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });

        /**
         * Item binding changer
         */
        $(document).on('click', '.binding-changer span', function() {
            let value = $(this).parent().find('input').val();
            if (value == 1) {
                $(this).parent().find('input').val(0);
            } else {
                $(this).parent().find('input').val(1);
            }

            let url = "{!! route('admin.donations.binding', ['id' => ':slug']) !!}";
            var thisItemId = $(this).parents('tr').data('id');

            $.ajax({
                url: url.replace(':slug', thisItemId),
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    itemId: thisItemId,
                    value: $(this).parent().find('input').val(),
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });


        var itemId = $('#pdf-item-id'),
            blocked = false,
            modal = $('#itemDeleteModal');
        loader = modal.find('.modal-loader');

        function modalError() {
            loader.removeClass('shown');
            blocked = false;
            //toastr.error('{{ t('Admin action notify.error') }}');
            modal.modal('hide');
        }

        modal.on('show.bs.modal', function (e) {
            if (blocked) return false;
            var $this = $(this),
                button = $(e.relatedTarget),
                thisItemRow = button.parents('.item-row');
            itemId.val(thisItemRow.data('id'));
        }).on('hide.bs.modal', function (e) {
            if (blocked) return false;
        });
        $('#itemDeleteForm').on('submit', function () {
            let url = "{!! route('admin.donations.delete', ['id' => ':slug']) !!}";
            if (blocked) return false;
            blocked = true;
            var thisItemId = itemId.val();
            if (thisItemId && thisItemId.match(/^[1-9][0-9]{0,9}$/)) {
                loader.addClass('shown');
                $.ajax({
                    url: url.replace(':slug', thisItemId),
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: csrf,
                        _method: 'delete',
                        itemId: thisItemId,
                    },
                    error: function (e) {
                        modalError();
                    },
                    success: function (response) {
                        if (response) {
                            loader.removeClass('shown');
                            blocked = false;
                            //toastr.success('{{ t('Admin action notify.success') }}');
                            modal.modal('hide');
                            $('.item-row[data-id="' + thisItemId + '"]').fadeOut(function () {
                                $(this).remove();
                            });
                        } else modalError();
                    }
                });
            } else modalError();
        });

        $(document).on('click', '.addYearToSession', function() {
            let year = $(this).data('year');
            let url = "{!! route('admin.donations.addYearFilterToSession') !!}";

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    year: year,
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        window.location.href = "/admin/donations/list";
                        //window.loacion.reload();
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });

        $(document).on('click', '.addMonthToSession', function() {
            let month = $(this).data('month');
            let url = "{!! route('admin.donations.addMonthFilterToSession') !!}";

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    month: month,
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        window.location.href = "/admin/donations/list";
                        //window.loacion.reload();
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });



        $(document).on('click', '.addGiftToSession', function() {
            let gift = $(this).data('gift');
            let url = "{!! route('admin.donations.addGiftFilterToSession') !!}";

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    gift: gift,
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        window.location.href = "/admin/donations/list";
                        //window.loacion.reload();
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });


        $(document).on('click', '.addFundraiserToSession', function() {
            let fundraiser = $(this).data('fundraiser');
            let url = "{!! route('admin.donations.addFundraiserToSession') !!}";

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    fundraiser: fundraiser,
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        window.location.href = "/admin/donations/list";
                        //window.loacion.reload();
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });



        $(document).on('click', '.addFailedToSession', function() {
            let failed = $(this).data('failed');
            let url = "{!! route('admin.donations.addFailedToSession') !!}";

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    failed: failed,
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        window.location.href = "/admin/donations/list";

                        //window.loacion.reload();
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });

        $(document).on('click', '.addChildToSession', function() {
            let child = $(this).data('child');
            let url = "{!! route('admin.donations.addChildToSession') !!}";

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    child: child,
                },
                error: function (e) {
                    return false;
                },
                success: function (response) {
                    if (response) {
                        window.location.href = "/admin/donations/list";
                        console.log(child)
                        //window.loacion.reload();
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });


        //start contact animation
        // $("#updateAjax").submit(function(e) {
        //
        //     e.preventDefault(); // avoid to execute the actual submit of the form.
        //
        //     var form = $(this);
        //     var url = form.attr('action');
        //
        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         data: form.serialize(), // serializes the form's elements.
        //         success: function(data)
        //         {
        //
        //             console.log('Er');
        //         },
        //         error:function(data){
        //             alert("there is an error kindly check it now");
        //         }
        //
        //     });
        //
        //     return false;
        //
        // });
    </script>
@endpush
