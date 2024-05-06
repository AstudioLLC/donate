$('.select').each(function() {
    const _this = $(this),
        selectOption = _this.find('option'),
        selectOptionLength = selectOption.length,
        selectedOption = selectOption.filter(':selected'),
        duration = 50; // длительность анимации

    _this.hide();
    _this.wrap('<div class="select"></div>');
    $('<div>', {
        class: 'new-select',
        text: _this.children('option:disabled').text()
    }).insertAfter(_this);

    const selectHead = _this.next('.new-select');
    $('<div>', {
        class: 'new-select__list'
    }).insertAfter(selectHead);

    const selectList = selectHead.next('.new-select__list');
    for (let i = 0; i < selectOptionLength; i++) {
        $('<div>', {
            class: 'new-select__item',
            html: $('<span>', {
                text: selectOption.eq(i).text()
            })
        })
            .attr('data-value', selectOption.eq(i).val())
            .appendTo(selectList);
    }

    const selectItem = selectList.find('.new-select__item');
    selectList.slideUp(0);
    selectHead.on('click', function() {
        if ( !$(this).hasClass('on') ) {
            $(this).addClass('on');
            selectList.slideDown(duration);

            selectItem.on('click', function() {
                let chooseItem = $(this).data('value');

                $('select').val(chooseItem).attr('selected', 'selected');
                selectHead.text( $(this).find('span').text() );

                selectList.slideUp(duration);
                selectHead.removeClass('on');
            });
        } else {
            $(this).removeClass('on');
            selectList.slideUp(duration);
        }
    });

    $(document).mouseup(function (e) {
        if (selectHead.has(e.target).length === 0){
            selectList.slideUp(duration);
            $(".select-group").removeClass("select-group-active");
        }
    });
});

function showFile(input) {
    let uploadFile = document.querySelector(".upload-file-name");
    let file = input.files[0];
    uploadFile.innerHTML = file.name;
}

$(".select-group").on('click', function(){
    if($(this).find(".new-select").hasClass("on")) {
        $(this).closest(".select-group").addClass("select-group-active");
        // } else {
        // $(this).closest(".select-group").removeClass("select-group-active");
        // }
    }
});



let sCategory = document.querySelectorAll('#select_country option');

sCategory.forEach((item,index)=>{
    if(item.selected == true){
        console.log(item.textContent)
        let firstOption = document.querySelector('.first-option');
        let newSelect = document.querySelector('.new-select');
        newSelect.innerText = item.textContent;
        firstOption.innerText = item.textContent;
    }
})

