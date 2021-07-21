/**
 * Gestion des notifications et alertes
 * https://sweetalert2.github.io
 */
import Swal from 'sweetalert2';

// Configuration de base des messages flash
const FlashMessage = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    },
});

document.querySelectorAll('.flash-message').forEach((element) => {
    const options = element.dataset;
    options.text = element.innerText;
    FlashMessage.fire(options);
});

// Gestion des alertes
document.querySelectorAll('[data-alert]').forEach((element) => {
    element.addEventListener('click', (event) => {
        event.preventDefault();

        const url = element.getAttribute('href');
        const options = element.dataset;
        options.icon = element.dataset.alert;

        Swal.fire(options)
            .then((result) => {
                if (result.isConfirmed) {
                    document.location = url;
                }
            });
    });
});

// Affiche une alerte "Sauvegarde en cours ..." automatiquement pour
// chaque soumission de formulaire
document.querySelectorAll('form:not(.form-signin)').forEach((element) => {
    element.addEventListener('submit', (event) => {
        const text = event.target.dataset.text ?? 'Sauvegarde en cours ...';

        Swal.fire({
            allowOutsideClick: false,
            html: `<p class="h3">${text}</p>`,
            padding: '2rem',
            didOpen: () => {
                Swal.showLoading()
            },
        });
    });
});
