document.addEventListener("DOMContentLoaded", () => {
    let totalCoins = 0;
    const coinCounter = document.getElementById("coin-counter");
    const coinSound = document.getElementById("coin-sound");
    const gameContainer = document.getElementById("game-container");

    const donkeyImageUrl = "images/baby_donkey.png"; // Path to your baby donkey image

    // Create initial logos
    for (let i = 0; i < 5; i++) {
        createLogo(gameContainer, donkeyImageUrl, 0.1);
    }

    // Add new logos every 10 seconds
    setInterval(() => {
        createLogo(gameContainer, donkeyImageUrl, 0.1);
    }, 10000);

    function createLogo(container, url, value) {
        const logo = document.createElement("div");
        logo.className = "logo";
        logo.style.backgroundImage = `url(${url})`;
        logo.dataset.value = value;
        logo.addEventListener("click", () => {
            const coinValue = parseFloat(logo.dataset.value);
            totalCoins += coinValue;
            coinCounter.innerText = `Total Coins: ${totalCoins.toFixed(4)}`;
            playCoinSound();
            saveCoins(totalCoins);
            logo.remove();
        });
        container.appendChild(logo);
        moveLogo(logo, container);
    }

    function moveLogo(logo, container) {
        const containerWidth = container.clientWidth;
        const containerHeight = container.clientHeight;
        const logoWidth = logo.offsetWidth;
        const logoHeight = logo.offsetHeight;

        let x = Math.random() * (containerWidth - logoWidth);
        let y = Math.random() * (containerHeight - logoHeight);

        let dx = (Math.random() - 0.5) * 10;
        let dy = (Math.random() - 0.5) * 10;

        setInterval(() => {
            if (x + dx < 0 || x + dx + logoWidth > containerWidth) {
                dx = -dx;
            }
            if (y + dy < 0 || y + dy + logoHeight > containerHeight) {
                dy = -dy;
            }
            x += dx;
            y += dy;
            logo.style.left = `${x}px`;
            logo.style.top = `${y}px`;
        }, 100);
    }

    function playCoinSound() {
        coinSound.currentTime = 0;
        coinSound.play();
    }

    function saveCoins(coins) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "save_coins.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log("Coins saved");
            }
        };
        xhr.send("coins=" + coins);
    }

    document.getElementById("youtube-subscribe").addEventListener("click", () => {
        window.open("http://www.youtube.com/@TopLearn-rc7hb", "_blank");
    });

    document.getElementById("telegram-join").addEventListener("click", () => {
        window.open("https://t.me/YourChannel", "_blank");
    });

    document.getElementById("referral").addEventListener("click", () => {
        // Add referral logic here
    });
});

