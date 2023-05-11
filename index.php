<?php include 'form.php'; ?>
<!doctype html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<script src="login.js"></script>
<script src="affiche.js"></script>
<script type="application/javascript">
// Faire la vérif
window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("submit").addEventListener('click', function (event) {

        event.preventDefault()

        const leight = /^[^\s].{0,48}[^\s]$/ //проверка того, что первые и последние символы не пробелы и блина букв - от 1 до 50
        let hasError = false

        let usernameInput = document.getElementById('nomUtilisateur')
        let commentInput = document.getElementById('commentaire')

        if (usernameInput.value.match(leight) === null) {
            alert("Please enter username");
            hasError = true
        }
        usernameInput.addEventListener('input', function () {
            hasError = this.value.match(leight) === null;
        })

        if (commentInput.value.match(leight) === null) {
            alert("Please enter comment");
            hasError = true
        }
        commentInput.addEventListener('input', function () {
            hasError = this.value.match(leight) === null;
        })

        if (!hasError){
                var formData = new FormData();
                formData.append('username', usernameInput.value);
                formData.append('comment', commentInput.value);

                fetch('form.php', {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                    .then(data => {
                        if (data.status === 'error') {
                            alert(data.message);
                        } else {
                            alert('Comment added successfully!');
                            // Clear form fields
                            usernameInput.value = '';
                            commentInput.value = '';
                            // Optionally, you can reload the page or update a part of it
                            // location.reload();
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }

    })

})

// Requête fetch que je n'arrive pas à faire marcher
//fetch('http://url/load.php?page=1')
</script>
<!-- Mon formulaire -->
<div class="formulaire">
    <h1>Formulaire</h1>
    <form method="post">
        <span>Nom d'utilisarteur</span>
        <br><input type="text" id="nomUtilisateur" name="username">

        <br><span>Coomentaire</span>
        <br><textarea type="text" id="commentaire" name="comment" rows="10"></textarea>

        <br><button type="submit" id="submit">SUBMIT</button>
    </form>
</div>


<!-- Afficher les commentaires ici -->
<main>
    <section id="main_section" style="display:none;">
         <!--afficher tout les donnees de base-->
    </section>

<footer>
    <button id="plus_comments" onclick="affiche()">Plus de commentaire</button>
</footer>
</main>
</body>
</html>
