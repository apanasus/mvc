document.addEventListener('DOMContentLoaded', () => {
    const timerDisplay = document.getElementById('timer');
    const countdownTime = 10 * 60; // 10 minutes in seconds

    let remainingTime = countdownTime;

    // Load remaining time from localStorage if available
    if (localStorage.getItem('timerEndTime')) {
        const timerEndTime = parseInt(localStorage.getItem('timerEndTime'), 10);
        const currentTime = Math.floor(Date.now() / 1000);

        if (currentTime < timerEndTime) {
            remainingTime = timerEndTime - currentTime;
        } else {
            resetTimer();
        }
    } else {
        resetTimer();
    }

    function updateTimerDisplay() {
        const minutes = Math.floor(remainingTime / 60).toString().padStart(2, '0');
        const seconds = (remainingTime % 60).toString().padStart(2, '0');
        timerDisplay.textContent = `${minutes}:${seconds}`;
    }

    function resetTimer() {
        remainingTime = countdownTime;
        const timerEndTime = Math.floor(Date.now() / 1000) + countdownTime;
        localStorage.setItem('timerEndTime', timerEndTime);
        console.log('Timer reset and stored in localStorage');
    }

    function tick() {
        if (remainingTime > 0) {
            remainingTime--;
        } else {
            resetTimer();
        }
        updateTimerDisplay();
    }

    updateTimerDisplay();
    setInterval(tick, 1000);
});
