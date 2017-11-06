//no c


$(function(){
        $("#date").datepicker({ dateFormat: 'yy-mm-dd' });
        
    });

    $.datepicker.regional['es'] = {
     closeText: 'Cerrar',
     prevText: '<Ant',
     nextText: 'Sig>',
     currentText: 'Hoy',
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
     dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
     weekHeader: 'Sm',
     dateFormat: 'dd/mm/yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: ''
     };
     $.datepicker.setDefaults($.datepicker.regional['es']);

$(function(){
        $("#to").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });

$(function(){
$('button.delete-btn').on('click', function(e){
        e.preventDefault();
        var self = $(this);
        swal({
            title             : "Está seguro?",
            text              : "Esto se eliminará!",
            type              : "warning",
            showCancelButton  : true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Sí, eliminalo!",
            cancelButtonText  : "No, no lo elimines!",
            closeOnConfirm    : false,
            closeOnCancel     : false
        },
        function(isConfirm){
            if(isConfirm){
                swal("Eliminando!","", "success");
                setTimeout(function() {
                    self.parents(".delete_form").submit();
                }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
            }
            else{
                  swal("Cancelado","No se ha eliminado", "error");
            }
        });
    });

 });


$(function(){
    $('#role_id').on('change', function() {
      var id = document.getElementById('role_id').value;
      if (id==3){
        document.getElementById('location_id').disabled = false;
      }
      else{
        document.getElementById('location_id').disabled = true;
      }
    })
});

$(function(){

      var id = document.getElementById('role_id').value;
      if (id==3){
        document.getElementById('location_id').disabled = false;
      }
      else{
        document.getElementById('location_id').disabled = true;
      }
    
});
