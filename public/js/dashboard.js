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
    let gdiv = document.createElement('div');
    let panel = document.querySelector('.panel');
    gdiv.setAttribute('class', 'grid');
    let arr = ['question', 'answer', 'option1', 'option2', 'option3'];
    arr.forEach((ele, index) => {
        let div = document.createElement('div');
        let label = document.createElement('label');
        label.innerHTML = ele.charAt(0).toUpperCase() + ele.slice(1) + ":";
        if (opt = ele.match(/option/g)) {
            label.innerHTML = opt.toString().charAt(0).toUpperCase() + opt.toString().slice(1) + ` ${index -1}:`;
        }
        if (index == 1 || index == 2 || index == 3) {
            label.setAttribute('class', 'ml-4');
        }
        let input = document.createElement('input');
        input.setAttribute('type', 'text');
        if (index == 0) {
            input.setAttribute('class', 'form-control form-control-sm mx-2 mb-2');
        } else {
            input.setAttribute('class', 'form-control form-control-sm mx-2');
        }
        input.setAttribute('placeholder', `Enter ${ele}`);
        input.setAttribute('name', `${ele}[]`);
        div.append(label);
        div.append(input);
        gdiv.append(div);
    });
    document.forms[1].insertBefore(gdiv, document.getElementById('create'));
    panel.style.maxHeight = panel.scrollHeight + "px";
}

function addNewRowForCourse() {
    let form = document.forms[1];
    let gdiv = document.createElement('div');
    gdiv.setAttribute('class', 'grid');
    let arr = ['course', 'time_limit'];
    arr.forEach((element, index) => {
        let div = document.createElement('div');
        let label = document.createElement('label');
        let input = document.createElement('input');
        if (index == 0) {
            label.innerHTML = element.charAt(0).toUpperCase() + element.slice(1) + " Title:";
            input.setAttribute('type', 'text');
        } else {
            label.innerHTML = "Time Limit(mins):";
            label.setAttribute('class', 'ml-4');
            input.setAttribute('type', 'number');
        }
        input.setAttribute('class', 'form-control form-control-sm mx-2');
        input.setAttribute('name', `${element}[]`);
        input.setAttribute('placeholder', `Enter ${element}`);
        div.append(label);
        div.append(input);
        gdiv.append(div);
    });
    form.insertBefore(gdiv, document.getElementById('create'));
    form.style.maxHeight = form.scrollHeight + "px";
}