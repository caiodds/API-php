



const mostrarProdutos = () => {
    const produtoo = document.getElementById('produto')
    
    let html = ""

    fetch('produtos.php')
    .then (resp => resp.json())
    .then ( resp => {
        //const json = JSON.parse(resp)
        console.log(resp.data)

        resp.data.forEach( (e) => {
            console.log(e)
            html += `<tr data-id="${e.id}" data-nome="${e.nome}" 
                         data-email="${e.email}" data-assunto="${e.assunto}" 
                         data-mensagem="${e.mensagem}">

                        <td>${e.id}</td>
                        <!-- <td>${e.nome}</td> -->
                        <td>${e.email}</td>
                        <!-- <td>${e.assunto}</td> -->
                        <!-- <td>${e.mensagem}</td> -->
                        <td>
                           <button type="button" onclick="popularForm(this);"   class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                           <button type="button" onclick="excluirContato(${e.id})" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>`           
        })
    })
    .finally( ()  => mostrarproduto.innerHTML = html )
}
