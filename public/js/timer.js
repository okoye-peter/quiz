setInterval(countDown, 1000);
// countDown();

function countDown() {
    let hrs = document.getElementById('hrs');
    let mins = document.getElementById('mins');
    let secs = document.getElementById('secs');
    if (+secs.textContent == 00) {
        if (+mins.textContent == 00) {
            mins.innerHTML = 59;
            if (+hrs.textContent >= 00 && +hrs.textContent < 10) {
                hrs.innerHTML ="0" + (+hrs.textContent - 1);
            }else{
                hrs.innerHTML = +hrs.textContent - 1;
            }
        }else{
            if (+mins.textContent >= 00 && +mins.textContent < 10) {
                mins.innerHTML ="0" + (+mins.textContent - 1);
            }else{
                mins.innerHTML = +mins.textContent - 1;
            }
        }
        secs.innerHTML = 59;
        console.log('b');
    }

    secs.innerHTML = +secs.textContent - 1;
    if (+secs.textContent >= 00 && +secs.textContent < 10) {
        secs.innerHTML ="0"+ secs.textContent ;
    }

    // add animation effect
    // if (+hrs.innerHTML == 00 && +mins.innerHTML ==00 && +secs.innerHTML <= 10) {
    //     hrs.parentNode.classList.add('wow');
    //     hrs.parentNode.classList.add('pulse');
    //     hrs.parentNode.classList.add('animated');
    // }
}