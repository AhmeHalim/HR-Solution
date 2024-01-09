// lazy loading images
document.addEventListener('DOMContentLoaded', function() {
    let lazyImages = [].slice.call(document.querySelectorAll('img.lazy'));

    if ('IntersectionObserver' in window) {
        let lazyImageObserver = new IntersectionObserver(function(
            entries,
            observer
        ) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    let lazyImage = entry.target;
                    lazyImage.src = lazyImage.dataset.src;
                    // lazyImage.srcset = lazyImage.dataset.srcset;

                    setTimeout(() => {
                        lazyImage.classList.remove('lazy');
                        lazyImageObserver.unobserve(lazyImage);
                        lazyImage.nextElementSibling.remove();
                    }, 1500);
                }
            });
        });

        lazyImages.forEach(function(lazyImage) {
            lazyImageObserver.observe(lazyImage);
        });
    } else {
        for (let lazyImg of document.querySelectorAll('img.lazy')) {
            lazyImg.src = lazyImg.dataset.src;
        }
    }
});