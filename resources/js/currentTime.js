function showTime() {
    let date = new Date();
    document.getElementById('currentTime').innerText = date.toLocaleTimeString();
}

setInterval(showTime, 1000);
