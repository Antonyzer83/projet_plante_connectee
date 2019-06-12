let hg = document.getElementsByClassName("humidityground");
let ha = document.getElementsByClassName("humidityair");
let temp = document.getElementsByClassName("temperature");

if (Math.abs(hg[0].innerHTML - hg[1].innerHTML) > 10){
    hg[0].classList.add("bad");
    let node = document.createElement("p")
    let text = "L'humidité du sol n'est pas bonne !";
    node.innerHTML = text;
    document.getElementsByClassName("plant")[0].appendChild(node);
}
else {
    if (Math.abs(hg[0].innerHTML - hg[1].innerHTML) < 5) {
        hg[0].classList.add("good");
    }
    else {
        hg[0].classList.add("medium");
    }
}

if (Math.abs(ha[0].innerHTML - ha[1].innerHTML) > 10) {
    ha[0].classList.add("bad");
}
else {
    if (Math.abs(ha[0].innerHTML - ha[1].innerHTML) < 5) {
        ha[0].classList.add("good");
        let node = document.createElement("p")
        let text = "L'humidité de l'air est bonne !";
        node.innerHTML = text;
        document.getElementsByClassName("plant")[0].appendChild(node);
    }
    else {
        ha[0].classList.add("medium");
    }
}

if (Math.abs(temp[0].innerHTML - temp[1].innerHTML) > 5) {
    temp[0].classList.add("bad");
}
else {
    if (Math.abs(temp[0].innerHTML - temp[1].innerHTML) < 2) {
        temp[0].classList.add("green");
    }
    else {
        temp[0].classList.add("medium");
        let node = document.createElement("p")
        let text = "La température est moyenne !";
        node.innerHTML = text;
        document.getElementsByClassName("plant")[0].appendChild(node);
    }
}