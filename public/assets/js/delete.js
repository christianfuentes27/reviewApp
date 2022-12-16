(function () {

    document.addEventListener('click', clickDocument);

    function clickDocument(event) {
        var target = event.target;
        if(target.tagName === 'A' && target.classList.contains('deleteReview')) {
            let name = target.dataset.name;
            let url = target.dataset.url;
            confirmDelete(name, url);
        }
    }

    function confirmDelete(name, url) {
        let form = document.getElementById('deleteForm');
        let confirmBtn = document.getElementById('confirmBtn');
        
        confirmBtn.addEventListener('click', () => {
            form.action = url;
            form.submit();
        });
    }

})();