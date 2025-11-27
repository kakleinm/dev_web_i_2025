const btnAlterarLivro = document.querySelector("#alterarLivro")

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

  const consulta = await fetch(url)
  const result = await consulta.json()

  const livroFiltrado = result.filter(livro => {
    return (livro.ISSN == ISSN)
  })

  const novosDados = {
    "id": livroFiltrado.id,
    "ISSN": ISSN,
    "titulo": titulo,
    "autor": autor,
    "editora": editora,
    "anoPublicacao": anoPublicacao,
    "genero": genero,
    "localizacao": localizacao,
    "disponibilidade": "Sim"
  }

  const response = await fetch(url, {
    method: "PUT",
    header: { "Content-Type": "application/json" },
    body: JSON.stringify(novosDados)
  })
}

/* 
 * Bloco de chamada de eventos
*/

btnAlterarLivro.addEventListener("click", cadastrarExemplar)