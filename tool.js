let timer = document.getElementById('timer');
        let start = document.getElementById('start');
        let stop = document.getElementById('stop');
        let reset = document.getElementById('reset');
        let count = 0;
        let interval;
        start.addEventListener('click', function() {
            if(interval!=null) {return;}/// 如果定时器已经存在，则不再创建新的定时器
            interval = setInterval(function() {
                count++;
                timer.innerHTML = count;
            }, 1000);
        });
        stop.addEventListener('click', function() {
            clearInterval(interval);
            interval = null;
        });
        reset.addEventListener('click', function() {
            clearInterval(interval);
            interval = null;
            count = 0;
            timer.innerHTML = count;
        });
let cm = document.getElementById("cm");
let kg = document.getElementById("kg");
let ccc=kg/(cm*cm)*10000;
