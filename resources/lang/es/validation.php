<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute sólo debe contener letras.',
    'alpha_dash'           => ':attribute sólo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute sólo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'mimetypes'            => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser numérico.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => ':attribute ya ha sido registrado.',
    'uploaded'             => 'Subir :attribute ha fallado.',
    'url'                  => 'El formato :attribute es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name'                  => 'nombre',
        'username'              => 'usuario',
        'email'                 => 'correo',
        'first_name'            => 'nombre',
        'last_name'             => 'apellido',
        'password'              => 'contraseña',
        'password2'             => 'contraseña',
        'password_confirmation' => 'confirmación de la contraseña',
        'city'                  => 'ciudad',
        'country'               => 'país',
        'address'               => 'dirección',
        'phone'                 => 'teléfono',
        'mobile'                => 'móvil',
        'age'                   => 'edad',
        'sex'                   => 'sexo',
        'gender'                => 'género',
        'year'                  => 'año',
        'month'                 => 'mes',
        'day'                   => 'día',
        'hour'                  => 'hora',
        'minute'                => 'minuto',
        'second'                => 'segundo',
        'title'                 => 'título',
        'body'                  => 'contenido',
        'description'           => 'descripción',
        'excerpt'               => 'extracto',
        'date'                  => 'fecha',
        'time'                  => 'hora',
        'subject'               => 'asunto',
        'message'               => 'mensaje',
        'weight'                => 'peso',
        'provider'              => 'proveedor',
        'quotation'             => 'cotización',
        'amount'                => 'importe',
        'items'                 => 'partida',
        // select
        'team'                  => 'equipo',
        'design'                => 'diseño',
        'quantity'              => 'cantidad',
        'caliber'               => 'calibre',
        'specific'              => 'peso especifico',
        'client'                => 'cliente',
        'client_id'             => 'cliente',
        'order'                 => 'orden',
        'added'                 => 'existente',
        'caliber'               => 'calibre',
        'measureType'           => 'tipo de medidas',
        'measures'              => 'medidas',
        'pieces'                => 'piezas',
        'height'                => 'alto',
        'length'                => 'largo',
        'width'                 => 'ancho',
        'type'                  => 'tipo',
        'deliver'               => 'fecha de entrega',
        'unity'                 => 'unidad',
        'price'                 => 'precio',
        'family'                => 'familia',
        'contact'               => 'contacto',
        'advance'               => 'anticipo',
        'retainer'              => 'anticipo',
        'brand'                 => 'marca',
        'service'               => 'servicio',
        'category'              => 'categoría',
        'plate'                 => 'placas',
        'model'                 => 'modelo',
        'load'                  => 'carga',
        'inventory'             => 'inventario',
        'key'                   => 'llave',
        'origin'                => 'origen',
        'destination'           => 'destino',
        'driver'                => 'operador',
        'driver_id'             => 'operador',
        'unit'                  => 'unidad',
        'unit_id'               => 'unidad',
        'lot'                   => 'corralón',
        'pension'               => 'pensión',
        'maneuver'              => 'maniobra',
        'releaser'              => 'liberador',
        'others'                => 'otros',
        'bill'                  => 'factura',
        'discount'              => 'descuento',
        'reason'                => 'razón',
        'motocycle'             => 'moto',
        'car'                   => 'coche',
        'ton3'                  => '3 Ton',
        'ton5'                  => '5 Ton',
        'ton10'                 => '10 Ton',
        'pay'                   => 'método de pago',
        'helper'                => 'apoyo',
        'helper_id'             => 'apoyo',
        'start_hour'            => 'hora entrada',
        'end_hour'              => 'hora salida',
        'driver_hour'           => 'hora extra operador',
        'helper_hour'           => 'hora extra apoyo',
        'days'                  => 'días de crédito',
        'business_name'         => 'razón social',
        'rfc'                   => 'R.F.C.',
        'location'              => 'ubicación',
        'vehicule'              => 'vehículo',
        'destiny'               => 'destino',
        'file'                  => 'expediente',
        'sinister'              => 'siniestro',
        'credit'                => 'credito',
        'user'                  => 'usuario',
        'booth'                 => 'cabina',
        'retention'             => 'retención',
        'start'                 => 'de',
        'end'                   => 'hasta',
        'base_salary'           => 'sueldo base',
        'product'               => 'producto',
        'observations'          => 'observaciones',
        'nickname'              => 'apodo',
        'serial'                => 'serie',
        'payment'               => 'pago',
        'date_return'           => 'fecha y hora regreso',
        'date_service'          => 'fecha y hora servicio',
        'date_assignment'       => 'fecha y hora asignacion',
        'date_contact'          => 'fecha y hora contacto',
        'date_end'              => 'fecha y hora termino',
        'date_out'              => 'fecha y hora pago',
        'date_pay'              => 'fecha pago',
        'salary'                => 'salario',
        'method'                => 'metodo',
        'cellphone'             => 'celular',
        'social'                => 'razón social',
        'invoice'               => 'factura',
    ],

];
