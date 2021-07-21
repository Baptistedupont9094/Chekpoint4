
/**
 * Gestion des lightbox
 * https://ashleydw.github.io/lightbox
 */

// Transforme tous les liens contenant data-toggle="lightbox" en lightbox
$(document).on('click', '[data-toggle="lightbox"]', function showLightbox(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

// Transforme les aperçus des images dans les champs de type VicImage en lightbox
$(document).on('click', 'form .vich-image a', function showLightbox(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
