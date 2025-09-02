document.addEventListener("DOMContentLoaded", 
    (ev)=>{     
        let formCad = document.getElementById("formCadastroVenda");
        formCad.addEventListener("submit", (ev2)=>{
            ev2.preventDefault();
            let campoCliente = document.getElementById("cliente");
            let campoFunc = document.getElementById("funcionario");
            let campoProdutos = document.getElementById("produtos");
            validaFormulario(campoCliente.value, campoFunc.value, campoProdutos.value)?formCad.submit():null;
        });
    }
);
let validaFormulario = (cliente, func, produtos) => {
    return true;
};