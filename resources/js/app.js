require('./bootstrap');

document.querySelectorAll('.btnDeleteRole').forEach(box =>
    box.addEventListener('click', function () {
        let id = this.getAttribute('data-id')

        if (confirm("Tem certeza que deseja excluir este perfil?"))
            axios.delete(`${window.location.protocol}//${window.location.host}/admin/roles/delete/${id}`)
        else
            return false

        window.location.reload()
    })
)

document.querySelectorAll('.btnDeleteUser').forEach(box =>
    box.addEventListener('click', function () {
        let id = this.getAttribute('data-user')

        if (confirm("Tem certeza que deseja excluir este usuário?"))
            axios.delete(`${window.location.protocol}//${window.location.host}/admin/users/delete/${id}`)
        else
            return false

        window.location.reload()
    })
)

document.querySelector('.logout').addEventListener('click', function () {
    axios.post(`${window.location.protocol}//${window.location.host}/logout`)
})
