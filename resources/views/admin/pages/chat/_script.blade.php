@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        var itemId = $('#pdf-item-id'),
            modalTitle = $('#pdm-title'),
            blocked = false,
            modal = $('#itemDeleteModal');
        loader = modal.find('.modal-loader');

        function modalError() {
            loader.removeClass('shown');
            blocked = false;
            //toastr.error('{{ t('Admin action notify.error') }}');
            modal.modal('hide');
        }
        modal.on('show.bs.modal', function(e){
            if (blocked) return false;
            var $this = $(this),
                button = $(e.relatedTarget),
                thisItemRow = button.parents('.item-row');
            itemId.val(parseInt(thisItemRow.data('id')));
            modalTitle.html(thisItemRow.find('.item-title').html());
        }).on('hide.bs.modal', function(e){
            if (blocked) return false;
        });

        /**
         * Item delete
         */
        $('#itemDeleteForm').on('submit', function() {
            if (blocked) return false;
            blocked = true;
            var thisItemId = itemId.val();
            if (thisItemId && thisItemId.match(/^[1-9][0-9]{0,9}$/)) {
                loader.addClass('shown');
                let url = "{!! route('admin.chat.delete', ['id' => ':slug']) !!}";

                $.ajax({
                    url: url.replace(':slug', thisItemId),
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: csrf,
                        _method: 'delete',
                        itemId: thisItemId,
                    },
                    error: function(response){
                        modalError();
                    },
                    success: function(response){
                        if (response.success) {
                            loader.removeClass('shown');
                            blocked = false;
                            //toastr.success('{{ t('Admin action notify.success') }}');
                            modal.modal('hide');
                            $('.item-row[data-id="'+thisItemId+'"]').fadeOut(function(){
                                $(this).remove();
                            });
                        }
                        else modalError();
                    }
                });
            }
            else modalError();
        });

        /**
         * Item restore
         */
        $('.item-restore').on('click', function () {
            let url = "{!! route('admin.chat.restore', ['id' => ':slug']) !!}";
            var thisItemId = $(this).parents('div.item-row').data('id');

            $.ajax({
                url: url.replace(':slug', thisItemId),
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'patch',
                    itemId: thisItemId,
                    value: $(this).parent().find('input').val(),
                },
                error: function (response) {
                    return false;
                },
                success: function (response) {
                    if (response.success) {
                        blocked = false;
                        $('.item-row[data-id="'+thisItemId+'"]').fadeOut(function(){
                            $(this).remove();
                        });
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });

    </script>
@endpush
