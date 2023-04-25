<script src="{{ asset('js/bootstrap-datepicker.js') }}" defer></script>
<link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet" type="text/css">
<script>
    function getDataFormatada(date) {
        var dd = (date.getDate() < 10 ? '0' : '') + date.getDate();
        var MM = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
        var yyyy = date.getFullYear();

        return (yyyy + "-" + MM + "-" + dd);
    }

    function getDiasDisponiveis(profissional) {
        $.ajax({
            url : '{{ route('getDiasDisponiveisProfissional') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "id_profissional": profissional
            },
            type: 'get',
            dataType: 'json',
            success: function( result )
            {
                //var disableDates = ["31-12-2019","27-01-2019"];
                var disableDates = [];
                var validDates = result;
                $('.datepicker').datepicker({
                    //daysOfWeekDisabled: [0],
                    //startDate: new Date(),
                    // o ultimo dia e definido como período máximo de geração de expediente.
                    //endDate: '+App\Expediente::$maxDias',
                    autoclose: true,
                    disableTouchKeyboard: true,
                    Readonly: true,
                    language: 'pt-BR',
                    beforeShowDay: function(date) {
                        data = getDataFormatada(date);
                        if(disableDates.includes(data)) {
                            return false;
                        }
                        else {
                            return validDates.includes(data);
                        }
                    }
                }).attr("readonly", "readonly");;
            },
            error: function()
            {
                //handle errors
                alert('Falha ao carregar dias disponíveis');
            }
        });
    }
    $(document).ready(function() {

        $.fn.datepicker.dates['pt-BR'] = {
            days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
            daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
            daysMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
            months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            today: "Hoje",
            monthsTitle: "Meses",
            clear: "Limpar",
            format: "dd/mm/yyyy"
        };
        getDiasDisponiveis(null);
        $("#id_profissional").on("change", function () {
            getDiasDisponiveis($(this).val());
        });

        $("#todoAno").on("change", function () {
            $("#dataExcecao").val("");
            $("#dataExcecao").datepicker("destroy");
            $("#dataExcecao").attr("data-date-format","dd/mm");
            if ($("#todoAno").is(":checked")) {
                $("#dataExcecao").attr("data-inputmask-greedy","false");
                $("#dataExcecao").attr("maxlength","5");
                $("#dataExcecao").inputmask();
                $("#dataExcecao").datepicker({
                    format: 'dd/mm'
                });
            } else {
                $("#dataExcecao").attr("maxlength","10");
                $("#dataExcecao").attr("data-inputmask-greedy","true");
                $("#dataExcecao").inputmask();
                $("#dataExcecao").datepicker({
                    format: 'mm/dd/yyyy'
                });
            }
        });

    });
</script>