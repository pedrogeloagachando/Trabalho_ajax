document.addEventListener("DOMContentLoaded", () => {
    listarTodos();  
});

function listarTodos() {
    fetch("listar.php", {
        method: "GET",
        headers: { 'Content-Type': "application/json; charset=UTF-8" }
    })
    .then(response => response.json())
    .then(receitas => inserirReceitas(receitas))
    .catch(error => console.log(error));
}

function inserirReceitas(receitas) {
    for (const receita of receitas) {
        inserirReceita(receita);
    }
}

function inserirReceita(receita) {
    let tbody = document.getElementById('receitas');
    let tr = document.createElement('tr');

    let tdId = document.createElement('td');
    tdId.innerHTML = receita.id;

    let tdtipo = document.createElement('td');
    tdtipo.innerHTML = receita.tipo;

    let tdnome = document.createElement('td');
    tdnome.innerHTML = receita.nome;

    let tdDescriccao = document.createElement('td');
    tdDescriccao.innerHTML = receita.pais;

    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscaReceita, false);
    btnAlterar.id_receita = receita.id;
    tdAlterar.appendChild(btnAlterar);

    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id_receita = receita.id;
    btnExcluir.innerHTML = "Excluir";
    tdExcluir.appendChild(btnExcluir);

    tr.appendChild(tdId);
    tr.appendChild(tdtipo);
    tr.appendChild(tdnome);
    tr.appendChild(tdDescriccao);
    tr.appendChild(tdAlterar);
    tr.appendChild(tdExcluir);

    tbody.appendChild(tr);
}

function excluir(evt) {
    let id_receita = evt.currentTarget.id_receita;
    let excluir = confirm("Você tem certeza que deseja excluir essa ficção?");
    if (excluir == true) {
        fetch('excluir.php?id_receita=' + id_receita, {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        })
        .then(response => response.json())
        .then(retorno => excluirReceita(retorno, id_receita))
        .catch(error => console.log(error));
    }
}

function excluirReceita(retorno, id_receita) {
    if (retorno == true) {
        let tbody = document.getElementById('receitas');
        for (const tr of tbody.children) {
            if (tr.children[0].innerHTML == id_receita) {
                tbody.removeChild(tr);
            }
        }
    }
}

function alterarReceita(receita) {
    let tbody = document.getElementById('receitas');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == receita.id_receita) {
            tr.children[1].innerHTML = receita.tipo;
            tr.children[2].innerHTML = receita.nome;
            tr.children[3].innerHTML = receita.pais;
        }
    }
}

function buscaReceita(evt) {
    let id_receita = evt.currentTarget.id_receita;
    fetch('buscaReceita.php?id_receita=' + id_receita, {
        method: "GET",
        headers: { 'Content-Type': "application/json; charset=UTF-8" }
    })
    .then(response => response.json())
    .then(receita => preencheForm(receita))
    .catch(error => console.log(error));
}

function preencheForm(receita) {
    let inputIDreceita = document.getElementsByName("id_receita")[0];
    inputIDreceita.value = receita.id;

    let inputtipo = document.getElementsByName("tipo")[0];
    inputtipo.value = receita.tipo;

    let inputnome = document.getElementsByName("nome")[0];
    inputnome.value = receita.nome;

    let inputpais = document.getElementsByName("pais")[0];
    inputpais.value = receita.pais;
}

function salvarReceita(event) {
    event.preventDefault();

    let inputIDreceita = document.getElementsByName("id_receita")[0];
    let id_receita = inputIDreceita.value;
    let inputtipo = document.getElementsByName("tipo")[0];
    let tipo = inputtipo.value;
    let inputnome = document.getElementsByName("nome")[0];
    let nome = inputnome.value;
    let inputpais = document.getElementsByName("pais")[0];
    let pais = inputpais.value;

    if (id_receita == "") {
        cadastrar(id_receita, tipo, nome, pais);
    } else {
        alterar(id_receita, tipo, nome, pais);
    }

    document.getElementsByTagName('form')[0].reset();
}

function cadastrar(id_receita, tipo, nome, pais) {
    fetch('inserir.php', {
        method: 'POST',
        body: JSON.stringify({
            id_receita: id_receita,
            tipo: tipo,
            nome: nome,
            pais: pais
        }),
        headers: { 'Content-Type': "application/json; charset=UTF-8" }
    })
    .then(response => response.json())
    .then(receita => inserirReceita(receita))
    .catch(error => console.log(error));
}

function alterar(id_receita, tipo, nome, pais) {
    fetch('alterar.php', {
        method: 'POST',
        body: JSON.stringify({
            id_receita: id_receita,
            tipo: tipo,
            nome: nome,
            pais: pais
        }),
        headers: { 'Content-Type': "application/json; charset=UTF-8" }
    })
    .then(response => response.json())
    .then(receita => alterarReceita(receita))
    .catch(error => console.log(error));
}
