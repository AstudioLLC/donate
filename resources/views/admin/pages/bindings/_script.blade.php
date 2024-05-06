@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        /**
         * Item active changer
         */
        $('.active-changer span').on('click', function () {
            let value = $(this).parent().find('input').val();
            if (value == 1) {
                $(this).parent().find('input').val(0);
            } else {
                $(this).parent().find('input').val(1);
            }

            let url = "{!! route('admin.bindings.active', ['id' => ':slug']) !!}";
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
                    if (response.success) {
                        //toastr.success('asdasdasd');
                    } else {
                        return false;
                    }
                }
            });
        });

        //children id select ajax
        $(document).on('change', '.select_child', function() {
            // $('.ts-select').on('change', function () {
            let url = "{!! route('admin.bindings.selectchild', ['id' => ':slug']) !!}";
            var thisItemId = $(this).parents('tr').data('id');
            let value = $(this).parent().find(':selected').val();
            $.ajax({
                url: url.replace(':slug', thisItemId),
                type: 'post',
                dataType: 'json',
                data: {
                    _token: csrf,
                    _method: 'post',
                    itemId: thisItemId,
                    children_id: value
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


    </script>
@endpush
