<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Freelancer</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}" defer></script>
    <script src="{{ asset('js/jquery.inputmask.js') }}" defer></script>
    <script src="{{ asset('js/moment.js') }}" ></script>
    <script src="{{ asset('assets/DataTables/js/datatables.min.js') }}" defer></script>
    <script src="{{ asset('assets/DataTables/js/order.natural.min.js') }}" defer></script>
    <script>

        function scrollH() {
            var scrollToRight = $('.scroll-right-to'),
                scrollToLeft = $('.scroll-left-to'),
                element = document.getElementById('main-div'),
                scrollH = $('#main-div').scrollLeft();
            var maxScrollLeft = element.scrollWidth - element.clientWidth;
            if (scrollH-maxScrollLeft == 0) {
                scrollToRight.fadeOut(100);
            } else {
                scrollToRight.fadeIn(200);
            }
            if (scrollH > 0) {
                scrollToLeft.fadeIn(200);
            } else {
                scrollToLeft.fadeOut(100);
            }
        }

        $(window).on('scroll', function () {
            var scrollToTop = $('.scroll-top-to'),
                scrollToBottom = $('.scroll-bottom-to'),
                scroll = $(window).scrollTop();

            if (scroll > 0) {
                scrollToTop.fadeIn(200);
            } else {
                scrollToTop.fadeOut(100);
            }

            if ((document.getElementById('main-div').scrollHeight - scroll) > 500 ){
                scrollToBottom.fadeIn(200);
            } else {
                scrollToBottom.fadeOut(100);
            }
        });

        $(document).ready(function() {
            scrollH();
            $('.scroll-top-to').on('click', function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
                return false;
            });

            $('.scroll-bottom-to').on('click', function () {
                $('body,html').animate({
                    scrollTop: document.getElementById('main-div').scrollHeight
                }, 500);
                return false;
            });

            $('.scroll-right-to').on('click', function () {
                var element = document.getElementById('main-div');
                var maxScrollLeft = element.scrollWidth - element.clientWidth;
                $('#main-div').scrollLeft(maxScrollLeft);
                return false;
            });

            $('.scroll-left-to').on('click', function () {
                var element = document.getElementById('main-div');
                var maxScrollLeft = element.scrollWidth - element.clientWidth;
                $('#main-div').scrollLeft(0);
                return false;
            });

            $(":input").inputmask();
            var tabela = $('#relatorio').DataTable({
                columnDefs: [
                    { type: 'natural', targets: '_all'  }
                ],
                aaSorting: [],
                "orderMulti": true,
                "sAutoWidth": true,
                "iDisplayLength": 9999,
                "language": <?php echo file_get_contents(public_path('json/datatables.json')); ?>,
                "orderCellsTop": true,
                "fixedHeader": true,
                initComplete: function () {
                    var api = this.api();

                    // For each column
                    api.columns().eq(0).each(function (colIdx) {
                        // Set the header cell to contain the input element
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        ).off('keyup change').on('keyup change', function (e) {
                            e.stopPropagation();

                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api.column(colIdx).search(
                                this.value != ''
                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                    : '',
                                this.value != '',
                                this.value == ''
                            ).draw();

                            $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                        });
                    });
                },
            });
            var container = document.querySelector('#relatorio_info');
            if (container) {
                var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

                var observer = new MutationObserver(function(mutations) {
                    var filtrando = false;
                    if ($("input[type='search']:first").val().length || $('select[name=relatorio_length] option').filter(':selected').val()) {
                        filtrando = true;
                    } else {
                        $('.filters th input').each(function(){
                            if ($(this).attr("title")) {
                                filtrando = true;
                            }
                        });
                    }
                    if(filtrando) {
                        $('.exibir-sem-filtro').show();
                    } else {
                        $('.exibir-sem-filtro').hide();
                    }

                    if($("td[class='dataTables_empty']").length){
                        limpaTotalizadores();
                    }
                    $('table thead th').each(function (i) {
                        calculaTotalizadores(i);
                    });
                });

                observer.observe(container, {
                    attributes: true,
                    childList: true,
                    subtree: true,
                    characterData: true
                });
            }

            $('table thead th').each(function (i) {
                calculaTotalizadores(i);
                var html = $('table tfoot tr').html();
                $("table tfoot tr[class='sem-filtro']").html(html);
            });
            function isNumeric(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }
            function limpaTotalizadores() {
                $('table tfoot tr:first-child td').each(function (index) {
                    $(this).text("");
                });
            }

            function calculaTotalizadores(index) {
                var total;
                $('table tbody tr').each(function (i) {
                    var value = $('td', this).eq(index).text();
                    if (isNumeric(value)) {
                        if (i == 0) {
                            total = 0
                        }
                        value = parseFloat($('td', this).eq(index).text());
                        total += value;
                    }
                });
                if (isNumeric(total)) {
                    $('table tfoot td').eq(index).text('Total: ' + (total.toFixed(2) == parseInt(total.toFixed(2)) ? parseInt(total.toFixed(2)) : total.toFixed(2)));
                }
            }
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/DataTables/css/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/tema/plugins/themify-icons/themify-icons.css')}}">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        img.icone {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>

</head>
<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">
 @include('sweetalert::alert')
<div id="app">
    @include('layouts.nav')
    <link href="{{url('assets/tema/css/style.css')}}" rel="stylesheet">
    <main class="py-4 gradient-banner container-fluid table-responsive" style="min-height: 100%; margin: 0px; position: absolute ; padding: 30px 0 170px">
        <div id="main-div" onScroll="scrollH()" class="container-fluid table-responsive">
            <div id="flash-msg container-fluid">
                @include('flash::message')
            </div>
            @yield('content')

        </div>
    </main>
</div>
<div class="scroll-top-to">
    <i class="ti-angle-up"></i>
</div>

<div class="scroll-right-to">
    <i class="ti-angle-right"></i>
</div>

<div class="scroll-bottom-to">
    <i class="ti-angle-down"></i>
</div>
<div class="scroll-left-to">
    <i class="ti-angle-left"></i>
</div>

</body>
</html>