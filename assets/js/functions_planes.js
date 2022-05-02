$(function () {
    const columnData = [
        {"data": "id_plan"},
        {"data": "nombre_plan"},
        {"data": "precio_plan"},
        {"data": "descripcion"},
        {"data": "estado"},
        {"data": "opciones"}]

    const tablePlan = configDataTables('.tablePlan', base_url + "planes/getPlanes", columnData)

    const listCamps = ["#id_plan", "#nombre_plan", "#precio_plan", "#descripcion"];


    const fieldsToValidate = ['id_plan','nombre_plan', 'precio_plan', "descripcion"]
    const configValid = configToValidate()

    clickModal("#modalPlan", "Crear | Plan", listCamps);
    sendingDataServerSide('#fntPlan', configValid, fieldsToValidate, listCamps, tablePlan, "planes/setPlan", "#modalPlan");
})


function configToValidate() {

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: base_url_assets+"js/jbvalidatorLangEs.json",
    });
    validatorServerSide.validator.custom = function (el, event) {



        if (el.name != "id_plan"){
            if($(el).is('[name='+el.name+']')){
                console.log(el.name)
                let value= $(el).val()
                if (!validateEmptyField(value)){
                    return 'Este campo es obligatorio';
                }
            }
        }



        if ($(el).is('[name=nombre_plan]')) {
            let value = $(el).val()

            if (!validString(value)) {
                return 'El nombre ' + value + ' contiene numeros o caracteres especiales';
            }

        }
        
        if ($(el).is('[name=precio_plan]')) {
            let value = $(el).val()

            if (!validateStringLength(value, 20)) {
                return 'La descripcion ' + value + ' debe ser mas larga';
            }


        }



        if ($(el).is('[name=descripcion]')) {
            let value = $(el).val()

            if (!validateStringLength(value, 20)) {
                return 'La descripcion ' + value + ' debe ser mas larga';
            }


        }

    }

    return validatorServerSide
}


