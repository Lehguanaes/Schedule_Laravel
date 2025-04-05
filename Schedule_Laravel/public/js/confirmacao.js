// Confirmação de Cadastro do Cliente
function confirmarCadastro(event) {
    event.preventDefault(); // Impede o envio imediato do formulário

    let nome = document.querySelector('input[name="nome_cliente"]').value.trim();
    let telefone = document.querySelector('input[name="telefone_cliente"]').value.trim();
    let tipoTelefone = document.querySelector('select[name="tipo_telefone_cliente"]').value;
    let dataCadastro = document.querySelector('input[name="data_cadastro_cliente"]').value;

    // Verifica se todos os campos obrigatórios estão preenchidos
    if (nome === "" || telefone === "" || tipoTelefone === "" || dataCadastro === "") {
        Swal.fire({
            title: "Campos obrigatórios!",
            text: "Por favor, preencha todos os campos antes de continuar.",
            icon: "warning",
            iconColor: '#70c570', 
            confirmButtonColor: "#28a745", // Verde escuro
            confirmButtonText: "OK"
        });
        return; // Interrompe o fluxo se algum campo estiver vazio
    }

    // Alerta de confirmação com os dados preenchidos
    Swal.fire({
        title: "Confirmar Cadastro",
        html: `Tem certeza que deseja cadastrar este cliente?<br><br>
                <strong>Nome:</strong> ${nome} <br>
                <strong>Telefone:</strong> ${telefone} <br>`,
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: "#28a745", // Verde escuro
        cancelButtonColor: "#70c570", // Verde claro
        confirmButtonText: "Sim, cadastrar!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("formCadastro").submit();
        }
    });
}

// Máscara do Telefone
$(document).ready(function(){
    $('#telefone_cliente').mask('(00) 00000-0000'); 
});

// Confirmação de Edição do Cliente
function confirmarEdicao() {
    Swal.fire({
        title: 'Confirmar Edição',
        text: "Tem certeza que deseja editar este cliente?",
        icon: 'warning',
        showCancelButton: true,
        iconColor: "#28a745", // Verde escuro
        confirmButtonColor: "#28a745", // Verde escuro
        cancelButtonColor: "#70c570", // Verde claro
        confirmButtonText: 'Sim, editar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-editar').submit();
        }
    });
}

// Confirmação de Exclusão do Cliente
function confirmarExclusao(id, nome, telefone) {
    Swal.fire({
        title: 'Excluir cliente?',
        html: `Tem certeza que deseja excluir este cliente?<br><br>
                <strong>Nome:</strong> ${nome} <br>
                <strong>Telefone:</strong> ${telefone} <br>`,
        icon: 'warning',
        showCancelButton: true,
        iconColor: "#28a745", // Verde escuro
        confirmButtonColor: "#28a745", // Verde escuro
        cancelButtonColor: "#70c570", // Verde claro
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formExcluir' + id).submit();
        }
    });
}

// Para o aviso de sucesso desaparecer
document.addEventListener("DOMContentLoaded", function () {
    let alertBox = document.querySelector(".alert");
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.opacity = "0";
            setTimeout(() => {
                alertBox.style.display = "none";
            }, 500); // Tempo extra para transição suave
        }, 2000); // Tempo antes de sumir (3 segundos)
    }
});