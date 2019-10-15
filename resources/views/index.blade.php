<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contract Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="pre">
                    <pre>
                        <code class="no-highlight">
        --- 
        Body:
        q: 
            type: Array
            description: "Query conditions"
            items: 
                type: object
                conditional: string
                field: string
                value: string
                required: 
                    - field
                    - value
                    - conditional
            required: false
        fields: 
            type: Array    
            description: "Fields or function to return"
            items: 
                type: string
            required: false
        skip: 
            type: number  
            description: "number of records to skip for pagination"
            required: false
        limit: 
            type: number
            description: "maximum number of records to return"
            required: false
                        </code>
                    </pre>
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="pre">
                    <pre>
                        <code class="no-highlight">
--- 
Example: 
{
    "q": [
        {
            "field": "proveedor",
            "value": "IFX",
            "conditional": "="
        },
        {
            "field": "costo_abono",
            "value": 1300,
            "conditional": ">"
        }
    ],
    "fields": [
        "id_contrato as id",
        "descripcion",
        "proveedor",
        "moneda",
        "costo_abono"
    ],
    "sql": false,
    "offset": 50,
    "limit": 5
}
                        </code>
                    </pre>
                </div>
            </div>
        </div>
    
    
    </div>
</body>
</html>