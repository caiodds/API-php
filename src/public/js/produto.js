var popularForm = (elem) => {
    // pega os dados do elemento pai
    var ct = elem.parentNode.parentNode
  
    // popula os inputs do formulário
    document.getElementById("form-produto").id.valueOf = ct.getAttribute('data-id')
    document.getElementById("form-produto").nome.value = ct.getAttribute('data-nome')
    document.getElementById("form-produto").descricao.value = ct.getAttribute('data-descricao')
    document.getElementById("form-produto").preco.value = ct.getAttribute('data-valor')
    
  }
const produtos = () => {
    const produtos = document.getElementById('produtos')

    let html = ""

    fetch('Produtos.php')
        .then(resp => resp.json())
        .then(resp => {
            //const json = JSON.parse(resp)
            console.log(resp.data)

            resp.data.forEach((e) => {
                console.log(e)
                html += `<tr data-id="${e.id}" data-nome="${e.descricao}" 
                         data-assunto="${e.valor_unitario}" 
                         >
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
        .finally(() => mostrarproduto.innerHTML = html)
}
const salvarContato = async (e) => {

    const id = document.getElementById('id').value;
    const nome = document.getElementById('nome').value;
    const descricao = document.getElementById('descricao').value;



    let formContato = new FormData();
    formContato.append('id', id);
    formContato.append('nome', nome);
    formContato.append('descricao', descricao);

    let salvar = undefined

    //console.log(formContato.toString())
    if (id > 0) {
        fetch('produtos.php', {
            mode: 'cors',
            method: 'PUT',
            body: new URLSearchParams(formProduto),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        })
            .then(resp => resp.json())
            .then(resp => { console.log(resp); obterContatos() })
            .catch(err => console.log(err))

        console.log('atualizando...');

    } else {
        fetch('produtos.php', {
            mode: 'cors',
            method: 'POST',
            body: new URLSearchParams(formContato),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        })
            .then(resp => resp.json())
            .then(resp => { console.log(resp); obterContatos() })
            .catch(err => console.log(err))


        console.log('incluindo novo...')
    }
}

const excluirContato = (id) => {

    let formProdutos = new FormData();
    formProdutos.append('id', id);

    let salvar = undefined

    fetch(`produtos.php?id=${id}`, {
        mode: 'cors',
        method: 'DELETE',
        //body: new URLSearchParams(formContato), 
        //headers: { 'Content-Type': 'application/x-www-form-urlencoded'} 
    })
        .then(resp => resp.json())
        .then(resp => { console.log(resp); obterContatos() })
        .catch(err => console.log(err))


    console.log('excluindo o registro...')
}
