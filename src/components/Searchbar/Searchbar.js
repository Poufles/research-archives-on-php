const form_search = document.querySelector('.searchbar #search-form');
const filter_title = form_search.querySelector('.filter#title');
const filter_author = form_search.querySelector('.filter#author');
const input_filter = form_search.querySelector('input[name=filterBy]');

ChangeShownFilter(filter_title, filter_author, 'author');
ChangeShownFilter(filter_author, filter_title, 'title');

function ChangeShownFilter(fromEl, toEl, filter) {
    fromEl.addEventListener("click", (e) => {
        e.stopPropagation();
        
        fromEl.classList.toggle('hidden');
        toEl.classList.toggle('hidden');

        // Change to
        input_filter.setAttribute('value', filter);
    });
};