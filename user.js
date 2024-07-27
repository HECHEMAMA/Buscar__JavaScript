const search__user = document.getElementById('search__user');
const btn__search = document.getElementById('btn__search');
const user__found = document.getElementById('user__found')


search__user.addEventListener('submit', function (e) {
    user__found.innerText = ''
    e.preventDefault()

    const data__search = new FormData(search__user)
    let url = 'controllers/User.php';

    fetch(url, {
        method: 'POST',
        body: data__search
    })
        .then(res => res.json())
        .then(data => {
            if (data === false) {
                user__found.innerText = 'User not found'
                search__user.querySelector('label').className = 'user__notfound'
            } else {
                // console.log(data)
                data.forEach(user => {
                    search__user.querySelector('label').className = ''
                    user__found.innerText += '- ' + user['name'] + ' ' + user['last_name']
                    user__found.innerHTML += `<span style="color:orange;">.</span><br>`
                });
            }
        })
        .catch(err => console.log(err))
})
/*  
function get__data(url, form) {
    let form = new FormData(form)

    fetch(url, {
        method: POST,
        body: form
    })
    .then(res  => res.json())
    .then(data => {return data})
    .catch(err => console.log(err))
}

*/