if(localStorage.getItem("tryb") == "ciemny") {
    let backgr = document.getElementsByTagName("body")[0];
    backgr.style.backgroundImage = "linear-gradient(to right, #6a4fab, #1f1142)";
    let svg = document.getElementsByTagName("rect")[0];
    svg.style.fill = "rgb(231, 185, 0)";
    let wrap = document.getElementsByClassName("main__wrap")[0];
    wrap.style.backgroundColor = "rgb(50, 50, 50)";
    let link = document.getElementsByClassName("main__link")[0];
    link.style.backgroundColor = "rgb(70, 70, 70)";
    link.style.color = "#fff";
    link.addEventListener("mouseenter", () => {link.style.backgroundColor = "rgb(231, 185, 0)"; link.style.color = "#000"});
    link.addEventListener("mouseleave", () => {link.style.backgroundColor = "rgb(70, 70, 70)"; link.style.color = "#fff"});
}

