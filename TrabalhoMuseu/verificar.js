
window.onload = function () {

    document.forms.formcadastro.onsubmit = validaForm;
}

function validaForm(e) {
    var ver = true;
    var senha = document.getElementById('exampleInputPassword');

    const spansenha = senha.nextElementSibling;
    var valor = senha.value;

    if (valor.length < 5) { // Altere o valor '5' para o número mínimo de letras desejado
        senha.classList.add('error');
        ver =  false;
        spansenha.textContent = 'Senha precisa ter no minimo 6 caracteres';
    } else {
        senha.classList.remove('error');

    }
    if (!ver) {
        e.preventDefault();
    }

}