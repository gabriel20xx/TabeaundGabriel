document.addEventListener("DOMContentLoaded", function () {
  let heartAnimationEnabled = false;
  let snowAnimationEnabled = false;
  let intervalId = null;

  function createHeart() {
    if (heartAnimationEnabled) {
      const heart = document.createElement("div");
      heart.classList.add("heart");

      heart.style.left = Math.random() * 100 + "vw";
      heart.style.animationDuration = Math.random() * 2 + 3 + "s";

      heart.innerText = "❤️";

      document.body.appendChild(heart);

      setTimeout(() => {
        heart.remove();
      }, 5000);
    }
  }

  function createSnow() {
    if (snowAnimationEnabled) {
      const snowflake = document.createElement("div");
      snowflake.classList.add("snow");

      snowflake.style.left = Math.random() * 100 + "vw";
      snowflake.style.animationDuration = Math.random() * 2 + 3 + "s";

      snowflake.innerText = "❄️";

      document.body.appendChild(snowflake);

      setTimeout(() => {
        snowflake.remove();
      }, 5000);
    }
  }

  document.getElementById("heartButton").addEventListener("click", function () {
    if (snowAnimationEnabled) {
      snowAnimationEnabled = false;
      clearInterval(intervalId);
    }

    heartAnimationEnabled = !heartAnimationEnabled;

    if (heartAnimationEnabled) {
      intervalId = setInterval(createHeart, 300);
    } else {
      clearInterval(intervalId);
    }
  });

  document.getElementById("snowButton").addEventListener("click", function () {
    if (heartAnimationEnabled) {
      heartAnimationEnabled = false;
      clearInterval(intervalId);
    }

    snowAnimationEnabled = !snowAnimationEnabled;

    if (snowAnimationEnabled) {
      intervalId = setInterval(createSnow, 300);
    } else {
      clearInterval(intervalId);
    }
  });
});
