(function($){ 
 
    console.log("child theme functions js loaded");

    function initAgFadeSequences(scope) {
        var root = scope && scope.querySelectorAll ? scope : document;
        var sequences = root.querySelectorAll('[data-ag-fade-sequence]');

        if (!sequences.length) {
            return;
        }

        function revealSequence(sequence) {
            if (!sequence || sequence.dataset.agFadeReady === 'done') {
                return;
            }

            sequence.dataset.agFadeReady = 'done';
            sequence.querySelectorAll('[data-ag-fade-item]').forEach(function(item) {
                item.classList.add('is-visible');
            });
        }

        if (!('IntersectionObserver' in window)) {
            sequences.forEach(revealSequence);
            return;
        }

        var observer = new IntersectionObserver(function(entries, currentObserver) {
            entries.forEach(function(entry) {
                if (!entry.isIntersecting) {
                    return;
                }

                revealSequence(entry.target);
                currentObserver.unobserve(entry.target);
            });
        }, {
            threshold: 0.16,
            rootMargin: '0px 0px -8% 0px'
        });

        sequences.forEach(function(sequence) {
            if (sequence.dataset.agFadeReady === 'done') {
                return;
            }

            observer.observe(sequence);
        });
    }

    /* ==================== */  
    /* Wow Library
    /* ==================== */
    new WOW().init();
    initAgFadeSequences(document);
    window.initAgFadeSequences = initAgFadeSequences;

})(jQuery);
