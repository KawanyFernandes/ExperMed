<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    setTimeout(function() {
    window.location.reload(1);
    }, 3000);
    const query = "";
    
    $.ajax({
        type: "POST",
        url: "helpers/lerArquivo.php",
        data: {categoria:query},
        success: function(datafile){
            console.log("data file",datafile);   
            const qtdClient = []
            const qtdSeller = []
            const idBestSeller = []
            const worstSeller = [];
            const sell = []
            datafile.map(values => {
            if (values.includes('001')) {
                qtdClient.push(values)
            }
            if (values.includes('002') === true) {
                qtdSeller.push(values)
            }
            if (values.includes('003') === true) {
                sell.push(values)
            }
            if (values.includes('003') === true) {
                const removeFirst = values.split('[')[1]
                const removesecond = removeFirst.split(']')[0]
                const removespace = removesecond.replace(/\s/g, '')
                const breakcomma = removespace.split(',') 
                let ven = removeFirst.split(']')[1]
                const bestSell = []
                breakcomma.map(values =>{
                    const preco = values.split('-')[2]
                    const qtd = values.split('-')[1]
                    const id = values.split('-')[0]
                    const valorVenda = preco*qtd;
                    const response = {
                        idVenda: id,
                        valor: valorVenda
                    }
                    bestSell.push(response)
                })
                var max = bestSell.reduce(function(a, b) {
                    return a.valor > b.valor ? a : b; 
                });    
                const venda = {
                    score: breakcomma,
                    seller: ven,
                    totalsell: bestSell,
                    maior_venda: max
                }
                idBestSeller.push(venda)
            }
            })

            const sellerName = idBestSeller.seller;

            var maiorVenda = idBestSeller.reduce(function(a, b) {
                return a.maior_venda.valor > b.maior_venda.valor ? a : b; 
            }); 
            var piorVendedor = idBestSeller.reduce(function(a, b) {
                return a.maior_venda.valor < b.maior_venda.valor ? a : b; 
            }); 
            const resultadoFinal ={
                qtdClients : qtdClient.length,
                qtdSellers : qtdSeller.length,
                biggestSale : maiorVenda.maior_venda,
                worstSeller : piorVendedor.seller.replace(/\s\ç/g,'')
            }
            const dados = JSON.stringify(resultadoFinal);
            $.ajax({
                url: 'helpers/geraArquivo.php',
                type: 'POST',
                data: {data: dados},
                success: function(result){
                    // Retorno se tudo ocorreu normalmente
                    console.log("ok", result);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Retorno caso algum erro ocorra
                }
            });        
        }
    }); 

</script>