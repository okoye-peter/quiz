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

let arr = [];

function setUsersInputValue(input) {
    var users_input = document.getElementById('users_id');
    if (input.checked == true) {
        arr.unshift(input.value);
    } else if (input.checked == false && arr.indexOf(input.value) > -1) {
        arr.splice(arr.indexOf(this.value), 1);
    }
    users_input.value = arr.join(',');
}

function addNewRow() {
    let div = document.createElement('');
    document.forms[1].append((div));

}