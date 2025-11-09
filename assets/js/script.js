
window.addEventListener("scroll", () => {
    const nav = document.querySelector(".navbar");
    if (window.scrollY > 50) {
      nav.style.background = "rgba(0, 0, 0, 0.85)";
      nav.style.boxShadow = "0 0 25px rgba(255, 0, 0, 0.4)";
    } else {
      nav.style.background = "rgba(0, 0, 0, 0.45)";
      nav.style.boxShadow = "0 0 25px rgba(255, 0, 0, 0.2)";
    }
  });
  