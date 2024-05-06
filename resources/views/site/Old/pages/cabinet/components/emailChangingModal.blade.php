<div class="modal fade" id="emailChangingModal" tabindex="-1" role="dialog" aria-labelledby="emailChangingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailChangingModalLabel">Смена почтового ящика</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert" id="emailAlert" style="font-size: 12px; display: none;"></div>
                <div class="form-group">
                    <label for="email">Новый адрес эл. почты</label>
                    <input type="text" class="form-control" id="email" value="">
                </div>
                <div class="form-group" style="display: none;">
                    <label for="emailCode">Код подтверждения</label>
                    <input type="text" class="form-control" id="emailCode" value="">
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="button" class="btn btn-grey btn-sm" id="emailChangingTrigger">Отправить</button>
                </div>
            </div>
        </div>
    </div>
</div>
