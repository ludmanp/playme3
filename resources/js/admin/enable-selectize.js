$(function () {
    /**
     * Selectize for tags
     */
    if ($('#tags').length) {
        window.addEventListener('locale.change', (e) => {
            axios
                .get('/api/tags-list')
                .then(function (response) {
                    let tagsSelectize = $('#tags').data('selectize');
                    response.data.forEach(function (x) {
                        tagsSelectize.updateOption(x.tag[TypiCMS.old_content_locale], {'item': x.tag[TypiCMS.content_locale]});
                    });
                    if($('#tags').val()) {
                        $('#tags').val($('#tags').data('selectize').getValue());
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    alertify.error('An error occurred while getting tags translation.');
                });
        }, false);

        axios
            .get('/api/tags-list')
            .then(function (response) {
                var tags = response.data.map(function (x) {
                    return { item: x.tag[TypiCMS.content_locale] };
                });
                var oldTags = $('#tags').val().split(',');
                for (var i = oldTags.length - 1; i >= 0; i--) {
                    if (oldTags[i] !== '') {
                        tags.push({ item: oldTags[i] });
                    }
                }
                $('#tags').selectize({
                    persist: false,
                    create: true,
                    options: tags,
                    searchField: 'item',
                    labelField: 'item',
                    valueField: 'item',
                    createOnBlur: true,
                });
            })
            .catch(function () {
                console.error(error);
                alertify.error('An error occurred while getting tags.');
            });
    }
});
