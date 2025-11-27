const btnConsultarLivros = document.querySelector("#consultarLivros")
const btnListarTodosLivros = document.querySelector("#listarLivros")
const btnCadastrarLivro = document.querySelector("#cadastrarLivro")
const btnRegistrarRetirada = document.querySelector("#registrarRetirada")

/**
 * Função construtora de Exemplares da Biblioteca
 * @param {*} issn 
 * @param {*} titulo 
 * @param {*} autor 
 * @param {*} editora 
 * @param {*} ano 
 * @param {*} genero 
 * @param {*} local 
 * @param {*} disponibilidade 
 */
function Livro(ISSN, titulo, autor, editora, anoPublicacao, genero, localizacao, disponibilidade) {
    this.ISSN = ISSN
    this.titulo = titulo
    this.autor = autor
    this.editora = editora
    this.anoPublicacao = anoPublicacao
    this.genero = genero
    this.localizacao = localizacao
    this.disponivel = disponibilidade
}

/**
 * Função que deverá pegar os dados do formulário e gerar um novo 
 * exemplar na lista de livros da biblioteca
*/

async function cadastrarExemplar() { // ok
    console.log("chamando cadastrarExemplar")
    const url = "http://localhost/karenKM/livraria/back/index.php?modulo=livro"

    const ISSN = document.querySelector("#novoIssn").value
    const titulo = document.querySelector("#novoTitulo").value
    const autor = document.querySelector("#novoAutor").value
    const editora = document.querySelector("#novoEditora").value
    const anoPublicacao = document.querySelector("#novoAno").value
    const genero = document.querySelector("#novoGenero").value
    const localizacao = document.querySelector("#novoLocal").value
    const disponibilidade = "Sim"

    const response = await fetch(url, {
        method: "POST",
        header: { "Content-Type": "application/json" },
        body: JSON.stringify(new Livro(ISSN, titulo, autor, editora, anoPublicacao, genero, localizacao, disponibilidade))
    })
}

function montaTabela(array, div) { // ok
    const tabela = document.createElement("table")
    tabela.className = "tabela"
    if (array.length == 0) {
        const textTag = document.createElement("p")
        textTag.textContent = "Não foi possível encontrar o que você procura..."
        div.append(textTag)
    }
    else {
        array.forEach(livro => {
            const linha = document.createElement("tr")
            const issn = document.createElement("td")
            issn.textContent = livro.ISSN
            issn.style.borderLeft = "1px solid rgb(60, 60, 124)"
            linha.append(issn)
            const titulo = document.createElement("td")
            titulo.textContent = livro.titulo
            linha.appendChild(titulo)
            const autor = document.createElement("td")
            autor.textContent = livro.autor
            linha.appendChild(autor)
            const genero = document.createElement("td")
            genero.textContent = livro.genero
            linha.appendChild(genero)
            const ano = document.createElement("td")
            ano.textContent = livro.anoPublicacao
            linha.appendChild(ano)
            const botaotd = document.createElement("td")
            const botao = document.createElement("button")
            botao.textContent = "Detalhes"
            botaotd.appendChild(botao)
            linha.appendChild(botaotd)
            tabela.appendChild(linha)
        })
        div.appendChild(tabela)
    }
}

/**
 * Função que deverá pegar o parâmetro de filtro e listar todos os 
 * exemplares que satisfizerem a condição
*/

async function consultarLivros() { // ok
    console.log("chamando consultarLivros")
    const saida = document.querySelector("#saidaBusca")
    while (saida.firstChild) {
        saida.removeChild(saida.firstChild)
    }
    const url = "http://localhost/karenKM/livraria/back/index.php?modulo=livro"
    const filtro = document.querySelector("#busca").value

    const response = await fetch(url)
    const result = await response.json()

    const livrosFiltrados = result.filter(livro => {
        return (livro.autor.includes(filtro) || livro.titulo.includes(filtro) || livro.genero.includes(filtro))
    })

    montaTabela(livrosFiltrados, saida)
}

/**
 * Função que deverá listar na tela todos os livros do acervo
*/

async function listarTodos() { // ok
    console.log("chamando listarTodos")
    const url = "http://localhost/karenKM/livraria/back/index.php?modulo=livro"
    const response = await fetch(url)
    const result = await response.json()
    const saida = document.querySelector("#saidaBusca")

    while (saida.firstChild) {
        saida.removeChild(saida.firstChild)
    }
    montaTabela(result, saida)
    console.log(result)
}

/**
 * Função que deverá marcar o exemplar como indisponível no acervo
*/

function registrarRetirada() {
    console.log("chamando registrarRetirada")
}

/* 
 * Bloco de chamada de eventos
*/

btnCadastrarLivro.addEventListener("click", cadastrarExemplar)
btnConsultarLivros.addEventListener("click", consultarLivros)
btnListarTodosLivros.addEventListener("click", listarTodos)
btnRegistrarRetirada.addEventListener("click", registrarRetirada)