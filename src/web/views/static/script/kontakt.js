document.getElementById("main__check").setAttribute("required", "");

function chooseCoop() {
    let parent = document.getElementsByClassName("main__form")[0];

    // dodawanie nowego wezla i podwezlow

    let checkWrap = document.createElement("div");
    checkWrap.classList.add("main__partnership");

    let check = document.createElement("input");
    check.setAttribute("type", "checkbox");
    check.setAttribute("id", "ch1");
    check.setAttribute("name", "photo");
    checkWrap.appendChild(check);

    let label = document.createElement("label");
    label.setAttribute("for", "ch1");
    label.innerHTML = "Chcę wybrać się na spacer aby robić zdjęcia razem";
    label.style.paddingLeft = "5px";
    checkWrap.appendChild(label);

    let checkWrap2 = document.createElement("div");
    checkWrap2.classList.add("main__partnership");

    let check2 = document.createElement("input");
    check2.setAttribute("type", "checkbox");
    check2.setAttribute("id", "ch2");
    check2.setAttribute("name", "invest");
    checkWrap2.appendChild(check2);

    let label2 = document.createElement("label");
    label2.setAttribute("for", "ch2");
    label2.innerHTML = "Chcę zainwestować w projekt";
    label2.style.paddingLeft = "5px";
    checkWrap2.appendChild(label2);

    checkWrap2.style.paddingBottom = "40px";

    if(localStorage.getItem("tryb") === "ciemny") {
        label.style.color = "#fff";
        label2.style.color = "#fff";
        check.style.accentColor = "#000";
        check2.style.accentColor = "#000";
        parent.insertBefore(checkWrap, parent.children[2]);
        parent.insertBefore(checkWrap2, parent.children[3]);
        let disableAdding = document.getElementById("coop");
        disableAdding.onclick = null;
    } else {
        parent.insertBefore(checkWrap, parent.children[2]);
        parent.insertBefore(checkWrap2, parent.children[3]);    
        let disableAdding = document.getElementById("coop");
        disableAdding.onclick = null;
    }
}

function choosePic() {

    let enableAdding = document.getElementById("coop");
    enableAdding.onclick = chooseCoop;

    isPresent = document.getElementsByClassName("main__partnership")[0];
    if(isPresent) {
        let parent = document.getElementsByClassName("main__form")[0];
        let child = document.getElementsByClassName("main__partnership")[0];
        let child2 = document.getElementsByClassName("main__partnership")[1];
    
        parent.removeChild(child);
        parent.removeChild(child2);    
    }
}

if(localStorage.getItem("tryb") == "ciemny") {
    let backgr = document.getElementsByTagName("body")[0];
    backgr.style.backgroundImage = "linear-gradient(to right, #6a4fab, #1f1142)";
    let svg = document.getElementsByTagName("rect")[0];
    svg.style.fill = "rgb(231, 185, 0)";
    let wrap = document.getElementsByClassName("main__container")[0];
    wrap.style.backgroundColor = "rgb(50, 50, 50)";
    for(let i = 0; i <= 4; i++) {
        let input = document.getElementsByTagName("input")[i];
        input.style.backgroundColor = "rgb(50, 50, 50)";
        input.style.color = "#fff";
    }
    let radio = document.getElementsByClassName("main__option")[0];
    radio.style.accentColor = "black";
    let radio2 = document.getElementsByClassName("main__option")[1];
    radio2.style.accentColor = "black";

    for(let j = 0; j <= 6; j++) {
        let label = document.getElementsByTagName("label")[j];
        label.style.color = "#fff";    
    }

    let check3 = document.getElementById("main__check");
    check3.style.accentColor = "#000";
}

function pokazCheck() {
    let check = document.getElementsByClassName("main__checkbox")[0];
    check.style.display = "block";
    check.style.margin = "40px 0 -40px 0";
}