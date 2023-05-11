//для отображения 3 комментариве и остатка
let page = 0;
function affiche() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === 'No more comments') {
                alert('No more comments');
            } else {

                document.getElementById("main_section").innerHTML += this.responseText;
                document.getElementById("main_section").style.display="block";
                page++;
            }
        }
    };
    xhr.open("GET", "load.php?page=" + page, true);
    xhr.send();
}

/*
для обычного отображения всех комментариев
function affiche() {
    let done = document.getElementById('plus_comments');
    if (done) {
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("main_section").innerHTML = this.responseText;
                document.getElementById("main_section").style.display="block";
            }
        };
        xhr.open("GET", "load.php", true);
        xhr.send();
    }
}
*/
