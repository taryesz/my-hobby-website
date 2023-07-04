let tryb = localStorage.getItem("tryb") || "jasny";
let emoji = localStorage.getItem("emoji") || "ksiezyc";

function zmienTryb() {
    if(tryb === "ciemny" && emoji === "slonce") {
        let backgr = document.getElementsByTagName("body")[0];
        backgr.style.backgroundImage = "linear-gradient(to right, rgb(255, 176, 57), #6a4fab)";
        let svg = document.getElementsByTagName("rect")[0];
        svg.style.fill = "#7651cc";
        let autor = document.getElementsByClassName("main__autor")[0]
        autor.style.backgroundColor = "#301866";
        let insp = document.getElementsByClassName("main__inspiration")[0]
        insp.style.backgroundColor = "#301866";
        let summ = document.getElementsByClassName("main__summary")[0]
        summ.style.backgroundColor = "#301866";
        let symb = document.getElementsByTagName("button")[0];
        symb.innerHTML = "&#9789;";

        tryb = "jasny";
        emoji = "ksiezyc";
    } else {
        let backgr = document.getElementsByTagName("body")[0];
        backgr.style.backgroundImage = "linear-gradient(to right, #6a4fab, #1f1142)";
        let svg = document.getElementsByTagName("rect")[0];
        svg.style.fill = "rgb(231, 185, 0)";
        let autor = document.getElementsByClassName("main__autor")[0];
        autor.style.backgroundColor = "rgb(50, 50, 50)";
        let insp = document.getElementsByClassName("main__inspiration")[0];
        insp.style.backgroundColor = "rgb(50, 50, 50)";
        let summ = document.getElementsByClassName("main__summary")[0];
        summ.style.backgroundColor = "rgb(50, 50, 50)";
        let symb = document.getElementsByTagName("button")[0];
        symb.innerHTML = "&#9728;";    
        
        tryb = "ciemny";
        emoji = "slonce";
    }

    localStorage.setItem("tryb", tryb);
    localStorage.setItem("emoji", emoji);
}

if(tryb === "ciemny" && emoji === "slonce") {
    let backgr = document.getElementsByTagName("body")[0];
    backgr.style.backgroundImage = "linear-gradient(to right, #6a4fab, #1f1142)";
    let svg = document.getElementsByTagName("rect")[0];
    svg.style.fill = "rgb(231, 185, 0)";
    let autor = document.getElementsByClassName("main__autor")[0];
    autor.style.backgroundColor = "rgb(50, 50, 50)";
    let insp = document.getElementsByClassName("main__inspiration")[0];
    insp.style.backgroundColor = "rgb(50, 50, 50)";
    let summ = document.getElementsByClassName("main__summary")[0];
    summ.style.backgroundColor = "rgb(50, 50, 50)";
    let symb = document.getElementsByTagName("button")[0];
    symb.innerHTML = "&#9728;";
}

// ZAMIANA ZDJEC PRZY NAJEZDZIE MYSZKA NA TEKST

function changePic(num) {
    let pic = document.getElementById("main__photographer");
    if(num == 0) {
        pic.src = "../../../views/static/img/phabyo.jpg";
    } else if(num == 1) {
        pic.src = "../../../views/static/img/linus.jpg";
    } else if(num == 2) {
        pic.src = "../../../views/static/img/jane.jpg";
    } else if(num == 3) {
        pic.src = "../../../views/static/img/tom.jpg";
    } else if(num == 4) {
        pic.src = "../../../views/static/img/jarek.jpg";
    } else if(num == 5) {
        pic.src = "../../../views/static/img/lina.jpg";
    }
}