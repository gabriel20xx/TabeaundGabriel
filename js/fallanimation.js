document.addEventListener("DOMContentLoaded", function () {
  let heartAnimationEnabled = false;
  let snowAnimationEnabled = false;
  let intervalId = null;

  function createHeart() {
    if (heartAnimationEnabled) {
      const heart = document.createElement("div");
      heart.classList.add("heart");

      heart.style.left = Math.random() * 100 + "vw";
      heart.style.animationDuration = Math.random() * 2 + 6 + "s";

      heart.innerText = "❤️";

      document.body.appendChild(heart);

      setTimeout(() => {
        heart.remove();
      }, 10000);
    }
  }

  function createSnow() {
    if (snowAnimationEnabled) {
      const snowflake = document.createElement("div");
      snowflake.classList.add("snow");

      snowflake.style.left = Math.random() * 100 + "vw";
      snowflake.style.animationDuration = Math.random() * 2 + 6 + "s";

      snowflake.innerText = "❄️";

      document.body.appendChild(snowflake);

      setTimeout(() => {
        snowflake.remove();
      }, 10000);
    }
  }

  function toggleHeartAnimation() {
    heartAnimationEnabled = !heartAnimationEnabled;
    var currentColor = this.style.backgroundColor;

    if (heartAnimationEnabled) {
      intervalId = setInterval(createHeart, 300);
      this.style.backgroundColor = "red";
    } else {
      clearInterval(intervalId);
      this.style.backgroundColor = "lightcoral";
    }
  }

  function toggleSnowAnimation() {
    snowAnimationEnabled = !snowAnimationEnabled;
    var currentColor = this.style.backgroundColor;

    if (snowAnimationEnabled) {
      intervalId = setInterval(createSnow, 300);
      this.style.backgroundColor = "blue";
    } else {
      clearInterval(intervalId);
      this.style.backgroundColor = "lightblue";
    }
  }

  document.getElementById("heartButton").addEventListener("click", function (event) {
    if (event.target.closest("#heartButton")) {
      toggleHeartAnimation.call(this);
    }
  });

  document.getElementById("snowButton").addEventListener("click", function (event) {
    if (event.target.closest("#snowButton")) {
      toggleSnowAnimation.call(this);
    }
  });
});
