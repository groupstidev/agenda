document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'pt-br',
    plugins: ['interaction', 'dayGrid'],
    timeZone: 'local',
    //defaultDate: '2019-04-12',
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: 'list_eventos.php',
    extraParams: function () {
      return {
        cachebuster: new Date().valueOf(),
      };
    },
    eventClick: function (info) {
      info.jsEvent.preventDefault(); // don't let the browser navigate

      $('#visualizar #id').text(info.event.id);
      $('#visualizar #id').val(info.event.id);
      $('#visualizar #solicitante').text(info.event.extendedProps.solicitante);
      $('#visualizar #solicitante').val(info.event.extendedProps.solicitante);
      $('#visualizar #title').text(info.event.title);
      $('#visualizar #title').val(info.event.title);
      $('#visualizar #conexao').text(info.event.extendedProps.conexao);
      $('#visualizar #conexao').val(info.event.extendedProps.conexao);
      $('#visualizar #start').text(info.event.start.toLocaleString('pt-br'));
      $('#visualizar #start').val(info.event.start.toLocaleString('pt-br'));
      $('#visualizar #end').text(info.event.end.toLocaleString('pt-br'));
      $('#visualizar #end').val(info.event.end.toLocaleString('pt-br'));
      $('#visualizar #color').val(info.event.backgroundColor);

      $('#visualizar').modal('show');
    },
    selectable: true,
    select: function (info) {
      // alert('Início do Evento ' + info.start.toLocaleString());
      $('#cadastrar #start').val(info.start.toLocaleString('pt-br'));
      $('#cadastrar #end').val(info.end.toLocaleString('pt-br'));

      $('#cadastrar').modal('show');
    },
  });

  calendar.render();
});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
  var keypress = window.event ? event.keyCode : evento.which;
  campo = eval(objeto);
  if (campo.value == '00/00/0000 00:00:00') {
    campo.value = '';
  }

  caracteres = '0123456789';
  separacao1 = '/';
  separacao2 = ' ';
  separacao3 = ':';
  conjunto1 = 2;
  conjunto2 = 5;
  conjunto3 = 10;
  conjunto4 = 13;
  conjunto5 = 16;
  if (
    caracteres.search(String.fromCharCode(keypress)) != -1 &&
    campo.value.length < 19
  ) {
    if (campo.value.length == conjunto1) campo.value = campo.value + separacao1;
    else if (campo.value.length == conjunto2)
      campo.value = campo.value + separacao1;
    else if (campo.value.length == conjunto3)
      campo.value = campo.value + separacao2;
    else if (campo.value.length == conjunto4)
      campo.value = campo.value + separacao3;
    else if (campo.value.length == conjunto5)
      campo.value = campo.value + separacao3;
  } else {
    event.returnValue = false;
  }
}

$(document).ready(function () {
  // Cadastrar
  $('#addevent').on('submit', function (event) {
    event.preventDefault();

    $.ajax({
      method: 'POST',
      url: 'cad_event.php',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (retorna) {
        if (retorna['sit']) {
          //$('#msg-cad').html(retorna['msg']);
          location.reload();
        } else {
          $('#msg-cad').html(retorna['msg']);
        }
      },
    });
  });

  $('.btn-canc-vis').on("click", function () {
    $('.visevent').slideToggle();
    $('.formedit').slideToggle();
  });

  $('.btn-canc-edit').on("click", function () {
    $('.formedit').slideToggle();
    $('.visevent').slideToggle();
  });

  $('#respConexao #meet').hide();
  $('#respConexao #scopia').hide();

  // Editar
  $('#editevent').on('submit', function (event) {
    event.preventDefault();

    $.ajax({
      method: 'POST',
      url: 'edit_event.php',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (retorna) {
        if (retorna['sit']) {
          //$('#msg-cad').html(retorna['msg']);
          location.reload();
        } else {
          $('#msg-edit').html(retorna['msg']);
        }
      },
    });
  });

  $('#conexao1').change(function () {
    var resp = $(this).val();
    if (resp == 'Meet') {
      $('#respConexao #meet').slideDown('fast');
      $('#respConexao #scopia').slideUp();

    } else if (resp == 'Scopia') {
      $('#respConexao #scopia').slideDown('fast');
      $('#respConexao #meet').slideUp();

    } else if (resp == '') {
      $('#respConexao #scopia').slideUp();
      $('#respConexao #meet').slideUp();
    }
  });

  // $('#conexao').change(function () {
  //   var I = $('#conexao').val();
  //   if (I == 'Meet') {
  //     $('.meet').slideDown('fast');
  //     $('.scopia').slideUp();

  //   } else if (I == 'Scopia') {
  //     $('.scopia').slideDown('fast');
  //     $('.meet').slideUp();

  //   } else if (I == '') {
  //     $('.scopia').slideUp();
  //     $('.meet').slideUp();
  //   }

  // });

});

// function resConexao(selectObject) {
//   var i = selectObject.value;

//   console.log(i);
// }