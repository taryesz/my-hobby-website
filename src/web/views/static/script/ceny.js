if(localStorage.getItem("tryb") == "ciemny") {
    let backgr = document.getElementsByTagName("body")[0];
    backgr.style.backgroundImage = "linear-gradient(to right, #6a4fab, #1f1142)";
    let svg = document.getElementsByTagName("rect")[0];
    svg.style.fill = "rgb(231, 185, 0)";
    let wrap = document.getElementsByClassName("main__container")[0];
    wrap.style.backgroundColor = "rgb(50, 50, 50)";
    for(let i = 0; i <= 2; i++) {
        let th = document.getElementsByTagName("th")[i];
        th.style.backgroundColor = "#10485e";    
    }
    for(let j = 0; j <= 8 ; j++) {
        var td = document.getElementsByTagName("td")[j];
        td.style.backgroundColor = "#4e2a70";
    }
}
