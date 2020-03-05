;(function ($) {
    "use strict";

    /**
     * Debounce implementation, lo sacamos de underscore.js
     * @param func
     * @param wait
     * @param immediate
     * @return {Function}
     * @private
     */
    $._debounce = function (func, wait, immediate) {
        let timeout;
        return function () {
            let context = this, args = arguments;
            let later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            let callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    /**
     * Abre o cierra el sidebar.
     * Cualquier elemento con la propiedad [data-toggle="sidebar"] tendrá este comportamiento al hacer click.
     * Si se desea prevenir el comportamiento al hacer click en los hijos del elemento, agregar además la propiedad
     * [data-target="this"], de esta forma los clicks en los elementos hijos no disparan la apertura/cierre
     * del sidebar. Ver ejemplo en navbar-left.ctp
     *
     * @param {Event} event
     * @return {boolean}
     */
    function toggleSidebar(event) {
        if ($(this).data('target') === 'this' && this !== event.target) {
            return true;
        }
        $('body').toggleClass('sidebar-alt-state');
        return false;
    }

    /**
     * Actualiza el label del input type file custom, ya que por defecto no se actualiza.
     *
     *
     * @param event
     */
    function updateCustomFileLabel(event) {
        let fileName = $(this).val().replace(/\\/g, '/').replace(/.*\//, '');
        $(this).parent('.custom-file').find('.custom-file-label').text(fileName);
    }

    $(function () {
        $('body')
            .on('click', '[data-toggle=sidebar]', toggleSidebar)
            .on('change', '.custom-file-input', updateCustomFileLabel)
        ;
    });
})(jQuery);