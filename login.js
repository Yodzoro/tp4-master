function loginUser() {
    let username = document.getElementById('nomUtilisateur').value;
    let comment = document.getElementById('commentaire').value;

    // Создаем объект FormData для отправки данных формы через AJAX
    const formData = new FormData();
    formData.append('username', username);
    formData.append('comment', comment);

    fetch('form.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json())
        .then(data => {
            if (data.status === 'error') {
                alert(data.message);
            } else {
                alert('Comment added successfully!');
                // Optionally, you can reload the page or update a part of it
                // location.reload();
                username='';
                comment='';

            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });

}