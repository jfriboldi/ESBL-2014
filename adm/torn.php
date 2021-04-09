<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<head>
        <title></title>
        
         
    </head>
    <body>
        <?php
          include_once 'adm_header.php'; ?>
 
<script>
        		/* TABLE SORTER + PAGER + FILTER  -  TROCAR ID DA TABELA PARA FUNCIONAR */
$(function () {
  $.tablesorter.addParser({
    
    id: 'data',
    is: function (s) {
      return false;
    },
    format: function (s, table, cell, cellIndex) {
      var $cell = $(cell);
      if (cellIndex === 1) {
        return $cell.attr('data-date') || s;
      }
      return s;
    },
    type: 'text'
  });

  $("#tb").tablesorter({
	theme: 'blue',
    headers: {
      1: {
        sorter: 'data'
      }
    },
    sortList: [
      [0, 0]
    ],
    widgets: ['zebra', 'filter', 'saveSort'],
    widgetOptions: {
      filter_childRows: false,
      filter_columnFilters: true,
      filter_cssFilter: 'tablesorter-filter',
      filter_functions: null,
      filter_hideFilters: false,
      filter_ignoreCase: true,
      filter_reset: 'button.reset',
      filter_searchDelay: 300,
      filter_startsWith: false,
      filter_useParsedData: false
    }
  }).tablesorterPager({

    // target the pager markup - see the HTML block below
    container: $(".pager"),

    // use this url format "http:/mydatabase.com?page={page}&size={size}" 
    ajaxUrl: null,

    // process ajax so that the data object is returned along with the
    // total number of rows; example:
    // {
    //   "data" : [{ "ID": 1, "Name": "Foo", "Last": "Bar" }],
    //   "total_rows" : 100 
    // } 
    ajaxProcessing: function(ajax) {
        if (ajax && ajax.hasOwnProperty('data')) {
            // return [ "data", "total_rows" ]; 
            return [ajax.data, ajax.total_rows];
        }
    },

    // output string - default is '{page}/{totalPages}';
    // possible variables:
    // {page}, {totalPages}, {startRow}, {endRow} and {totalRows}
    output: '{startRow} a {endRow} ({totalRows})',

    // apply disabled classname to the pager arrows when the rows at
    // either extreme is visible - default is true
    updateArrows: true,

    // starting page of the pager (zero based index)
    page: 0,

    // Number of visible rows - default is 10
    size: 10,

    // if true, the table will remain the same height no matter how many
    // records are displayed. The space is made up by an empty 
    // table row set to a height to compensate; default is false 
    fixedHeight: true,

    // remove rows from the table to speed up the sort of large tables.
    // setting this to false, only hides the non-visible rows; needed
    // if you plan to add/remove rows with the pager enabled.
    removeRows: false,

    // css class names of pager arrows
    // next page arrow
    cssNext: '.next',
    // previous page arrow
    cssPrev: '.prev',
    // go to first page arrow
    cssFirst: '.first',
    // go to last page arrow
    cssLast: '.last',
    // select dropdown to allow choosing a page
    cssGoto: '.gotoPage',
    // location of where the "output" is displayed
    cssPageDisplay: '.pagedisplay',
    // dropdown that sets the "size" option
    cssPageSize: '.pagesize',
    // class added to arrows when at the extremes 
    // (i.e. prev/first arrows are "disabled" when on the first page)
    // Note there is no period "." in front of this class name
    cssDisabled: 'disabled'

});
  $('button.search').click(function () {
    var filters = $('table').find('input.tablesorter-filter'),
      col = $(this).data('filter-column'),
      txt = $(this).data('filter-text'),
      cur = filters.eq(col).val(),
      mult, i;

    if (cur && txt !== "") {
      mult = cur.split('|');
      i = $.inArray(txt, mult);
      if (i < 0) {
        mult.push(txt);
      } else {
        mult.splice(i, 1);
      }
      txt = mult.join('|');
    }
    filters.eq(col).val(txt).trigger('search', false);
  });
  
  $('.check').click(function (){ 
      var id = this.id;
     window.location = "/esbl/adm/fin_torn.php?id=" + id; 
  });
 });
    </script>
    
    <?php
$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select id, nome, jogo, dia, valor, premiacao, min, maxi, bb from torn where final = '0'");

if ($sql)
{
    echo'<table cellspacing="0" id="tb" class="tablesorter"><thead><tr><th data-placeholder="Busca">ID</th><th data-placeholder="Busca">Nome</th><th data-placeholder="Busca">Jogo</th>
    <th data-placeholder="Busca">Hora/Data</th><th data-placeholder="Busca">Valor</th><th data-placeholder="Busca">Premiação</th><th data-placeholder="Busca">Mínimo de Integrantes</th><th data-placeholder="Busca">Máximo de Integrantes</th><th>Binary Beast</th><th>Finalizar</th></tr></thead><tbody>';

    while($res = $sql->fetch_assoc()){
    echo '<tr><td>'.$res[id].'</td>', '<td>'.$res[nome].'</td>', '<td>'.$res[jogo].'</td>', '<td>'.$res[dia].'</td>','<td>'.$res[valor].'</td>','<td>'.$res[premiacao].'</td>','<td>'.$res[min].'</td>','<td>'.$res[maxi].'</td>','<td>'.$res[bb].'</td>','<td><img class="check" id="'.$res[id].'" src="/esbl/imgs/check.png" width="20px" height="20px"></td></tr>';
}
 
 echo'</tbody></table>';
   
   
}

 ?>
<div id="pager" class="pager">

    	<form id="pag">
				<span>
					Exibir <select class="pagesize">
							<option selected="selected"  value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option  value="40">40</option>
					</select> registros
				</span>

				<img src="/esbl/images/first.png" class="first"/>
    		<img src="/esbl/images/prev.png" class="prev"/>
    		<input type="text" class="pagedisplay"/>
    		<img src="/esbl/images/next.png" class="next"/>
    		<img src="/esbl/images/last.png" class="last"/>
    	</form>
    </div>
       
      <form action="reg_torn.php" method="post" name="torn">
                <label>Nome</label><input type="text" name="nome"><p>
                <label>Jogo</label><select name="jogo">
                                    <option value="lol">League of Legends</option>
                                </select><p>
                <label>Hora/Data</label><input type="datetime-local" name="dia"><p> 
                <label>Valor</label><input type="number" name="valor"><p>
                <label>Premiação</label><input type="number" name="premiacao"><p> 
                <label>Mínimo de Integrantes</label><input type="number" name="min"><p> 
                <label>Máximo de Integrantes</label><input type="number" name="max"><p> 
                    <label>Binary Beast</label><input type="text" name="bb"></p> 
              
                <input type="submit" name="Enviar">
        </form>  
    </body>
</html>
