$('form[id=filter_form_panel]').on('change', 'input:checkbox, input:radio, select', function() {
    this.form.submit()
})

$('.checkedList:checked').attr('checked', function() {
    $(this).parent().addClass(function() {
        return this.checked ? "bg-body-tertiary" : "";
    })
    $(this).parent().parent().parent().parent().addClass(function() {
        return this.checked ? "show" : "";
    })
})
