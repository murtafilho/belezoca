
<!-- Submit Field -->
<div class="form-group col-sm-6">
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control datas-br" name="data1" value="{{isset($data1)?date_to_input($data1->data1):null}}" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<button type="submit" class="btn btn-dark">Salvar</button>



@push('scripts')


@endpush