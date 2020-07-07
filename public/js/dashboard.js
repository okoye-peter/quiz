function filter(inputFilter) {
    let tbody = document.getElementById('users');
    let keyword = inputFilter.toLowerCase();
    let trs = tbody.querySelectorAll('.user');
    trs.forEach((tr) => {
        let status = false;
        let tds = tr.querySelectorAll('td');
        tds.forEach((td) => {
            let text = td.textContent.toLowerCase();
            if (text.indexOf(keyword) > -1) {
                status = true
            }
        });
        if (status) {
            tr.style.display = ''
        } else {
            tr.style.display = 'none';
        }
    });
}

function toggleForm() {
    /* Toggle between hiding and showing the active panel */
    let panel = document.querySelector('.panel');
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
    } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
    }
};