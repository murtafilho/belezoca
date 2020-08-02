    
    @push('scripts')

    <script>
        $('.preco').priceFormat({
            prefix: '',
            centsSeparator: '.',
            thousandsSeparator: '.'
        });
        $.datetimepicker.setLocale('pt-BR');
        $('.datas-br').datetimepicker({
            format:'d/m/Y',
            timepicker:false,
            theme:'dark',
            startDate:new Date()
        });

        $('.hora').datetimepicker({
            format:'H:i',
            datepicker:false,
            theme:'dark',
            defaultTime:'09:00'
        }).mask('99:99');
    </script>
    @endpush