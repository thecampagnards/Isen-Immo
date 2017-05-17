$(document).ready(function() {

    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">Le chargement de l\'image #%curr%</a>  a échoué.',
            titleSrc: function(item) {
                return item.el.attr('title') + ''
            }
        }
    })
})